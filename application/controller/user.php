<?php


class user extends Controller
{
    function index(){
        header("Location:" . URL);
    }
    function login(){
        require_once 'application/views/users/login.php';
    }
    function signup()
    {
        
        require_once 'application/views/users/register.php';  
    } 
    function userList()
    {


        $actionsModel = $this->loadModel('UsersModel');
        $users = $actionsModel->userslist();
        require_once 'application/templates/header.php';
        require_once 'application/views/admin-views/navbar.php';
        require_once 'application/views/admin-views/sidebar.php';
        require_once 'application/views/admin-views/users.php';
    } 
    function preparetoaddUser(){
        
        require_once 'application/templates/header.php';
        require_once 'application/views/admin-views/navbar.php';
        require_once 'application/views/admin-views/sidebar.php';
        require_once 'application/views/users/adduser.php';
    }
    function adduser()
    {
 
        if (
            isset($_POST['firstname'])  && isset($_POST['lastname'])   &&
            isset($_POST['phonenumber'])
        ) {

            $model_name = $this->loadModel('UsersModel');
                $firstname = trim($_POST['firstname']);
                $firstname=strip_tags($firstname);
                $lastname =trim($_POST['lastname']);
                $lastname=strip_tags($lastname);
              
            $phonenumber = $_POST['phonenumber'];
            $pass = $_POST['password1'];

           $_return_value = $model_name->add($firstname, $lastname ,$phonenumber, $pass);

                     if ($_return_value == "1") {
                         $_SESSION['alert_text'] = "Add Completed!";
                         $_SESSION['alert_code'] = "success";
                         $_SESSION['ref'] = "user/userList";
                         require_once 'application/views/home/index.php';
                         require_once  'application/templates/scripts.php';
                     } elseif ($_return_value == "2") {
                         $_SESSION['alert_text'] = "An error occured!";
                         $_SESSION['alert_code'] = "error";
                         $_SESSION['ref'] = "user/userList";
                         require_once 'application/views/home/index.php';
                         require_once  'application/templates/scripts.php';
                     } elseif ($_return_value == "3") {
                         $_SESSION['alert_text'] = "Someone already has the same phone number!";
                         $_SESSION['alert_code'] = "warning";
                         $_SESSION['ref'] = "user/userList";
                         require_once 'application/views/home/index.php';
                         require_once  'application/templates/scripts.php';
                     }
                 }
             }
      function Aadduser()
    {
 
        if (
            isset($_POST['firstname'])  && isset($_POST['lastname'])   &&
            isset($_POST['phonenumber'])
        ) {

            $model_name = $this->loadModel('UsersModel');
                $firstname = trim($_POST['firstname']);
                $firstname=strip_tags($firstname);
                $lastname =trim($_POST['lastname']);
                $lastname=strip_tags($lastname);
              
            $phonenumber = $_POST['phonenumber'];
            $pass = $_POST['password1'];
            $role =  $_POST['ROLE'];

           $_return_value = $model_name->Aadd($firstname, $lastname ,$phonenumber, $pass,$role);

                     if ($_return_value == "1") {
                         $_SESSION['alert_text'] = "Add Completed!";
                         $_SESSION['alert_code'] = "success";
                         $_SESSION['ref'] = "user/userList";
                         require_once 'application/views/home/index.php';
                         require_once  'application/templates/scripts.php';
                     } elseif ($_return_value == "2") {
                         $_SESSION['alert_text'] = "An error occured!";
                         $_SESSION['alert_code'] = "error";
                         $_SESSION['ref'] = "user/userList";
                         require_once 'application/views/home/index.php';
                         require_once  'application/templates/scripts.php';
                     } elseif ($_return_value == "3") {
                         $_SESSION['alert_text'] = "Someone already has the same phone number!";
                         $_SESSION['alert_code'] = "warning";
                         $_SESSION['ref'] = "user/userList";
                         require_once 'application/views/home/index.php';
                         require_once  'application/templates/scripts.php';
                     }
                 }
             }
    
