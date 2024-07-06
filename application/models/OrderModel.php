<?php
require_once 'BaseModel.php';
class OrderModel extends BaseModel
{
    public function __construct($db)
    {
        parent::__construct($db, "question");
    }
    function orderList($res_id)
    {
        $Select = "SELECT id as oid,cost,address,time,meal_id,resturant_id,user_id FROM `order` where resturant_id = :res_id ";
        $query = $this->db->prepare($Select);
        $query->execute([":res_id" => $res_id]);
        $array= $query->fetchAll();
        return $array;
          
    }
    function showmyorder($user_id)
    {
        $Select = "SELECT id as oid,cost,address,time,meal_id,resturant_id,user_id FROM `order` where user_id = :user_id ";
        $query = $this->db->prepare($Select);
        $query->execute([":user_id" => $user_id]);
        $orders= $query->fetchAll();
        $mealsNames = array();
        $resturantNames = array();
        foreach ($orders as $order) {
            $mid =$order->meal_id;
            $res_id =$order->resturant_id;
            $Select = "SELECT name FROM meal where id= :mid ";
            $query = $this->db->prepare($Select);
            $query->execute([":mid" => $mid]);
            $temp1= $query->fetchColumn(); 
            array_push($mealsNames, $temp1);
            $Select = "SELECT name FROM resturant where id= :res_id ";
            $query = $this->db->prepare($Select);
            $query->execute([":res_id" => $res_id]);
            $temp2= $query->fetchColumn(); 
            array_push($resturantNames, $temp2);
    }
    $array1= array($resturantNames,$mealsNames);
    $array2= array($orders,$array1);
    return $array2;
    
}
 
    public function deleteorder($order_id)
    {
        $sql = "DELETE FROM `order` WHERE id = :order_id";
        $query = $this->db->prepare($sql);
        $query->execute([':order_id' => $order_id]);
        return "1";
    }
    public function saveorder()
    {
        $meals = array();
       
        foreach ($_SESSION['Meals'] as $mmid) {
            $Select = "SELECT id as mid,name,price,resturant_id,prepTime FROM meal where id= :mmid ";
            $query = $this->db->prepare($Select);
            $query->execute([":mmid" => $mmid]);
            $temp= $query->fetchAll(); 
            array_push($meals, $temp);
        
            
        }
        return $meals;
    }
    
    function addorder( $address)
    {
       $user_id = $_SESSION['userid'];
       $true = 1;
        for ($i = 0; $i < count($_SESSION['orderInfo']); $i++) {
            $price =$_SESSION['orderInfo'][$i][0]->price;
            $mealid=$_SESSION['orderInfo'][$i][0]->mid;
            $time=$_SESSION['orderInfo'][$i][0]->prepTime;
            $res_id =$_SESSION['orderInfo'][$i][0]->resturant_id;
  
            $Insert = "INSERT INTO `order` (cost,address,time,meal_id,resturant_id,user_id) 
            values( :price, :address, :time, :mealid,:res_id,:user_id)";
            $stmt = $this->db->prepare($Insert);
           if ($stmt->execute(array(
           ':price' => $price, ':address' => $address, ':time' => $time, ':mealid' => $mealid ,':res_id'=>$res_id,':user_id'=>$user_id))) {
            $true = 1;
               } else {
            $true = 0;
            break;
            } 
        } 

        if ($true==1)
        {
            $_SESSION['Meals']=array();
            $_SESSION['orderInfo']=array();
            return 1;
        }else{
            return 2;
        }
         
       
    }

}
