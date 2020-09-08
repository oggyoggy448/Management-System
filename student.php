<?php require("header.php") ?>

<!-- check if the user is not registered -->
<?php
if(!isset($_SESSION['email'])){
    header('location: login.php');
}

?>


<?php require("footer.php") ?>