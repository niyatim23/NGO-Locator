<?php 
session_start();
?>
<?php 

/* logout.php */

session_destroy();
header("Location:index.php");
?>