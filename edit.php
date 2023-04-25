<?php 
        $title="Edit Record";
        require_once 'includes/header.php';
        require_once 'db/conn.php';
     $results=$crud->__getSpecialties();

    if(!isset($_GET['id'])){ 
        //error messages 
        include 'includes/errormessage.php';
        header("Location: viewrecords.php ");
    } else{
        $id=$_GET['id'];
        $attendee=$crud->getAttendeeDetails($id);
   

   
       
    ?>
    <h1 class="text-center">Edit Records</h1>
    
    <form method="post" action="editpost.php">
    <input  type="hidden" name="id" value="<?php echo $attendee['attendee_id'] ?>"/> 
    <div class="form-group">
        <label for="Firstname" class="form-label">First Name</label>
        <input type="text" class="form-control" value="<?php echo $attendee ['firstname'] ?>" id="firstname" placeholder="enter First Name" name="firstname">
    </div>
    <div class="form-group">
        <label for="Lastname" class="form-label">Last Name</label>
        <input type="text" class="form-control" value="<?php echo $attendee ['lastname'] ?>" id="lastname" placeholder="enter Last Name" name="lastname">
    </div>
    <div class="form-group">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="text" class="form-control" value="<?php echo $attendee ['dob'] ?>" id="dob" placeholder="enter date of birth" name="dob">
    </div>
    <div class="form-group">
        <label for="specialty">Area of Expertise </label>
        <select  class="form-select"  aria-label="Default select example" id="specialty" name="specialty">
            <?php while($r =$results->fetch(PDO::FETCH_ASSOC)){?>
            <option  value="<?php echo $r['specialty_id'] ?>" <?php if($r['specialty_id']==
            $attendee['specialty_id'])echo 'selected'?>>
                <?php echo $r['name'];?>
            </option>
            <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1" value="<?php echo $attendee ['email'] ?>" class="form-label">Email address</label>
        <input type="email" class="form-control" value="<?php echo $attendee ['email'] ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="form-group">
        <label for="phone" class="form-label">Contact Number</label>
        <input type="text" class="form-control" value="<?php echo $attendee ['contact'] ?>" id="phone" placeholder="enter contact number" name="phone">
        <div id="phoneHelp" class="form-text text-muted">We'll never share your contact number with anyone else.</div>
    </div>
   
    <button type="submit " name="save" class="btn btn-success btn-block">save changes</button>
</form>
<?php  } ?>
<br>
<br>
<br>
<br>

    <?php 
        require_once 'includes/footer.php';
    ?>
    