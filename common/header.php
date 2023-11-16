<?php
ob_start();
session_start();

if(!isset($_SESSION['id'])){
    header('Location:http://localhost/test/common/login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>User Management</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/test/common/bootstrap.css">
    <!-- <link rel="stylesheet" href="http://localhost/test/common/bootstrap-icons-1.10.5/bootstrap-icons.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script type="text/javascript" src="http://localhost/test/common/jquery.js"></script>

</head>
<body>
    <div class="container-fluid">
        <div class="row bg-info py-2 d-flex flex-row py-3">
            <div class="col-md-6">
                <h2 class="text-white">COURSE MANAGEMENT SYSTEM</h2>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <div>    
                <h4 class="text-capitalize text-white pt-2 "> Hello Mr. <?= $_SESSION['name']; ?>  </h4>
                </div>
            <!-- Button trigger modal -->
                <div>
                <button type="button" class="btn btn-dark m-2 p-0 h4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-three-dots-vertical text-white"></i>
                </button>
                </div>
            </div>    
        </div>
<?php
if($_SESSION['role'] == "USER"){
?>        
        <div class="row">
           <nav class="d-flex justify-content-between bg-dark">
            
            <ul class="nav">
               <li class="nav-item">
                  <a class="btn btn-dark btn-lg " href="http://localhost/test/user/home.php">
                  HOME
                  </a>
               </li>
               <li class="nav-item">
                  <a class="btn btn-dark btn-lg " href="http://localhost/test/user/index.php">
                  USER
                  </a>
               </li>
               <li class="nav-item">
                  <a class="btn btn-dark btn-lg " href="http://localhost/test/teacher/index.php">
                  TEACHER
                  </a>
               </li>
               <li class="nav-item">
                  <a class="btn btn-dark btn-lg" href="http://localhost/test/student/index.php">
                  STUDENT
                  </a>
               </li>
               <li class="nav-item">
                  <a class="btn btn-dark btn-lg" href="http://localhost/test/course/index.php">
                  COURSE
                  </a>
               </li>
               <li class="nav-item">
                  <a class="btn btn-dark btn-lg" href="http://localhost/test/common/assign_course.php">
                  ASSIGN COURSE
                  </a>
               </li>
               <li class="nav-item">
                  <a class="btn btn-dark btn-lg" href="http://localhost/test/common/assign_teacher.php">
                  ASSIGN TEACHER
                  </a>
               </li>
               <li class="nav-item">
                  <a class="btn btn-dark btn-lg" href="http://localhost/test/teacher/report.php">
                  REPORT
                  </a>
               </li>
            </ul>
            <a class="btn btn-danger  btn-lg" href="http://localhost/test/common/logout.php">
              LOG OUT
            </a>
            
           </nav>
        </div>
<?php
      }

if($_SESSION['role'] == "STUDENT"){
     
          // Define an array of allowed URLs
          $allowedUrls = array(
              '/test/common/header.php',
              '/test/course/index.php',
              '/test/student/home.php',
              '/test/student/mycertificate.php',
              '/test/common/view_certificate.php',
          );

          // Get the requested URL
          $requestUrl = $_SERVER['REQUEST_URI'];

          // Check if the requested URL is in the list of allowed URLs
          if (!in_array($requestUrl, $allowedUrls)) {
              // The requested URL is not allowed, deny access
              echo "<h1>You are not authorized to this page.</h1>";
              exit;
          }

          //If the requested URL is allowed, continue processing the request
?>

        <div class="row">
           <nav class="d-flex justify-content-between bg-dark">
            
            <ul class="nav">
              <li class="nav-item">
                  <a class="btn btn-dark btn-lg " href="http://localhost/test/student/home.php">
                  HOME
                  </a>
               </li>

               <li class="nav-item">
                  <a class="btn btn-dark btn-lg" href="http://localhost/test/course/index.php">
                  COURSE
                  </a>
               </li>
               <li class="nav-item">
                  <a class="btn btn-dark btn-lg" href="http://localhost/test/student/mycertificate.php">
                  MY CERTIFICATE
                  </a>
               </li>
            </ul>
            <a class="btn btn-danger  btn-lg" href="http://localhost/test/common/logout.php">
              LOG OUT
            </a>
            
           </nav>
        </div>
<?php
      }
?>
<?php
if($_SESSION['role'] == "TEACHER"){
         //Define an array of allowed URLs
           $allowedUrls = array(
               '/test/teacher/home.php',
               '/test/course/index.php',
               '/test/student/index.php',
               '/test/common/assign_course.php',
               '/test/common/generate_certificate.php',
               '/test/teacher/report.php',
               '/test/common/api.php',
               '/test/teacher/url.php',
               '/test/teacher/hit_api.php'
           );

           // Get the requested URL
           $requestUrl = $_SERVER['REQUEST_URI'];

           // Check if the requested URL is in the list of allowed URLs
           if (!in_array($requestUrl, $allowedUrls)) {
           //     The requested URL is not allowed, deny access
               echo "<h1>You are not authorized to this page.</h1>";
               exit;
           }
           // If the requested URL is allowed, continue processing the request
?>        
        <div class="row">
           <nav class="d-flex justify-content-between bg-dark">
            
            <ul class="nav">
              <li class="nav-item">
                  <a class="btn btn-dark btn-lg " href="http://localhost/test/teacher/home.php">
                  HOME
                  </a>
               </li>
               <li class="nav-item">
                  <a class="btn btn-dark btn-lg" href="http://localhost/test/student/index.php">
                  STUDENT
                  </a>
               </li>
               <li class="nav-item">
                  <a class="btn btn-dark btn-lg" href="http://localhost/test/course/index.php">
                  COURSE
                  </a>
               </li>
               <li class="nav-item">
                  <a class="btn btn-dark btn-lg" href="http://localhost/test/common/assign_course.php">
                  ASSIGN COURSE
                  </a>
               </li>
               <li class="nav-item">
                  <a class="btn btn-dark btn-lg" href="http://localhost/test/teacher/report.php">
                  REPORT
                  </a>
               </li>
               <li class="nav-item">
                  <a class="btn btn-dark btn-lg" href="http://localhost/test/common/generate_certificate.php">
                  CERTIFICATE
                  </a>
               </li>
               <li class="nav-item">
                  <a class="btn btn-dark btn-lg" href="http://localhost/test/teacher/url.php">
                  URL
                  </a>
               </li>
            </ul>
            <a class="btn btn-danger  btn-lg" href="http://localhost/test/common/logout.php">
              LOG OUT
            </a>
            
           </nav>
        </div>
<?php
      }          
?>       
        <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                         <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel"><?= $_SESSION['role']; ?></h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>

                         <div class="modal-body">
                          <table>
                                    <tr>
                                        <th>Field</th><th>Information</th>
                                    </tr>
                                    <tr>
                                        <td>Name:</td><td><?= $_SESSION['name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td><td><?= $_SESSION['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Mobile:</td><td><?= $_SESSION['mobile']; ?></td>
                                    </tr>
                            </table>
                         </div>

                         <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         </div>
                      </div>
                    </div>
            </div>   

        </div>
      