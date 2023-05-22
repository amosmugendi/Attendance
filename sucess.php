<?php 
        $title="Sucess";
        require_once 'includes/header.php';
        require_once 'db/conn.php';
        require_once 'sendmail.php';

        if(isset($_POST['submit'])){
            //extract values from the $_POST array
            $fname=$_POST['firstname'];
            $lname=$_POST['lastname'];
            $dob=$_POST['dob'];
            $email=$_POST['email'];
            $contact=$_POST['phone'];
            $specialty=$_POST['specialty'];
            //CALL FUNCTIONto isnert and track if success or not
            $isSuccess= $crud->insertAttendees($fname,$lname,$dob,$email,$contact,$specialty);
            $specialtyName= $crud->getSpecialtyById($specialty);
            if($isSuccess){
               SendEmail::SendMail($email, 'Welco to IT conference' , 'You have sucessfully been registered');

              include('includes/sucessmessage.php') ;
            }
            else{
               include 'includes/errormessage.php';
            }
        }


    ?>

      
    <div class="card" style="width: 18rem">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $_POST['firstname'].''.$_POST['lastname'];?>
            </h5>
            <h6 class="Card-subtitle mb-2 text-muted">
                 <?php echo $specialtyName['name'];?>
            </h6>
            <p class="card-text">
                Date of birth: <?php echo $_POST['dob'];?>
            </p>
            <p class="card-text">
                Email Adress: <?php echo $_POST['email'];?>
            </p>
            <p class="card-text">
                Contact Number: <?php echo $_POST['phone'];?>
            </p>
            
        </div>

    </div>
      <?php 
       echo $_POST['firstname'];
       echo $_POST['lastname'];
       echo $_POST['specialty'];
       echo $_POST['phone'];
       echo $_POST['email'];
       echo $_POST['dob']; 
      
      
      ?>
<br>
<br>
<br>
<br>

    <?php 
        require_once 'includes/footer.php';
    ?>