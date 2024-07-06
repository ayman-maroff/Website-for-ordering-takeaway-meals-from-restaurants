<!-- table section -->
<table class="content-table">
  <thead>
    <tr>
      <th>resturant Name</th>
      <th>meal Name</th>
      <th>Price</th>
      <th> preparation time</th>
      <th>update</th>
      <th> Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($meals as $meal) {
    ?>
      <tr>
        <td><?php echo $res_name ?></td>
        <td><?php echo $meal->name ?></td>
        <td><?php echo $meal->price . "$" ?></td>
        <td><?php echo $meal->prepTime . "Min"?></td>
 
        <td> <a href="<?php echo URL . 'meal/prepareToUpdateMeal/' . $meal->mid."/".$res_name ; ?>"><i class='bx bx-cog'></i></a></td>
        <td><a  href="<?php echo URL . 'meal/deleteMeal/' .  $meal->mid . "/" . $res_name."/".$res_id?>" class="btn_del"><i id="deltbtn" class='bx bx-cart-alt'></i></a></td>
      </tr>
    <?php
  
    }
    ?>
  </tbody>
</table>
<button class="main__btn"><a href="<?php echo URL . 'meal/prepareAddmeal/' . $res_id . "/" . $res_name; ?>">+ Add New meal</a></button>