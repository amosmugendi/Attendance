<?php 
        $title="Sucess";
        require_once 'includes/header.php';
        require_once 'db/conn.php';
        require_once 'sendmail.php';
        if (isset($_POST['submit'])) {
            // Extract values from the $_POST array
            $fname = $_POST['firstname'];
            $lname = $_POST['lastname'];
            $dob = $_POST['dob'];
            $email = $_POST['email'];
            $contact = $_POST['phone'];
            $specialty = $_POST['specialty'];
        
            // Check if the "avatar" key is set in the $_FILES array
            if (isset($_FILES['avatar'])) {
                $orig_file = $_FILES['avatar']['name'];
                $target_dir = 'uploads/';
                $destination = $target_dir . basename($_FILES['avatar']['name']);
                move_uploaded_file($orig_file, $destination);
            } else {
                // Handle the situation when "avatar" key is not set
                $destination = null; // or assign a default value
            }
            // CALL FUNCTION to insert and track if success or not
            $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $specialty);
            $specialtyName = $crud->getSpecialtyById($specialty);
        
            if ($isSuccess) {
                SendEmail::SendMail($email, 'Welcome to IT conference', 'You have successfully been registered');
                include('includes/successmessage.php');
            } else {
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