<?php

session_start();

session_unset();

header('Location: http://localhost/test/common/login.php');

?>