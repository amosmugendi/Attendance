<?php 
     class crud { 
         //private database object 
         private $db;
         //constructor to initializa variable to the database connection
         function __construct($conn){
             $this->db=$conn;
         }
         public function insertAttendees($fname,$lname,$dob,$email,$contact,$specialty){
         try{
             $sql="INSERT INTO attendee (firstname,lastname,dob,email,contact,specialty_id)VALUES (:fname,:lname,:dob,:email,:contact,:specialty)";
             $stmt=$this->db->prepare($sql);
 
             $stmt->bindparam(':fname',$fname);
             $stmt->bindparam(':lname',$lname);
             $stmt->bindparam(':dob',$dob);
             $stmt->bindparam(':email',$email);
             $stmt->bindparam(':contact',$contact);
             $stmt->bindparam(':specialty',$specialty);
 
                //execute statement 
             $stmt-> execute();
             return true;
 
         }catch(PDOException $e){
             echo $e->getmessage();
             return false;
 
         }
     }

     public function getAttendees(){
        try{
        $sql = "SELECT * FROM `attendee` a inner join specialties s on s.specialty_id= a.specialty_id";
        $result=$this->db->query($sql);
        return $result;
        }catch(PDOException $e){
            echo $e->getmessage();
            return false;
        }
        
     }
     public function getAttendeeDetails($id)
     {try{ $sql="select * from attendee  a inner join specialties s on s.specialty_id= a.specialty_id
        where attendee_id=:id";
        $stmt= $this->db->prepare($sql);
        $stmt->bindparam(':id',$id);                            
        $stmt->execute();
        $result= $stmt->fetch();
        return $result;
        }catch(PDOException $e){
                echo $e->getmessage();
                return false;
            }
       
     }
     public function deleteAttendee($id){
        try{
            $sql= "delete from attendee where attendee_id=:id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getmessage();
            return false;
        }
        
     }
     public function editAttendee($id,$fname,$lname,$dob,$email,$contact,$specialty){
        try{
            $sql="UPDATE `attendee` SET `firstname`= :firstname,`lastname`=:lastname,`dob`=:dob,
            `email`=:email,`contact`=:contact,`specialty_id`=:specialty WHERE attendee_id= :attendee_id";
    
                    $stmt=$this->db->prepare($sql);
                    //bind all placeholders to the actual values
                    $stmt->bindparam(':id',$id); 
                    $stmt->bindparam(':fname',$fname);
                    $stmt->bindparam(':lname',$lname);
                    $stmt->bindparam(':dob',$dob);
                    $stmt->bindparam(':email',$email);
                    $stmt->bindparam(':contact',$contact);
                    $stmt->bindparam(':specialty',$specialty);
    
                    //execute statement 
                    $stmt-> execute();
                     return true;

        }catch(PDOException $e){
            echo $e->getmessage();
            return false;
        }
      
     }
     public function __getSpecialties(){
        $sql = "SELECT * FROM `specialties`;";
        $result=$this->db->query($sql);
        return $result;
     }
     public function getSpecialtyById($id){
        try{
            $sql="SELECT * FROM `specialties` where specialty_id=:id";
            $stmt= $this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            $result= $stmt->fetch();
            return $result;
        }catch(PDOException $e){
            echo  $e->getMessage();
            return false;
        }
     }
     
 }
        
     
?>