<!-- table section -->
<table class="content-table">
  <thead>
    <tr>
    <th>Resturant Name</th>  
      <th>Id</th>
      <th>Cost</th>
      <th>Address</th>
      <th>Time to prepare</th>
      <th>Meal Id</th>
      <th>User Id</th>
      <th> Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($orders as $order) {
    ?>
      <tr>
        <td><?php echo $res_name ?></td>
        <td><?php echo $order->oid ?></td>
        <td><?php echo $order->cost . "$" ?></td>
        <td><?php echo $order->address ?></td>
        <td><?php echo $order->Time . "Min"?></td>
        <td><?php echo $order->meal_id ?></td>
        <td><?php echo $order->user_id?></td>

        <td><a  href="<?php echo URL . 'order/deleteOrder/' .  $order->oid . "/" . $order->resturant_id ."/". $res_name?>" class="btn_del"><i id="deltbtn" class='bx bx-cart-alt'></i></a></td>
      </tr>
    <?php } ?>
  </tbody>
</table>