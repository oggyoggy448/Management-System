<?php require('header.php') ?>

<!-- verify that use is already logged in -->
<?php 

if(!isset($_SESSION['email'])){
    header('location: login.php');
}

?>





<?php require('footer.php') ?>