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









<?php
// create subcategory table
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/modules/requires/create_subcategories_table.php";
require_once("$path");
?>















<?php
$add_subcategory = mysqli_real_escape_string($conn, $_POST['add_subcategory']);
if (!empty($add_subcategory)){
	
$editdate = date("ymd"); 
$nowDate = gmdate("Ym"); 
$subcategory_name = mysqli_real_escape_string($conn, $_POST['$subcategory_name']);
	echo $subcategory_name;
$sql = "INSERT INTO subcategories (subcategory_name, subcategory_name_editor, subcategory_name_editdate,  subcategory_name_bill_month_year) VALUES('$subcategory_name', '$user', '$editdate', '$nowDate')";  
mysqli_query($conn, $sql); 
}
?>


<form action="search_results.php" method="post" enctype="multipart/form-data"> 
<div class="form-group" >
<table class="table"  >
<tbody>
<tr>
<th scope="row"></th>
<td>
<center><font size="5" color="#D8D8D8" >Add Subcategory:</font></center>
</td>
<td>
<input style="background:#DEFFFF;color:#000000;" class="form-control name_list" name="subcategory_name" size="40"  maxlength="50" value="" placeholder="Enter Project Name" required/><br>
</td>
</tr>
</tbody>
</table>
<center><input type="submit" value="add_subcategory" name="submit"></center><br>  
</div>
</form> 



<?php
// search and show all subcategories 
// editor, auditor and admin get the variable with the option to change and verrify them

$sql55 = "SELECT id FROM subcategories";
$result55 = $conn->query($sql55);
if ($result55->num_rows > 0) {
    while($row55 = $result55->fetch_assoc()) {
	$id = $row55["id"];
	$output1 = '/project_pages/ownership/project_ownership.php?id=';
	$output2 = $output1 . $id;

    
	    
	    


// name
$variable='subcategory_name';
// table
$table='subcategories';
//name of ID columm
$id_column_name='id';
//Name of input-ID
$input_id=$id;
//Name of input-ID
$input_id_name='id';
//show variable for admin + contributers?
$show_intern='yes';
//show variable for public view?
$show_public='no';	
//show variable input field?
$show_input='yes';			
//show unit input field?
$show_input_unit='no';

$show_input_source='no';	
$show_source_information_words='no';

// wenn nur admin verifizieren darf
$admin_audit_only='yes';																																				   

//Data type: int, varchar, text
$variable_data_type='varchar';	
$variable_max_lenght=50;	

$back_page='/project_pages/search/searchresults_show_all.php?'.$input_id_name.'='.$id;		
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/modules/variables_varchar.php";
require("$path");
$name=$variable_value;
$name_activate=$variable_value;
$name_activate_source=$variable_source_value;
?>		   
	    
	    
	    
	    
	    
	    
	    
      <?php    
      
	if ($name_activate == 3 || $user == 'admin'){
	?>
            <br><br>					
            <center><a  class ="deep-orange-text" href="<?php echo $output2;?>"><font size="3"><?php echo $name; ?></font></a></center><br>		
      <?php
            }
      else if($name_activate == 2)
      {?>									
            <center><font size="3" color="grey"><?php echo $name; ?></font></center><br>	
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
