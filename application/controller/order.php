<?php
class order extends Controller
{
    function index(){
        header("Location:" . URL);
    }

    function orderList($res_id,$res_name=null)
    {
        
            $actionsModel = $this->loadModel('OrderModel');
            $orders =  $actionsModel->orderList($res_id);
            require_once 'application/templates/header.php';
            require_once 'application/views/admin-views/navbar.php';
            require_once 'application/views/admin-views/sidebar.php';
            require_once 'application/views/admin-views/orders.php';
   
    }

    function ShowMyOrder($user_id)
    {
        
            $actionsModel = $this->loadModel('OrderModel');
            $orders =  $actionsModel->showmyorder($user_id);
            require_once 'application/templates/header.php';
            require_once 'application/views/customer_views/navbar.php';
            require_once 'application/views/customer_views/sidebar.php';
            require_once 'application/views/customer_views/myOrder.php';
   
    }
    public function addToOrder($meal_id,$res_id,$res_name)
    {
        $ArrayOfMealsIDs = array();
        $ArrayOfMealsIDs = $_SESSION['Meals'];
        array_push($ArrayOfMealsIDs, $meal_id);
        $_SESSION['res_id'] = $res_id;
        $_SESSION['Meals']=$ArrayOfMealsIDs;
        $_SESSION['alert_text'] = "The meal has been added to the order successfully!";
        $_SESSION['alert_code'] = "success";
        $_SESSION['ref'] = "meal/CmealList/".$res_name;
        //echo count($_SESSION['Meals']);
        require_once 'application/templates/header.php';
        require_once 'application/views/customer_views/navbar.php';
        require_once 'application/views/customer_views/sidebar.php';
        require_once  'application/templates/scripts.php';

    }
  
    public function removeFromOrder($meal_id,$res_id,$res_name)
    {
        $ArrayOfMealsIDs = array();
        $ArrayOfMealsIDs = $_SESSION['Meals'];
      if(in_array($meal_id, $ArrayOfMealsIDs ))
      {
        $index = array_search($meal_id, $ArrayOfMealsIDs);
        unset($ArrayOfMealsIDs[$index]);
        $_SESSION['Meals']=$ArrayOfMealsIDs;
        $_SESSION['alert_text'] = "The meal has been removed from the order successfully!";
        $_SESSION['alert_code'] = "success";
        $_SESSION['ref'] = "meal/CmealList/".$res_name;
        require_once 'application/templates/header.php';
        require_once 'application/views/customer_views/navbar.php';
        require_once 'application/views/customer_views/sidebar.php';
        require_once  'application/templates/scripts.php';
      }
      else{
        $_SESSION['alert_text'] = "The meal is basically not included in the request!";
        $_SESSION['alert_code'] = "warning";
        $_SESSION['ref'] = "meal/CmealList/".$res_name;
        require_once 'application/templates/header.php';
        require_once 'application/views/customer_views/navbar.php';
        require_once 'application/views/customer_views/sidebar.php';
        require_once  'application/templates/scripts.php';
      }

    }
    public function deleteOrder($order_id,$res_id,$res_name)
    {

        $model_name = $this->loadModel('OrderModel');
            $retrn = $model_name->deleteorder($order_id);

            if ($retrn == "1") {
                $_SESSION['alert_text']="Delete Completed!";
                $_SESSION['alert_code']="success";
                $_SESSION['ref'] = "order/orderList/".$res_id."/".$res_name;
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once  'application/templates/scripts.php';
            } else {
                $_SESSION['alert_text']="Delete Failed!";
                $_SESSION['alert_code']="error";
                $_SESSION['ref'] = "order/orderList/".$res_id."/".$res_name;
                        require_once 'application/templates/header.php';
                        require_once 'application/views/admin-views/navbar.php';
                        require_once 'application/views/admin-views/sidebar.php';
                        require_once  'application/templates/scripts.php';
            }
        
 

    }  
    public function   saveOrder($res_name){
        if (count($_SESSION['Meals'])==0)
        {
            $_SESSION['alert_text'] = "Please add meals to the request at first!";
            $_SESSION['alert_code'] = "warning";
            $_SESSION['ref'] = "meal/CmealList/".$res_name;
            require_once 'application/templates/header.php';
            require_once 'application/views/customer_views/navbar.php';
            require_once 'application/views/customer_views/sidebar.php';
            require_once  'application/templates/scripts.php';
        }
        else{
            $model_name = $this->loadModel('OrderModel');
            $meals = $model_name->saveorder();
            $ToltalTime =0;
            $TotalCost = 0;
            for ($i = 0; $i < count($_SESSION['Meals']); $i++) {
                $ToltalTime= $ToltalTime+$meals[$i][0]->prepTime;
                $TotalCost=$TotalCost+$meals[$i][0]->price;
            }
            $_SESSION['orderInfo']=array();
            $_SESSION['orderInfo']= $meals;
            require_once 'application/templates/header.php';
            require_once 'application/views/customer_views/navbar.php';
            require_once 'application/views/customer_views/sidebar.php';
            require_once 'application/views/customer_views/saveOrder.php';
        }
                
    }
    public function   CancelOrder( $res_name){
            $_SESSION['Meals']=array();
            $_SESSION['orderInfo']=array();
            $_SESSION['alert_text'] = "The request has been canceled!";
            $_SESSION['alert_code'] = "warning";
            $_SESSION['ref'] = "meal/CmealList/".$res_name;
            require_once 'application/templates/header.php';
            require_once 'application/views/customer_views/navbar.php';
            require_once 'application/views/customer_views/sidebar.php';
            require_once  'application/templates/scripts.php';
        
        }
    public function   AddOrder($res_name){
        $address = $_POST['address'];
        $model_name = $this->loadModel('OrderModel');
        $retern = $model_name->addorder( $address);
            if ($retern==1)
            {
                $_SESSION['alert_text'] = "The request has been added successfully and is being prepared. Please Wait!";
                $_SESSION['alert_code'] = "success";
                $_SESSION['ref'] = "meal/CmealList/".$res_name;
                require_once 'application/templates/header.php';
                require_once 'application/views/customer_views/navbar.php';
                require_once 'application/views/customer_views/sidebar.php';
                require_once  'application/templates/scripts.php';
            }
            else{
                $_SESSION['alert_text'] = "An error occurred, please try again!";
                $_SESSION['alert_code'] = "error";
                $_SESSION['ref'] = "meal/CmealList/".$res_name;
                require_once 'application/templates/header.php';
                require_once 'application/views/customer_views/navbar.php';
                require_once 'application/views/customer_views/sidebar.php';
                require_once  'application/templates/scripts.php';            }
                    
        }      
    }

