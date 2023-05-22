   
   <?php 
        $title="Index";
        require_once 'includes/header.php';
        require_once 'db/conn.php';
   $results=$crud->__getSpecialties();
       
    ?>
    <!-- 
        -first name
        -last name
        -Date of birth(use a date picker)
        -Speciality(Database Admin, Software Developer, Web Administrator)
        -email address
        -contact number

    -->
    
    <h1 class="text-center">Registration for IT Conference</h1>
    
    <form method="post" action="sucess.php">
    <div class="form-group">
        <label for="Firstname" class="form-label">First Name</label>
        <input type="text" class="form-control" id="firstname" placeholder="enter First Name" name="firstname">
    </div>
    <div class="form-group">
        <label for="Lastname" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="lastname" placeholder="enter Last Name" name="lastname">
    </div>
    <div class="form-group">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="text" class="form-control" id="dob" placeholder="enter date of birth" name="dob">
    </div>
    <div class="form-group">
        <label for="specialty">Area of Speciality</label>
        <select  class="form-select" aria-label="Default select example" id="specialty" name="specialty">
            <?php while($r =$results->fetch(PDO::FETCH_ASSOC)){?>
            <option value="<?php echo $r['specialty_id'] ?>"><?php echo $r['name'];?></option>
            <?php }?>
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="form-group">
        <label for="phone" class="form-label">Contact Number</label>
        <input type="text" class="form-control" id="phone" placeholder="enter contact number" name="phone">
        <div id="phoneHelp" class="form-text text-muted">We'll never share your contact number with anyone else.</div><br/>
    </div>
    <div class="custom-file">
       <input type="file" accept="image/*" class="custom-file-input" name="avatar" id="avatar"><br/>
        <label for="avatar" class="custom-file-label">Choose File</label>
        <small id="avatar" class="form-text text-danger"> FIle upload is Optional </small> 
    </div>
   
    <button type="submit " name="submit" class="btn btn-primary btn-block">Submit</button>
</form>
<br>
<br>
<br>
<br>

    <?php 
        require_once 'includes/footer.php';
    ?>
    