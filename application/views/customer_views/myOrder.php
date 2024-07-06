<!-- table section -->
<table class="content-table">
  <thead>
    <tr>
      <th>Resturant Name</th>  
      <th>Meal Name</th>
      <th>Address</th>
      <th>Time to prepare</th>
      <th>Cost</th>
      <th>State</th>
    </tr>
  </thead>
  <tbody>
    <?php
    for ($i = 0; $i < count($orders[0]); $i++) {
    ?>
      <tr>
        <td><?php echo $orders[1][0][$i] ?></td>
        <td><?php echo $orders[1][1][$i] ?></td>
        <td><?php echo $orders[0][$i]->address ?></td>
        <td><?php echo $orders[0][$i]->time."(min)" ?></td>
        <td><?php echo $orders[0][$i]->cost?></td>
        <td><?php echo "in preparation"; ?></td>
     

      </tr>
    <?php } ?>
  </tbody>
</table>