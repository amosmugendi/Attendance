<?php 
use LDAP\Result;
    require_once('db/conn.php');
    require_once 'includes/session.php';
    require_once 'includes/auth_check.php';
    //get values from post operation
    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $id=$_POST['attendee_id'];
        $fname=$_POST['firstname'];
        $lname=$_POST['lastname'];
        $dob=$_POST['dob'];
        $email=$_POST['email'];
        $contact=$_POST['phone'];
        $specialty=$_POST['specialty'];
    
    //call Crud function
    $result=$crud->editAttendee($id,$fname,$lname,$dob,$email,$contact,$specialty);
    //Redirect to viewrecords.php
    if($result){
        header("Location: index.php");
    }
    }
    else{
        include 'includes/errormessage.php';
    }

?>