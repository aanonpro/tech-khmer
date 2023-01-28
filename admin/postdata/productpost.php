<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Product Post</title>
<script language="JavaScript" type="text/javascript">
	var seconds =5;
	var url="../index.php";

	function redirect(){
	 if (seconds <=0){
	 // redirect to new url after counter  down.
	  window.location = url;
	 }else{
	  seconds--;
	  document.getElementById("pageList").innerHTML = "Redirect after "+seconds+" seconds."
	  setTimeout("redirect()", 1000)
	 }
	}
</script>
</head>

<body>
<?php
@include_once('../db/connect.php');
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	} //else {echo "Connected!";}
	if($_POST){
		 @$pcode = ($_POST['pcode']);
		 @$pname = ($_POST['pname']);
		 @$pstatus = $_POST['stockstatus'];
		 @$description = ($_POST['des']);
		 @$date_added = date('Y-m-d');
		 
		 // blog image 
		 $valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
		 //$path = 'products/'; // upload image to directory
		 
		 //$img = $_FILES['pimg']['name'];
		 $img = rand(1000,100000).$_FILES['pimgf']['name'];
		$img_loc = $_FILES['pimg']['tmp_name'];
		$img_size = $_FILES['pimg']['size'];
		$img_type = $_FILES['pimg']['type'];
		$path = '../products/'; // upload image to directory
		
		// new file size in KB
		$new_size = $img_size/1024;  
		// new file size in KB
		
		// make file name in lower case
		$new_file_name = strtolower($img);
		// make file name in lower case
		
		$final_file=str_replace(' ','-',$new_file_name);
		
		if(move_uploaded_file($img_loc,$path.$final_file))
		{
			@$sql = "INSERT INTO product_tb(pcode, pname, stock_status, pimg, description, date_added) 
							VALUES('$pcode', '$pname', '$pstatus', '$final_file', '$description', '$date_added')";
						
				if ($conn->query($sql)) {
					echo "<p align='center' style='color:blue;'>New record created successfully<br/>Product: ".$pcode."<br/>It's redirect to product page!</p>";?>
					<center>
					<div id="pageList">
						<script>
						 redirect();
						</script>
					</div></center>
					<?php
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
		}
		 
		 
		 // end blog image
		 
				
	}else{
		echo "<p align='center' style='color:red;'>New record No Post</p>";
		}
	$conn->close();
?>
</body>
</html>