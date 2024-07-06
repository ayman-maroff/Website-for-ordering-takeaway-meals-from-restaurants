<?php 
// require_once '../../../application/config/config.php';
 ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/registercss.css">
    <title>Register Page</title>
</head>

<body>
<br>

    <div class="container">
        <br>
        <h2>Add User</h2>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <form method="POST" action="<?php echo URL; ?>user/Aadduser">
            <div class="container2" method="post">
                <label id="label"> Profile Picture</label>
                <div id="profile-container">
                    <image id="profileImage" src="<?php echo URL; ?>public/img/user-icon.png" />
                </div>
                </br>
                </br>
                </br>
                <input id="name" type="text" name="firstname" placeholder="Firstname" size="15" onKeyup="manage(form)" />
                </br>
                </br>
                <input id="name" type="text" name="lastname" placeholder="Lastname" size="15" onKeyup="manage(form)" />
                </br>
                <div>
                    <br><br>
                    <br><br>
                    <label id="label">
                        Account type : </br></br>
                    </label>
                    <input type="radio" value="admin" name="ROLE" checked> Admin
                    <input type="radio" value="customer" name="ROLE"> customer
                </div>
        
                </br>
                </br>
                <input id="name2" type="number" name="phonenumber" placeholder="Phone number" size="10" onKeyup="manage(form)">
                <br>
                
                <div class="pw-meter">
                    <div class="form-element">
                        <div class="input-text">
                            <input type="password" placeholder="Enter Password" id="password" name="password1" size=25 onKeyup="manage(form)">
                        </div>
                        <div class="pw-display-toggle-btn">

                        </div>
                        <div class="pw-strength">
                            <span>Weak</span>
                            <span></span>
                        </div>
                    </div>
                </div>
                <input type="password" placeholder="Retype Password" name="password2" id="password2" size=25 onKeyup="manage(form)">
                </br>
                </br>
                </br>
                <input type="submit" name="btn1" id="submit" disabled=" disabled" class="registerbtn" title="you must fill all fields completely" value="Register">
        </form>
   
        <script type="text/javascript" src="<?php echo URL;?>public/js/registerjs.js"></script>
    </div>
</div>
<br>
    <!-- </form> -->
</body>

</html>