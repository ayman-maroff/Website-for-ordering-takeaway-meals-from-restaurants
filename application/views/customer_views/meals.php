<!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/resturant.css">
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/AdminProfile.css">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <style>
.button1 {
    position: fixed;
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 300px;
  cursor: pointer;
  
}

.button3 {width: 50%;}
</style>
    </head>

    <body>
        <br>
        <br>
        <a class="button1 button3" href="<?php echo URL . 'order/saveOrder/'. $res_name; ?>" style ="color:#295772;background-color:#7feb4f;">Save Order</a>
    <div  class="Grid" >
    <?php
     for ($i = 0; $i < count($meals); $i++) { ?>
    <img src="<?php echo URL; ?>public/img/image4.png" width="400" height="300" alt=''>
<b>
<a style ="color:#1c815b;background-color:rgb(214 204 13);">Name: <?php echo $meals[$i]->name; ?><br>
<a style ="color:#1c815b;background-color:rgb(214 204 13);">Price: <?php echo $meals[$i]->price."$"; ?> </a> <br>
<a style ="color:#1c815b;background-color:rgb(214 204 13);">preparation Time: <?php echo $meals[$i]->prepTime."(min)"; ?> </a> <br>
<a href="<?php echo URL . 'order/addToOrder/' . $meals[$i]->mid . "/". $meals[$i]->resturant_id . "/". $res_name; ?>" style ="color:#295772;background-color:#7feb4f;">Add to my order</a> 
<br>
<a href="<?php echo URL . 'order/removeFromOrder/' . $meals[$i]->mid . "/". $meals[$i]->resturant_id . "/". $res_name; ?>" style ="color:#295772;background-color:red;">Remove from my order</a> 
</a>
</b>

<?php } ?>
</div>
     

    </body>

    </html>