<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Updating | Product Post</title>
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
		@$pid = $_POST['pid'];
		 @$pcode = ($_POST['pcode']);
		 @$pname = ($_POST['pname']);
		 @$pstatus = $_POST['stockstatus'];
		 @$description = ($_POST['des']);
		 //@$date_added = date('Y-m-d');
		@$sql = "Update product_tb SET pcode = '$pcode', pname = '$pname', stock_status = '$pstatus', description = '$description' WHERE pid = ". $pid;
						
						if ($conn->query($sql) === TRUE) {
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
				?>
                <script language="javascript">
					//window.location.href = "pages/index.html"
					//setTimeout("location.href = '../product.php';", 3500);
				</script>
                <?php		
	}else{
		echo "<p align='center' style='color:red;'>New record No Post</p>";
		}
	$conn->close();
?>
</body>
</html>