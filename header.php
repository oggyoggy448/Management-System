<!-- session start  -->
<?php 

session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Management System </title>
    <!-- bootstrap  -->
    <link rel="stylesheet" 
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- custom css -->
    <link rel="stylesheet" href="css/style.css">

    <!-- animate.css -->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"

    
  />

  <!-- aos library  -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

  <!-- font awesome 5 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

</head>
<body>


<!-- navbar -->
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php">MANAGEMENT SYSTEM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" 
  data-target="#navbar" aria-controls="navbar" 
  aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbar">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active home">
        <a class="nav-link text-white" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item about">
        <a class="nav-link text-white" href="about.php">About Us</a>
      </li>     
      
    </ul>
    <form class="form-inline my-2 my-lg-0">      
      <?php if(!isset($_SESSION['email'])) { ?>
        <a class="login_btn btn btn-light my-2 my-sm-0" href="login.php"> Login </a>
      <?php }else { ?>
      <a class="btn btn-danger my-2 my-sm-0" href="logout.php"> Logout </a>
      <?php
        
        }
      
      ?>
    </form>
  </div>
</nav>
    


