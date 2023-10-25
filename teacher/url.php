<?php
    include ('D:\xampp\htdocs\test\common\config.php');
    include ('D:\xampp\htdocs\test\common\header.php');

    if(@$_GET['id']){

        $sql = 'SELECT * FROM test_api where id='.$_GET['id'];
        $result = mysqli_query($conn,$sql); 
        $result = mysqli_fetch_assoc($result);

    }
?>    
     <form id="formData" class="mx-auto w-25 mt-5 p-4 rounded border border-primary" action="http://localhost/test/teacher/hit_api.php" method="post">
            <input name="id" type="hidden" value="<?php echo @$result['id']; ?>" />
            <h4 class="text-center"><?php echo(@$result['id']) ? 'UPDATE' : 'INSERT'; ?></h4>
            <div class="d-flex justify-content-around mt-3">
            <div class="form-check">

                 <input class="form-check-input border-primary" type="radio" name="request" id="getMethod" value="Get"  <?php echo((@$result['request_type'] == 'Get')) ? 'checked' : ''; ?> >
			      <label class="form-check-label" for="getMethod">
			       GET
			      </label>
			 </div>
            <div class="form-check">
                 <input class="form-check-input border-primary" type="radio" name="request" id="postMethod" value="Post"  <?php echo((@$result['request_type'] == 'Post')) ? 'checked' : ''; ?> >
			      <label class="form-check-label" for="postMethod">
			       POST
			      </label>
			 </div>
			</div>

            <div class="d-flex">
                    <input type="text" class="form-control" name="url" placeholder="Enter URL" value="<?php echo @$result['url']; ?>">
                    <button class="btn btn-primary text-white" id="add-button">+</button>
                </div>
            
            <div class="form-group mt-3 " id="input-container">
                <?php 
                if (@$result['function']) {
                    
                    $result = json_decode($result['function'], true);
                    foreach ($result as $key => $value) {
                         echo "<div class='form-group d-flex mt-3'><input type='text' name='method[]' value='".$key."' class='form-control' placeholder='Enter method'><input type='text' name='method_name[]' class='form-control' value='".$value."' placeholder='Enter method name'><button class='delete-button btn btn-danger text-white'>-</button></div>";
                          }
                }


                ?>
		     </div>
                 <button type="submit" class="btn btn-primary w-100 rounded-pill my-4"><?php echo (@$_GET['id']) ? "Update" : "Save" ; ?></button>
    </form>
    <script>
        $(document).ready(function() {
            $("#add-button").click(function() {
                // Create a new input field with a delete button
                var newInputField = $("<div class='form-group d-flex mt-3'><input type='text' name='method[]' class='form-control' placeholder='Enter method'><input type='text' class='form-control' name='method_name[]' placeholder='Enter method name'><button class='delete-button btn btn-danger text-white'>-</button></div>");
                $("#input-container").append(newInputField);

                // Prevent the default form submission behavior
                return false;
            });

            // Use event delegation to handle delete button clicks
            $("#input-container").on("click", ".delete-button", function() {
                // Remove the parent div containing the input and delete button
                $(this).parent().remove();
            });


        });
    </script>
<?php
   include ('D:\xampp\htdocs\test\common\footer.php');
?>