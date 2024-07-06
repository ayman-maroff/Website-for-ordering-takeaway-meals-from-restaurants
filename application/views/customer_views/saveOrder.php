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
        <h2>Save Order</h2>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <form method="POST" action="<?php echo URL . 'order/AddOrder/' .  $res_name;?>">
            <div class="container2" method="post">
                <div id="profile-container">
                    <image id="profileImage" src="<?php echo URL; ?>public/img/image2.png" />
                </div>
                </br>
                </br>
                </br>
                </br>
                </br>
                </br>
                </br>
                </br>
                </br>
                </br>
                    <label id="label">
                       Meals : </br>
                    </label>
                    <?php for ($i = 0; $i < count($_SESSION['Meals']); $i++) { ?>
                        <label id="label">
                
                    <?php echo $i+1 ."-"?>
                    </label>
                    </br>
                    <label id="label">
                        Name: 
                    <?php echo $meals[$i][0]->name;?>
                    </label>
                    </br>
                    <label id="label">
                        Price: 
                    <?php echo $meals[$i][0]->price;?>
                    </label>
                    </br>
                    <label id="label">
                    Preparation Time: 
                    <?php echo $meals[$i][0]->prepTime;?>
                    </label>
                    </br>
                    </br>
                    <?php } ?>
                </div>
                <label id="label">
                    Total Cost: 
                    <?php echo $TotalCost."$";?>
                    </label>
                </br>
                <label id="label">
                  Total  Preparation Time: 
                    <?php echo $ToltalTime."min"?>
                    </label>
                    </br>
                    <input id="name" type="text" name="address" placeholder="Address" size="15" onKeyup="manage(form)" required/>
                    </br>
                <input type="submit" name="btn1" id="submit"  class="registerbtn"  value="Save and Request">
        </form>
        <a id="submit"  class="registerbtn" href="<?php echo URL . 'order/CancelOrder/'  .  $res_name; ?>" style ="color:#295772;background-color:red; margin: 4px 50px;">Cancel</a> 
        <script type="text/javascript" src="<?php echo URL;?>public/js/registerjs.js"></script>
    </div>
</div>
<br>
    <!-- </form> -->
</body>

</html>