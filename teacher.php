<?php require("header.php") ?>
<?php 

    if(!isset($_SESSION['email'])){

        header('location: login.php');
    }

?>

<?php require('footer.php') ?>