 <?php
    session_start();
    
    if(!isset($_SESSION['code_user'])) {
        header('location:login.php');
        exit();
    }

?>
