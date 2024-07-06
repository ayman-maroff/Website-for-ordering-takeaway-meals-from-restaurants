<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/add-meal.css">
    <title>AddQuestion page</title>
    <style>
            h2{
            margin-left:170px;
                    }
    </style>
</head>


<body>

<br>
    <div class="container">
</br>
        <h2>Add a Question</h2>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <form method="POST" action="<?php echo URL . 'meal/addMeal/' . $res_id . "/". $res_name; ?>">
            <div class="container2" method="post">
            <label id="label">
                       Meal Name: </br></br>
                </label>
                <input id="name2" type="text" name="Mtext" placeholder="Meal Name"  required />
                </br>
                </br>
                <label id="label" >
                       Meal Price: </br></br>
                </label>
                <input id="name2" type="number" name="price" placeholder="price ($)" size="15" name="price" min="1" onKeyup="manage(form)" required />
                </br>
                </br>
              
                <label id="label" >
                preparation time: </br></br>
                </label>
                <input id="name2" type="number" name="time" placeholder="preparation time (min)" size="15" name="price" min="15" onKeyup="manage(form)" required />
                </br>
                </br>
            </br>

                <input type="submit" name="btn1" id="submit" class="registerbtn" title="you must fill all fields completely" value="Submit">
        </form>
        <!-- <input type="submit" name="btn1" class="registerbtn" value="Users List"> -->
        <!-- </form> -->
        <!-- <a href="../users/login.php" class="regist">Login Here</a> -->

        <script type="text/javascript" src="<?php echo URL; ?>public/js/add-meal.js"></script>
    </div>
                </div>
                <br><br>
    <!-- </form> -->
</body>

</html>