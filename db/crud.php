<?php
class crud{
    private $db;
    function __construct($conn){
        $this->db = $conn;
    }
    public function insertAttendees($fname, $lname, $dob, $email, $contact, $specialty){
        try{
            $sql ="INSERT INTO attendee (firstname,lastname,dateofbirth,email,contact,specialty_id) VALUES (:fname,:lname,:dob,:email,:contact,:specialty)";
            $stmt=$this->db->prepare($sql);

            $stmt->bindparam(':fname',$fname);
            $stmt->bindparam(':lname',$lname);
            $stmt->bindparam(':dob',$dob);
            $stmt->bindparam(':email',$email);
            $stmt->bindparam(':contact',$contact);
            $stmt->bindparam(':specialty',$specialty);
           

            $stmt->execute();
            return true;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            return false;

        }
    }
    public function editAttendee($id,$fname, $lname, $dob, $email,$contact,$specialty){
        try{ 
             $sql = "UPDATE `attendee` SET `firstname`=:fname,`lastname`=:lname,`dateofbirth`=:dob,`email`=:email,`contact`=:contact,`specialty_id`=:specialty WHERE attendee_id = :id ";
             $stmt = $this->db->prepare($sql);
             // bind all placeholders to the actual values
             $stmt->bindparam(':id',$id);
             $stmt->bindparam(':fname',$fname);
             $stmt->bindparam(':lname',$lname);
             $stmt->bindparam(':dob',$dob);
             $stmt->bindparam(':email',$email);
             $stmt->bindparam(':contact',$contact);
             $stmt->bindparam(':specialty',$specialty);

             // execute statement
             $stmt->execute();
             return true;
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
           }
    }
    public function getAttendees(){
       try{
        $sql = "SELECT * FROM `attendee` a inner join specialty s on a.specialty_id = s.specialty_id";
        $result=$this->db->query($sql);
        return $result;
       }catch (PDOException $e) {
        echo $e->getMessage();
        return false;
       }
    }
    public function getAttendeeDetails($id){
       try{
        $sql = "SELECT * FROM `attendee` a inner join specialty s on a.specialty_id = s.specialty_id WHERE attendee_id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
       }catch (PDOException $e) {
        echo $e->getMessage();
        return false;
       }
     }
     public function deleteAttendee($id){
        try{
             $sql = "delete from attendee where attendee_id = :id";
             $stmt = $this->db->prepare($sql);
             $stmt->bindparam(':id', $id);
             $stmt->execute();
             return true;
         }catch (PDOException $e) {
             echo $e->getMessage();
             return false;
         }
     }
    public function getSpecialties(){
        try{
        $sql = "SELECT * FROM `specialty`;";
        $result=$this->db->query($sql);
        return $result;
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
           }
    }
    
} 

?>