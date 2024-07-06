<?php
class meal extends Controller
{
    function index(){
        header("Location:" . URL);
    }

    function mealList($res_name ,$res_id)
    {
        
            $actionsModel = $this->loadModel('MealModel');
            $meals =  $actionsModel->mealList($res_name);
            require_once 'application/templates/header.php';
            require_once 'application/views/admin-views/navbar.php';
            require_once 'application/views/admin-views/sidebar.php';
            require_once 'application/views/admin-views/meals.php';
   
    }
    function CmealList($res_name ,$res_id = null)
    {
       
            $actionsModel = $this->loadModel('MealModel');
            $meals =  $actionsModel->mealList($res_name);
            if(count($meals)==0)
            {
                $_SESSION['alert_text'] = "There are no meals to display!";
                $_SESSION['alert_code'] = "warning";
                $_SESSION['ref'] = "resturant/CresturantList";
                require_once 'application/templates/header.php';
                require_once 'application/views/customer_views/navbar.php';
            require_once 'application/views/customer_views/sidebar.php';
                require_once  'application/templates/scripts.php';
            }
            else{
            require_once 'application/templates/header.php';
            require_once 'application/views/customer_views/navbar.php';
            require_once 'application/views/customer_views/sidebar.php';
            require_once 'application/views/customer_views/meals.php';
            }
    }

    function addMeal($res_id,$resname)
    {
      
        $mealname = $_POST['Mtext'];
        $mealprice = $_POST['price'];
        $mealtime = $_POST['time'];
      
          

            $model_name = $this->loadModel('MealModel');
                    $retrn = $model_name->addmeal($res_id,$mealname,$mealprice, $mealtime);

                    if ($retrn == "1") {
                        $_SESSION['alert_text']="Add Completed!";
                        $_SESSION['alert_code']="success";
                        $_SESSION['ref'] = "meal/mealList/".$resname."/".$res_id;
                        require_once 'application/templates/header.php';
                        require_once 'application/views/admin-views/navbar.php';
                        require_once 'application/views/admin-views/sidebar.php';
                        require_once  'application/templates/scripts.php';
                    } elseif($retrn == "2") {
                        $_SESSION['alert_text']="Add Failed!";
                        $_SESSION['alert_code']="error";
                        $_SESSION['ref'] = "meal/mealList/".$resname."/".$res_id;
                        require_once 'application/templates/header.php';
                        require_once 'application/views/admin-views/navbar.php';
                        require_once 'application/views/admin-views/sidebar.php';
                        require_once  'application/templates/scripts.php';
                    }
                    elseif($retrn == "3"){
                        $_SESSION['alert_text'] = "There is a meal with the same name!";
                        $_SESSION['alert_code'] = "warning";
                        $_SESSION['ref'] = "meal/mealList/".$resname."/".$res_id;
                        require_once 'application/templates/header.php';
                        require_once 'application/views/admin-views/navbar.php';
                        require_once 'application/views/admin-views/sidebar.php';
                        require_once  'application/templates/scripts.php';
                    }
                }
       
        
    function prepareAddmeal($res_id,$res_name)
    {
      
            require_once 'application/templates/header.php';
            require_once 'application/views/admin-views/navbar.php';
            require_once 'application/views/admin-views/sidebar.php';
            require_once 'application/views/admin-views/add-meal.php';
      
    }

    public function deleteMeal($meal_id,$res_name,$res_id)
    {

        $model_name = $this->loadModel('MealModel');
            $retrn = $model_name->deletemeal($meal_id);

            if ($retrn == "1") {
                $_SESSION['alert_text']="Delete Completed!";
                $_SESSION['alert_code']="success";
                $_SESSION['ref'] = "meal/mealList/".$res_name."/".$res_id;
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once  'application/templates/scripts.php';
            } else {
                $_SESSION['alert_text']="Delete Failed!";
                $_SESSION['alert_code']="error";
                $_SESSION['ref'] = "meal/mealList/".$res_name."/".$res_id;
                        require_once 'application/templates/header.php';
                        require_once 'application/views/admin-views/navbar.php';
                        require_once 'application/views/admin-views/sidebar.php';
                        require_once  'application/templates/scripts.php';
            }
 

    }
    function prepareToUpdateMeal($meal_id,$resname)
    {
       
            $model_name = $this->loadModel('MealModel');
            $array = $model_name->preparetoupdate($meal_id);
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once 'application/views/admin-views/update-meal.php';
            
     
    }
    function updateMeal($meal_id,$res_id,$resname)
    {
     
            $mealname = $_POST['Mtext'];
            $mealprice = $_POST['price'];
            $mealtime = $_POST['time'];
          
              

                $model_name = $this->loadModel('MealModel');
         
                $retrn = $model_name->Mealupdate($meal_id,$res_id,$mealname,$mealprice, $mealtime);

                if ($retrn == "1") {
                    $_SESSION['alert_text']="Update Completed!";
                    $_SESSION['alert_code']="success";
                    $_SESSION['ref'] = "meal/mealList/".$resname."/".$res_id;
                    require_once 'application/templates/header.php';
                    require_once 'application/views/admin-views/navbar.php';
                    require_once 'application/views/admin-views/sidebar.php';
                    require_once  'application/templates/scripts.php';
                } else {
                    $_SESSION['alert_text']="Update Failed!";
                    $_SESSION['alert_code']="error";
                    $_SESSION['ref'] = "meal/mealList/".$resname."/".$res_id;
                    require_once 'application/templates/header.php';
                    require_once 'application/views/admin-views/navbar.php';
                    require_once 'application/views/admin-views/sidebar.php';
                    require_once  'application/templates/scripts.php';
                }
            }
       
   
    
}
