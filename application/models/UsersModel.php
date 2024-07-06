<?php
require_once 'BaseModel.php';
class UsersModel extends BaseModel
{
    public function __construct($db)
    {
        parent::__construct($db, "user");
    }

   

    public function add($firstname, $lastname, $phonenumber, $pass)
    {
        $role = "customer";
        $Select = "SELECT phone FROM user WHERE phone = :phonenumber";
        $stmt = $this->db->prepare($Select);
        $stmt->execute([":phonenumber" => $phonenumber]);
        $array = $stmt->fetchAll();
        $rnum = count($array);
        if ($rnum == 0) {
            $Insert = "INSERT INTO user (name,phone,roll,lastname,password) 
            values( :firstname, :phonenumber, :role, :lastname, :pass)";
            $stmt = $this->db->prepare($Insert);
           if ($stmt->execute(array(
           ':firstname' => $firstname, ':phonenumber' => $phonenumber, ':role' => $role, ':lastname' => $lastname,
           ':pass' => $pass ))) {
           
                return "1";
               } else {
               // echo 'error';
                  return "2";
              }
        }
       else {
         
            return "3";
        }
    }
    public function Aadd($firstname, $lastname, $phonenumber, $pass,$role)
    {
        
        $Select = "SELECT phone FROM user WHERE phone = :phonenumber";
        $stmt = $this->db->prepare($Select);
        $stmt->execute([":phonenumber" => $phonenumber]);
        $array = $stmt->fetchAll();
        $rnum = count($array);
        if ($rnum == 0) {
            $Insert = "INSERT INTO user (name,phone,roll,lastname,password) 
            values( :firstname, :phonenumber, :role, :lastname, :pass)";
            $stmt = $this->db->prepare($Insert);
           if ($stmt->execute(array(
           ':firstname' => $firstname, ':phonenumber' => $phonenumber, ':role' => $role, ':lastname' => $lastname,
           ':pass' => $pass ))) {
               // echo "New record inserted sucessfully.";4
                return "1";
               } else {
               // echo 'error';
                  return "2";
              }
        }
       else {
            // echo "Someone already registers using this phone.";
            return "3";
        }
    }


    public function confirm($Name, $pass)
    {
        

        $Select = "SELECT name,id,roll FROM user WHERE ( name = :Name and password= :pass )";
        $stmt = $this->db->prepare($Select);
        $stmt->execute(array(':Name' => $Name, ':pass' => $pass));
        $array = $stmt->fetchAll();
        $rnum = count($array);
        if ($rnum == 0) {
            // echo "<h1>Login Failed!</h1> ";
            return 0;
        } else {
            return $array;
        }
    }

    function prfileUser($ID)
    {
        $Select = "SELECT * FROM user where( id = '$ID' )";
        $query = $this->db->prepare($Select);
        $query->execute();
        return $query->fetchAll();
    }


    function userslist()
    {
        $Select = "SELECT user.id as iid,name,lastname,phone,roll FROM user ";
        $query = $this->db->prepare($Select);
        $query->execute();
        return $query->fetchAll();
    }
    public function deleteUser($user_id)
    {
        $sql = "DELETE FROM user WHERE id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $user_id));
        return "1";
    }
    public function userupdate($user_id,$firstname, $lastname, $phonenumber )
    {
        $update = "UPDATE `user` SET `name`='$firstname',`lastname`='$lastname',`phone`='$phonenumber'  WHERE (user.id ='$user_id' )";
        
        $stmt = $this->db->prepare($update);
        if($stmt->execute()){
            return "1";
        }
        else {
            return "2"; 
        }
    }
}
