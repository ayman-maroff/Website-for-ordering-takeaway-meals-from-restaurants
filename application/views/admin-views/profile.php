<?php 
// require_once '../../../application/config/config.php';
 ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/registercss.css">
    <title>Profile Page</title>
</head>

<body>
<br>

    <div class="container">
        <br>
        <h2>Profile Page</h2>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <form method="POST" action="<?php echo URL . 'user/updateUser'."/".$userId;?>">
            <div class="container2" method="post">
                <label id="label"> Profile Picture</label>
                <div id="profile-container">
                    <image id="profileImage" src="<?php echo URL; ?>public/img/user-icon.png" />
                </div>
                </br>
                </br>
                </br>
                </br>
                </br>
                <input id="name" type="text" name="firstname" placeholder="Firstname" size="15" onKeyup="manage(form)"value  ="<?php echo $array[0]->name;?>" required />
                </br>
                </br>
                <input id="name" type="text" name="lastname" placeholder="Lastname" size="15" onKeyup="manage(form)" value ="<?php echo $array[0]->lastname;?>" required/>
                </br>
                <div>
                    <br><br>
                    <br><br>
                    <label id="label">
                        Account type : </br></br>
                    </label>
                    <label id="label">
                    <?php echo $array[0]->roll;?>
                    </label>
                </div>
        
                </br>
                </br>
                <input id="name2" type="number" name="phonenumber" placeholder="Phone number" size="10" onKeyup="manage(form)" value ="<?php echo $array[0]->phone;?>" required>
                
                </br>
                </br>
                <input type="submit" name="btn1" id="submit"  class="registerbtn" title="you must fill all fields completely" value="Submit">
        </form>
   
        <script type="text/javascript" src="<?php echo URL;?>public/js/registerjs.js"></script>
    </div>
</div>
<br>
    <!-- </form> -->
</body>

</html>