<?php
require_once 'BaseModel.php';
class ResturantModel extends BaseModel
{
    public function __construct($db)
    {
        parent::__construct($db, "material");
    }
    function resturantList()
    {

        $Select = "SELECT name ,id as rid,address , openTime,closeTime FROM resturant ";
        $query = $this->db->prepare($Select);
        $query->execute();
        $array = $query->fetchAll();

        return $array;
    }
    function coursesListST()
    {

        $Select = "SELECT mt_name ,material.id as cid FROM material where (material.id in (SELECT Material_id from topic));";
        $query = $this->db->prepare($Select);
        $query->execute();
        $array = $query->fetchAll();
        return $array;
    }

    public function add($resturantname, $resturantaddress,$openTime,$closeTime)
    {
        $Select = "SELECT name FROM resturant WHERE name = :resturantname";
        $stmt = $this->db->prepare($Select);
        $stmt->execute([":resturantname" => $resturantname]);
        $array = $stmt->fetchAll();
        $rnum = count($array);
        if ($rnum == 0) {
            $Insert = "INSERT INTO resturant (name,address,openTime,closeTime) 
            values( :resturantname, :resturantaddress, :openTime, :closeTime)";
            $stmt = $this->db->prepare($Insert);
           if ($stmt->execute(array(
           ':resturantname' => $resturantname, ':resturantaddress' => $resturantaddress, ':openTime' => $openTime, ':closeTime' => $closeTime ))) {
               // echo "New record inserted sucessfully.";4
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
    public function preparetoupdate($rid)
    {

            $Select = "SELECT name,address,openTime,closeTime  FROM resturant  WHERE ( id = :rid )";
            $stmt = $this->db->prepare($Select);
            $stmt->execute(array(':rid' => $rid));
            $array2 = $stmt->fetchAll();
            
            $Select = "SELECT name ,id as rid,address , openTime,closeTime FROM resturant ";
        $query = $this->db->prepare($Select);
        $query->execute();
        $array1 = $query->fetchAll();
            $array3 =array($array1,$array2);
            return $array3;
        }
    

    public function resturantupdate($resturant_id,$resturantname, $resturantaddress, $openTime, $closeTime)
    {

   
            $update = "UPDATE resturant SET name='$resturantname',address='$resturantaddress',openTime='$openTime',closeTime='$closeTime'  WHERE (resturant.id ='$resturant_id' )";
            $stmt = $this->db->prepare($update);
            if($stmt->execute()){
                return "1";
            }
            else {
                return "2"; 
            }
     }
    
    public function deleteresturant($rid)
    {
        $sql = "DELETE FROM resturant WHERE id = :rid";
        $query = $this->db->prepare($sql);
        $query->execute(array(':rid' => $rid));
    

            $Select = "SELECT id  FROM meal  WHERE ( resturant_id = '$rid' )";
            $stmt = $this->db->prepare($Select);
            if($stmt->execute()){
                return "1";
            }
            else {
                return "2"; 
            }
            $temp = $stmt->fetchAll();
            foreach ($temp as $id) {
                $sql = "DELETE FROM meal WHERE id = '$id->id'";
                $query = $this->db->prepare($sql);
                $query->execute();
            }
        
    }
}
