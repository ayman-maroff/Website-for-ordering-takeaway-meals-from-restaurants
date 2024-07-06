
<?php 


echo $_SESSION['alert_code'];
?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script> 


swal("Are you sure you want to delete this?", {
  buttons: {
    cancel: "cancel",
    catch: {
      text: "Delete",
      value: "catch",
    },
    // defeat: true,
  },
})
.then((value) => {
  switch (value) {
 
    // case "defeat":
    //   swal("Pikachu fainted! You gained 500 XP!");
    //   break;
 
    case "catch":
    //   swal("Delete Completed!", "", "success");
      window.location = "<?php echo URL ?><?php echo $_SESSION['delete_path']?>";
      break;
 
    default:
      swal("Delete canceled.");
      window.location = "<?php echo URL ?><?php echo $_SESSION['canceled_path']?>";

  }
});
</script>