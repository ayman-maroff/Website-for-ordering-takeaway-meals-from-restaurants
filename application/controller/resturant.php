<?php
// session_start();

class resturant extends Controller
{
    function index(){
        header("Location:" . URL);
    }
    
    function resturantList()
    {
        
            $actionsModel = $this->loadModel('ResturantModel');
            $array = $actionsModel->resturantList();
            require_once 'application/templates/header.php';
            require_once 'application/views/admin-views/navbar.php';
            require_once 'application/views/admin-views/sidebar.php';
            require_once 'application/views/admin-views/resturant_profile.php';

    }
 
    function CresturantList()
    {
        
            $actionsModel = $this->loadModel('ResturantModel');
            $array = $actionsModel->resturantList();
            if(count($array)==0)
            {
                $_SESSION['alert_text'] = "There are no resturants to display!";
                $_SESSION['alert_code'] = "warning";
                require_once 'application/templates/header.php';
                require_once 'application/views/customer_views/navbar.php';
                require_once 'application/views/customer_views/sidebar.php';
            }
            else{
            require_once 'application/templates/header.php';
            require_once 'application/views/customer_views/navbar.php';
            require_once 'application/views/customer_views/sidebar.php';
            require_once 'application/views/customer_views/resturants.php';
            }

    }
    function addresturant()
    {
       
                
                $resturantname = $_POST['resturantname'];
                $resturantaddress = $_POST['resturantaddress'];
                $openTime = $_POST['openTime'];
                $closeTime = $_POST['closeTime'];
                $model_name = $this->loadModel('ResturantModel');
              
            $_return_value =  $model_name->add($resturantname, $resturantaddress,$openTime,$closeTime);
            if ($_return_value == "1") {
                $_SESSION['alert_text'] = "Add completed!";
                $_SESSION['alert_code'] = "success";
                $_SESSION['ref'] = "resturant/resturantList";
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once  'application/templates/scripts.php';
            } elseif ($_return_value == "2") {
                $_SESSION['alert_text'] = "An error occured!";
                $_SESSION['alert_code'] = "error";
                $_SESSION['ref'] = "resturant/resturantList";
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once  'application/templates/scripts.php';
            } elseif ($_return_value == "3") {
                $_SESSION['alert_text'] = "There is a restaurant with the same name!";
                $_SESSION['alert_code'] = "warning";
                $_SESSION['ref'] = "resturant/resturantList";
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once  'application/templates/scripts.php';
            }
            
     
    }
    function prepareToUpdateResturant($res_id)
    {
        $model_name = $this->loadModel('ResturantModel');
                $array = $model_name->preparetoupdate($res_id);
     $resturant_id=$res_id;
                    require_once 'application/templates/header.php';
                    require_once 'application/views/admin-views/navbar.php';
                    require_once 'application/views/admin-views/sidebar.php';
                    require_once  'application/views/admin-views/updateresturant.php';
                
     

    }

    function updateResturant( $resturant_id)
    {
        $resturantname = $_POST['resturantname'];
        $resturantaddress = $_POST['resturantaddress'];
        $openTime = $_POST['openTime'];
        $closeTime = $_POST['closeTime'];
        $model_name = $this->loadModel('ResturantModel');    
       
                $retrn = $model_name->resturantupdate($resturant_id,$resturantname, $resturantaddress, $openTime, $closeTime );

                if ($retrn == "1") {
                    $_SESSION['alert_text'] = "Update Completed!";
                    $_SESSION['alert_code'] = "success";
                    $_SESSION['ref'] = "resturant/resturantList";
                    require_once 'application/templates/header.php';
                    require_once 'application/views/admin-views/navbar.php';
                    require_once 'application/views/admin-views/sidebar.php';
                    require_once  'application/templates/scripts.php';
                }
                else {
                    $_SESSION['alert_text'] = "Update Failed!";
                    $_SESSION['alert_code'] = "error";
                    $_SESSION['ref'] = "resturant/resturantList";
                    require_once 'application/templates/header.php';
                    require_once 'application/views/admin-views/navbar.php';
                    require_once 'application/views/admin-views/sidebar.php';
                    require_once  'application/templates/scripts.php';
                }

            }
        
    public function deleteResturant($rid)
    {
        
            $model_name = $this->loadModel('ResturantModel');    
            $retrn = $model_name->deleteresturant($rid);
            if ($retrn == "1") {
                $_SESSION['alert_text'] = "Delete Completed!";
                $_SESSION['alert_code'] = "success";
                $_SESSION['ref'] = "resturant/resturantList";
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once  'application/templates/scripts.php';
            } else {
                $_SESSION['alert_text'] = "Delete Failed!";
                $_SESSION['alert_code'] = "error";
                $_SESSION['ref'] = "resturant/resturantList";
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once  'application/templates/scripts.php';
            }
      
    }
}
