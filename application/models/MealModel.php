<?php
require_once 'BaseModel.php';
class MealModel extends BaseModel
{
    public function __construct($db)
    {
        parent::__construct($db, "question");
    }
    function mealList($res_name)
    {

        $Select = "SELECT  id FROM  resturant where name= :res_name";
        $stmt = $this->db->prepare($Select);
        $stmt->execute([":res_name" => $res_name]);
        $res_id = $stmt->fetchColumn();

        $Select = "SELECT id as mid,name,price,resturant_id,prepTime FROM meal where resturant_id= :res_id ";

        $query = $this->db->prepare($Select);
        $query->execute([":res_id" => $res_id]);
        return $query->fetchAll();   
    }

    function addmeal($res_id,$mealname,$mealprice, $mealtime)
    {
        $Select = "SELECT name FROM meal WHERE name = :mealname";
        $stmt = $this->db->prepare($Select);
        $stmt->execute([":mealname" => $mealname]);
        $array = $stmt->fetchAll();
        $rnum = count($array);
        if ($rnum == 0) {
            $Insert = "INSERT INTO meal (name,price,resturant_id,prepTime) 
            values( :mealname, :mealprice, :res_id, :mealtime)";
            $stmt = $this->db->prepare($Insert);
           if ($stmt->execute(array(
           ':mealname' => $mealname, ':mealprice' => $mealprice, ':res_id' => $res_id, ':mealtime' => $mealtime ))) {
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
    public function deletemeal($meal_id)
    {
        $sql = "DELETE FROM meal WHERE id = :meal_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':meal_id' => $meal_id));
        return "1";
    }

    public function preparetoupdate($meal_id)
    {
        $Select = "SELECT id as mid,name,price,resturant_id,prepTime FROM meal where id= :meal_id ";

        $query = $this->db->prepare($Select);
        $query->execute([":meal_id" => $meal_id]);
        return $query->fetchAll();
    }

    public function Mealupdate($meal_id,$res_id,$mealname,$mealprice, $mealtime)
    {
       
        $update = "UPDATE meal SET name='$mealname',price='$mealprice',resturant_id='$res_id',prepTime='$mealtime'  WHERE (meal.id ='$meal_id' )";
        $stmt = $this->db->prepare($update);
        if($stmt->execute()){
            return "1";
        }
        else {
            return "2"; 
        }
    }
}
