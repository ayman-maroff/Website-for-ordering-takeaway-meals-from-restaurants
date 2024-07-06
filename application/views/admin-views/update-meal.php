<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/update-meal.css">
    <title>addQuestion page</title>
</head>

<body>

<br>

    <div class="container">
    </br>
    
        <h2>Edit Question</h2>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <form method="POST" action="<?php echo URL.'meal/updateMeal/'.$meal_id . "/".$array[0]->resturant_id."/".$resname;?>">
            <div class="container2">
                <label id="label">
                       Meal Name: </br></br>
                </label>
                <input id="name2" type="text" name="Mtext" placeholder="Meal Name" value ="<?php echo $array[0]->name;?>" required />
                </br>
                </br>
                <label id="label" >
                       Meal Price($): </br></br>
                </label>
                <input id="name2" type="number" name="price" placeholder="price ($)" size="15" name="price" min="1" onKeyup="manage(form)"value ="<?php echo $array[0]->price;?>" required />
                </br>
                </br>
              
                <label id="label" >
                preparation time(min): </br></br>
                </label>
                <input id="name2" type="number" name="time" placeholder="preparation time (min)" size="15" name="price" min="15" onKeyup="manage(form)"value ="<?php echo $array[0]->prepTime;?>" required />
                </br>
                </br>
            </br>
                <input type="submit" name="btn1" id="submit"  class="registerbtn" title="you must fill all fields completely" value="Save changes">
        </form>
    

        <script type="text/javascript" src="<?php echo URL;?>public/js/update-meal.js"></script>
        </div>
        </div>
    <br><br>
</body>

</html>