    function userprofileC($userId)
    {

        $model_name = $this->loadModel('UsersModel');
        $array = $model_name->prfileUser($userId);
        if (empty($array)) {
            $_SESSION['alert_text'] = "Invalid parameter!";
            $_SESSION['alert_code'] = "error";
            $_SESSION['ref'] = "user/index";
            require_once 'application/templates/header.php';
            require_once 'application/views/customer_views/navbar.php';
            require_once 'application/views/customer_views/sidebar.php';
            require_once  'application/templates/scripts.php';
        } else {
            require_once 'application/templates/header.php';
            require_once 'application/views/customer_views/navbar.php';
            require_once 'application/views/customer_views/sidebar.php';
              require_once 'application/views/customer_views/profile.php';
        }
    }
 
    function userprofileAD($userId)
    {
        $model_name = $this->loadModel('UsersModel');
        $array = $model_name->prfileUser($userId);
        if (empty($array)) {
            $_SESSION['alert_text'] = "Invalid parameter!";
            $_SESSION['alert_code'] = "error";
            $_SESSION['ref'] = "user/index";
            require_once 'application/templates/header.php';
            require_once 'application/views/admin-views/navbar.php';
            require_once 'application/views/admin-views/sidebar.php';
            require_once  'application/templates/scripts.php';
        } else {
            require_once 'application/templates/header.php';
            require_once 'application/views/admin-views/navbar.php';
            require_once 'application/views/admin-views/sidebar.php';
            require_once 'application/views/admin-views/profile.php';
        }
    }
    function confirmuser()
    {

        $name = $_POST['name'];
        $pass = $_POST['password'];
        $model_name = $this->loadModel('UsersModel');
        $array = $model_name->confirm($name, $pass);

       if($array==0){
    
           require_once 'application/views/users/loginfailed.php';

        }else{
           foreach ($array as $index) {
               if ($index->roll =="admin" ) {
                $_SESSION['userid'] = $index->id;
                $_SESSION['username']= $index->name;
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
               }
               if ($index->roll =="customer" ) {
                $_SESSION['userid'] = $index->id;
                $_SESSION['username']= $index->name;
                require_once 'application/templates/header.php';
                require_once 'application/views/customer_views/navbar.php';
                require_once 'application/views/customer_views/sidebar.php';
            }
            }
    }
}
    public function deleteUser($user_id)
    {
   
           
                $usermodel = $this->loadModel('UsersModel');
                $retrn =  $usermodel->deleteUser($user_id);
          
    
            if ($retrn == "1") {
                $_SESSION['alert_text'] = "Delete Completed!";
                $_SESSION['alert_code'] = "success";
                $_SESSION['ref'] = "user/userList";
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once  'application/templates/scripts.php';
            } else {
                $_SESSION['alert_text'] = "Delete Failed!";
                $_SESSION['alert_code'] = "success";
                $_SESSION['ref'] = "user/userList";
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once  'application/templates/scripts.php';
            }
  
    }
    function updateUser( $user_id)
    {
        $model_name = $this->loadModel('UsersModel');
                $firstname = trim($_POST['firstname']);
                $firstname=strip_tags($firstname);
                $lastname =trim($_POST['lastname']);
                $lastname=strip_tags($lastname);
              
            $phonenumber = $_POST['phonenumber'];   
       
                $retrn = $model_name->userupdate($user_id,$firstname, $lastname, $phonenumber );

                if ($retrn == "1") {
                    $_SESSION['alert_text'] = "Update Completed!";
                    $_SESSION['alert_code'] = "success";
                    $_SESSION['ref'] = "user/userprofileAD/". $user_id;
                    require_once 'application/templates/header.php';
                    require_once 'application/views/admin-views/navbar.php';
                    require_once 'application/views/admin-views/sidebar.php';
                    require_once  'application/templates/scripts.php';
                }
                else {
                    $_SESSION['alert_text'] = "Update Failed!";
                    $_SESSION['alert_code'] = "error";
                    $_SESSION['ref'] = "user/userprofileAD/". $user_id;
                    require_once 'application/templates/header.php';
                    require_once 'application/views/admin-views/navbar.php';
                    require_once 'application/views/admin-views/sidebar.php';
                    require_once  'application/templates/scripts.php';
                }

            }
    function logout()
    {
        $_SESSION = array("");
        require_once 'application/views/home/index.php';
    }

}