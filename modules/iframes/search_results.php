<?php
// connect to database db_1
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/db_conn/conn.php";
require_once("$path");
?>




<?php
// start user session
session_start();
$user = $_SESSION["user"];
?>




<?php
/*
// find out wich permissions the user has, in case the user is signed in
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/code/config/user_permissions.php";
require("$path");*/
?>
	
	



<?php
// include header
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/modules/includes/header.php";
include("$path"); 
?>


	<div class="#212121 grey darken-4">


<?php
// search and show all subcategories 
// editor, auditor and admin get the variable with the option to change and verrify them

$sql55 = "SELECT ID, subcategory_name FROM subcategories";
$result55 = $conn->query($sql55);
if ($result55->num_rows > 0) {
    while($row55 = $result55->fetch_assoc()) {
	$id = $row55["ID"];
	$subcategory_name = $row55["subcategory_name"];
	$output1 = '/project_pages/ownership/project_ownership.php?id=';
	$output2 = $output1 . $id;
	?>		   
	    
	    
	    
	    
	    
	    
      	<?php    
	if ($name_activate == 3 || $user == 'admin'){
	?>
      	<br><br>					
            <center><a  class ="deep-orange-text" href="<?php echo $output2;?>"><font size="3"><?php echo $company_name; ?></font></a></center><br>		
     	 <?php
            }
      	else if($name_activate == 2)
      	{?>									
            <center><font size="3" color="grey"><?php echo $company_name; ?></font></center><br>	
      	<?php
      	} 
      	else 
      	{?>									

      <?php
      } 
      }
} else {
echo "0 results";
}
?>




</div>	




<?php
// include footer
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/modules/includes/footer.php";
include ("$path"); 
?>



<?php
// close db connection
$conn->close();
?>
