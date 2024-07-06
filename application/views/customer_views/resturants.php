<!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/resturant.css">
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/AdminProfile.css">
        <script src="http://code.jquery.com/jquery-latest.js"></script>

    </head>

    <body>
        <br>
        <br>
    <div  class="Grid" >
    <?php for ($i = 0; $i < count($array); $i++) { ?>
    <img src="<?php echo URL; ?>public/img/image3.png" width="400" height="300" alt=''>
<b>
<a style ="color:#1c815b;background-color:rgb(214 204 13);">Name: <?php echo $array[$i]->name; ?><br>
<a style ="color:#1c815b;background-color:rgb(214 204 13);">Address: <?php echo $array[$i]->address; ?> </a> <br>
<a style ="color:#1c815b;background-color:rgb(214 204 13);">Open Time: <?php echo $array[$i]->openTime."(H)"; ?> </a> <br>
<a style ="color:#1c815b;background-color:rgb(214 204 13);">Close Time: <?php echo $array[$i]->closeTime."(H)"; ?> </a><br>
<a href="<?php echo URL . 'meal/CmealList/' . $array[$i]->name . "/". $array[$i]->rid;  $_SESSION['Meals']=array(); ?>" style ="color:#295772;background-color:#7feb4f;">Meals<i class='far fa-arrow-alt-circle-right' style='font-size:16px'></i></a> 
</a>
</b>

<?php } ?>
</div>
     

    </body>

    </html>