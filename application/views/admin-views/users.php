<table class="content-table">
  <thead>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Phone Number</th>
      <th>Role</th>
      <th> Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user) { ?>
      <tr>
        <td><?php echo $user->name; ?></td>
        <td><?php echo $user->lastname; ?></td>
        <td><?php echo $user->phone; ?></td>
        <td><?php echo $user->roll; ?></td>
        <td><a href="<?php echo URL . 'user/deleteUser/' . $user->iid; ?>" class="btn_del"><i id="deltbtn" class='bx bx-cart-alt'></i></a></td>
 
        <td></td>
      <?php }?>
      </tr>
    
  </tbody>
</table>
<!-- Add new User Button -->
<button class="main__btn"><a href="<?php echo URL; ?>user/preparetoaddUser">+ Add New User</a></button>


<script>
  function alert_delete() {
    alert("Deleted User ?");
  }
</script>

</html>
<?php
//echo $_SESSION['edit_state']." at the end of users.php";
