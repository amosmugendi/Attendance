<?php 
// this includes the session file, this file contains code that starts/resumes a session
// by having it in the header file, it will be included on every other page, allowing session capabilities to be used on every page across the website 
  include_once('includes/session.php')
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="css/site.css"/>
     
    <title> Attendance <?php $title?></title>
</head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">IT CONFERENCE</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse container" id="navbarNavAltMarkup">
        <div class="navbar-nav mr-auto">
          <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
          <a class="nav-link" href="viewrecords.php">View Attendees</a>
    
        </div>
        <div class="navbar-nav ml-auto">
          <?php
          if(!isset($_SESSION['id'])){

        
          ?>
        <a class="nav-item nav-link" href="login.php"> Login <span class="sr-only">(current)</span></a>
        <?php } else{ ?>
          
          <a class="nav-item nav-link" href="#"><span>Hello <?php echo $_SESSION['username'] ?> !</span><span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="logout.php"> Logout <span class="sr-only">(current)</span></a>
          <?php } ?>
        </div>
      </div>
    </div>
</nav> 
  <div class="container">
 
</br>