<?php
	include("connector.php");
	//add menu
	if(isset($_POST['btnSave']))
	{
		// echo "You Click on save Button!";
		//var_dump($_POST);
		
		$data=[
			'name'=>$_POST['cate_name'],
			'status'=>$_POST['cbostatus'],
			'ordering'=>$_POST['cate_ordering'],
			'des'=>$_POST['des'],
		];
		//Insert database
		$queryInsert="INSERT INTO tb_menus (menu_name,status,ordering,detail) 	
		VALUES(:name,:status,:ordering,:des)";
		$stmtInsert=$conn->prepare($queryInsert);
		if($stmtInsert->execute($data))
		{
			echo"
				<script>alert('Data has been saved ')</script>
				<script>window.location ='catelist.php'</script>
			";
			
			// header("location: catelist.php?SuccessfullySave!");
		}
		else
		{
			echo"
				<script>alert('Field must be require')</script>
				<script>window.location ='categoriesadd.php'</script>
			";
			// header("location: categoriesadd.php?InsertFailed!");
		}
	}//end of isset
	
	//Update menu
	
	if(isset($_POST['btnSave_change']))
	{
		//var_dump($_POST);
		$dataUpdate=[
						'id'=>$_POST['cate_id'],
						'name'=>$_POST['cate_name'],
						'ordering'=>$_POST['cate_ordering'],
						'status'=>$_POST['cbostatus'],
						'des'=>$_POST['des'],
						
					];
		$sqlupdate="UPDATE tb_menus SET 		
		menu_name=:name,ordering=:ordering,status=:status,detail=:des WHERE id=:id";
		 
		$stmt=$conn->prepare($sqlupdate);
		 if($stmt->execute($dataUpdate))
		 {
			echo"
			<script>window.location ='catelist.php'</script>
		";
			//  header("location: catelist.php?Update=successfully");
		}else{
			//echo "<span style='color:red'>Error:Please check your code!</span>";
			header("location: cateEdit.php?cateid=".$_POST['cate_id']."&Update=failed");
			
		}
	
	}


	//Delete menu
	if(isset($_GET['cateid']))
	{
		echo "Delete ".$_GET['cateid'];
		$sqlDelete="DELETE From tb_menus WHERE id=?";
		$stmt=$conn->prepare($sqlDelete); 
		if($stmt->execute(array($_GET["cateid"])))
		{
			echo"
				<script>alert('You had been deleted data successfully')</script>
				<script>window.location ='catelist.php'</script>
			";
			// header("location: catelist.php?delete=successfully");
		}else
		{
			header("location: catelist.php?delete=failed");
		}
		//$count = $stmt->rowCount();
		
	}



	
	




	//add contents
	if(isset($_POST['btnsave_content']))
	{

		$filename = $_FILES["pimg"]["name"];
		$tempname = $_FILES["pimg"]["tmp_name"];    
		$filename_1 = $_FILES["simg"]["name"];
		$tempname_1 = $_FILES["simg"]["tmp_name"];   
		$filename_2 = $_FILES["rimg"]["name"];
		$tempname_2 = $_FILES["rimg"]["tmp_name"];   
		$folder = "../images/".$filename;
		$folder_1 = "../images/".$filename_1;
		$folder_2 = "../images/".$filename_2;
		
		$data=[
			
			'filename'=>$filename,
			'filename1'=>$filename_1,
			'filename2'=>$filename_2,
			'title'=>$_POST['title'],
			// 'byuser'=> 1,
			'status'=>$_POST['cbostatus'],
			'menu_id'=>$_POST['cbomenu'],
			'user'=>$_POST['cbouser'],
			'short'=>$_POST['short_des'],
			'des'=>$_POST['des'],
			// 'date'=> date_create('now')->format('Y-m-d H:i:s'),
			'created_at' => date('Y-m-d H:i:s')
		];
		//Insert database
		$inserContent="INSERT INTO tb_content (pic_cover,thumb_slide,thumb_right,cont_title,created_at,status,short_detail,detail,id,created_by) 	
		VALUES(:filename,:filename1,:filename2,:title,:created_at,:status,:short,:des,:menu_id,:user)";
		$stmtInsert=$conn->prepare($inserContent);
	
		if($stmtInsert->execute($data))
		{
			echo"
					
					<script>window.location ='contentslist.php'</script>
				";
			if($stmtInsert){ 
				move_uploaded_file($tempname, $folder); 
				move_uploaded_file($tempname_1, $folder_1); 
				move_uploaded_file($tempname_2, $folder_2);   
				
			}else{
				$msg = "Failed to upload image";
			  }
			
		}
		else
		{
			header("location: contentsadd.php?InsertFailed!");
		}
	}



	//update content
	if(isset($_POST['btnEdit_content'])){

		
		$id=$_POST['title_id'];
		$title=$_POST['title'];
		$user=$_POST['cbouser'];
		$status=$_POST['cbostatus'];
		$short=$_POST['short_des'];
		$cat=$_POST['cbomenu'];
		$des=$_POST['des'];
		$update=date("Y-m-d");
	
		$filename = $_FILES["pimg"]["name"];
		$tempname = $_FILES["pimg"]["tmp_name"];
		$filename_1 = $_FILES["sl_img"]["name"];
		$tempname_1 = $_FILES["sl_img"]["tmp_name"];
		$filename_2 = $_FILES["r_img"]["name"];
		$tempname_2 = $_FILES["r_img"]["tmp_name"];
		//1st delete old file from folder
		
		$direct='../images/';
	
		// if(isset($_GET['cateid']))
		// {
		// 	$id = $_GET['cateid'];
		// 	echo "Delete ".$_GET['cateid'];
		// 	$sqlget_id = "SELECT * FROM tb_content WHERE cont_id=?";
		// 	$stmtget_id=$conn->prepare($sqlget_id);
		// 	if($stmtget_id->execute(array($_GET["cateid"]))){
		// 		$items = $stmtget_id->fetch();
		// 		$pic_cover_1 = $items['pic_cover'];
		// 		$pic_thumb_first_2 = $items['thumb_slide'];
		// 		$pic_thumb_right_3 = $items['thumb_right'];
		// 		$direct = "../images/";

					
			if(file_exists($tempname)){

			
				
				$sqlupdate="UPDATE tb_content SET 		
				pic_cover='$filename',cont_title='$title',created_by='$user',
				status='$status',short_detail='$short',id='$cat',detail='$des',updated_at='$update' WHERE cont_id='$id'";
				
				$stmt=$conn->prepare($sqlupdate);
				if($stmt->execute())
				{
					// unlink($direct.$pic_cover_1);
					// move_uploaded_file($tempname,$direct);
			
					header("location: contentslist.php?Update=successfully");
				}else{
					//echo "<span style='color:red'>Error:Please check your code!</span>";
					header("location: contentEdit.php");
					
				}
				

			}else if(file_exists($tempname_1)){

				$sqlupdate="UPDATE tb_content SET 		
				thumb_slide='$filename_1',cont_title='$title',created_by='$user',
				status='$status',short_detail='$short',id='$cat',detail='$des',updated_at='$update' WHERE cont_id='$id'";
				 
				 $stmt=$conn->prepare($sqlupdate);
				 if($stmt->execute())
				 {
					// unlink($direct.$pic_thumb_first_2);
					// move_uploaded_file($tempname,$direct);
					 header("location: contentslist.php?Update=successfully");
				}else{
					//echo "<span style='color:red'>Error:Please check your code!</span>";
					header("location: contentEdit.php");
					
				}
			}else if(file_exists($tempname_2)){

				$sqlupdate="UPDATE tb_content SET 		
				thumb_right='$filename_2',cont_title='$title',created_by='$user',
				status='$status',short_detail='$short',id='$cat',detail='$des',updated_at='$update' WHERE cont_id='$id'";
				 
				 $stmt=$conn->prepare($sqlupdate);
				 if($stmt->execute())
				 {
					// unlink($direct.$pic_thumb_right_3);
					// move_uploaded_file($tempname,$direct);
					 header("location: contentslist.php?Update=successfully");
				}else{
					//echo "<span style='color:red'>Error:Please check your code!</span>";
					header("location: contentEdit.php");
					
				}
			}
			else{
				$sqlupdate="UPDATE tb_content SET 		
				cont_title='$title',created_by='$user',
				status='$status',short_detail='$short',id='$cat',detail='$des',updated_at='$update' WHERE cont_id='$id'";
				 
				 $stmt=$conn->prepare($sqlupdate);
				 if($stmt->execute())
				 {
					 header("location: contentslist.php?Update=successfully");
				}else{
					//echo "<span style='color:red'>Error:Please check your code!</span>";
					header("location: contentEdit.php");
					
				}

			}
					
	
	// 	}
	// }

	}
					 			

	//delete content
	if(isset($_GET['con_id']))
	{
		$id = $_GET['con_id'];
		echo "Delete ".$_GET['con_id'];
		$sqlget = "SELECT * FROM tb_content WHERE cont_id=?";
		$stmtget=$conn->prepare($sqlget);
		if($stmtget->execute(array($_GET["con_id"]))){
			$item = $stmtget->fetch();
			$pic_cover = $item['pic_cover'];
			$pic_thumb_first = $item['thumb_slide'];
			$pic_thumb_right = $item['thumb_right'];
			$dir = "../images/";
			echo $dir;
			$sqlDelete="DELETE From tb_content WHERE cont_id=?";
			$stmt=$conn->prepare($sqlDelete);
			if($stmt->execute(array($_GET["con_id"]))){
				unlink($dir.$pic_cover);
				unlink($dir.$pic_thumb_first);
				unlink($dir.$pic_thumb_right);
				header("location: contentslist.php?delete=successfully");
			}
		}	
	}
	


	//add ads
	if(isset($_POST['btn_add_ads'])){
		$filename = $_FILES["ads_img"]["name"];
		$tempname = $_FILES["ads_img"]["tmp_name"];    
		$folder = "../images/".$filename;

		$data=[
			
			'filename'=> $filename,
			'locat'=>$_POST['cboads'],
			'stt'=>$_POST['cbostatus'],
			'date' => date('y-m-d'),
			'des'=> $_POST['desc'],
		];
		
		//Insert database
		$instert_ads="INSERT INTO tb_ads (ads_photo,location,status,created_at,ads_des) 	
		VALUES(:filename,:locat,:stt,:date,:des)";
		$stmtInsert=$conn->prepare($instert_ads);
	
		if($stmtInsert->execute($data)){
			echo"
			<script>alert('ads has been saved successfully')</script>
			<script>window.location ='adslist.php'</script>
		";
			
			if (move_uploaded_file($tempname, $folder))  {
				echo"
					<script>alert('ads has been saved successfully')</script>
					<script>window.location ='adslist.php'</script>
				";
				// header("location: contentslist.php?SuccessfullySave!");
				// $msg = "Image uploaded successfully";
			}else{
				$msg = "Failed to upload image";
			  }
			
		}
		else
		{
			header("location: adsadd.php?InsertFailed!");
		}
	}

	//update ads
	if(isset($_POST['btnedit_ads'])){

		$adsid=$_POST['ads_pic'];
		$locat=$_POST['cbolocat'];
		$stt=$_POST['cbostatus'];
		$adsdes=$_POST['desc'];
		// $folder = "images/".$filename;
		// if(isset($_FILES["ads_img"]["name"]) && ($_FILES["ads_img"]["name"] !="")){
			$filename = $_FILES["ads_img"]["name"];
			$tempname = $_FILES["ads_img"]["tmp_name"];
			//1st delete old file from folder
			 unlink("../images/$old_image");
			//new image upload to folder
			if($tempname !=""){

				move_uploaded_file($tempname,"../images/$filename");

				$sqlupdate_ads="UPDATE tb_ads SET ads_photo='$filename',location='$locat',status='$stt',ads_des='$adsdes' WHERE ads_id='$adsid'";
		 
				$stmt=$conn->prepare($sqlupdate_ads);
				if($stmt->execute())
				{
					header("location: adslist.php?Update=successfully");
				}else{
					//echo "<span style='color:red'>Error:Please check your code!</span>";
					header("location: adsEdit.php");
					
				}

			}else{
				$sqlupdate_ads="UPDATE tb_ads SET location='$locat',status='$stt',ads_des='$adsdes' WHERE ads_id='$adsid'";
		 
				$stmt=$conn->prepare($sqlupdate_ads);
				if($stmt->execute())
				{
					header("location: adslist.php?Update=successfully");
				}else{
					//echo "<span style='color:red'>Error:Please check your code!</span>";
					header("location: adsEdit.php");
					
				}
			}

	}
	
		
	// }

	//delete ads
	if(isset($_GET['adsid']))
	{
		echo "Delete ".$_GET['adsid'];
		$sqlDelete="DELETE From tb_ads WHERE ads_id=?";
		$stmt=$conn->prepare($sqlDelete); 
		if($stmt->execute(array($_GET["adsid"])))
		{
			echo"
				<script>alert('ads has been deleted');</script>
				<script>window.location ='adslist.php'</script>
			";
			// header("location: catelist.php?delete=successfully");
		}else
		{
			header("location: adslist.php?delete=failed");
		}
		//$count = $stmt->rowCount();
		
	}
	//add user
	if(isset($_POST['btn_add_user']))
	{

		$filename = $_FILES["user_img"]["name"];
		$tempname = $_FILES["user_img"]["tmp_name"];    
		$folder = "../images/".$filename;
		
		$data=[
			
			'filename'=>$filename,
			'name'=>$_POST['user_name'],
			// 'byuser'=> 1,
			'email'=> $_POST['user_email'],
			'password'=> $_POST['user_password'],
			'stt'=>$_POST['cbostatus'],
			'roles'=>$_POST['cborole'],
			'des'=>$_POST['description'],
			'created_at' => date('y-m-d')
		];
		//Insert database
		$inserUser="INSERT INTO tb_users (profile,name,role,noted,email,password,status,created_on) 	
		VALUES(:filename,:name,:roles,:des,:email,:password,:stt,:created_at)";
		$stmtInsert=$conn->prepare($inserUser);

		if($stmtInsert->execute($data))
		{
			echo"<script>alert('user has been created')</script>
					 <script>window.location ='userlist.php'</script>
					";
			if (move_uploaded_file($tempname, $folder))  {
				echo"<script>alert('user has been created')</script>
					// <script>window.location ='userlist.php'</script>
					";
				// header("location: contentslist.php?SuccessfullySave!");
				// $msg = "Image uploaded successfully";
			}else{
				$msg = "Failed to upload image";
			}
			
		}
		else
		{
			header("location: useradd.php?InsertFailed!");
		}
	}

	//update user
	if(isset($_POST['btnEdit_user']))
	{
		$id=$_POST['user_id'];
		$name=$_POST['user_name'];
		$email=$_POST['user_email'];
		$pass=$_POST['user_password'];
		$stt=$_POST['cbostatus'];
		$roles=$_POST['cborole'];
		$desc=$_POST['description'];
		$update=date("Y-m-d");
		
		// $folder = "images/".$filename;
		// if(isset($_FILES["user_img"]["name"]) && ($_FILES["user_img"]["name"] !="")){
			$filename = $_FILES["user_img"]["name"];
			$tempname = $_FILES["user_img"]["tmp_name"];
			//1st delete old file from folder
			 unlink("../images/$old_images");
			//new image upload to folder
			if($tempname !=""){

				move_uploaded_file($tempname,"../images/$filename");

				$sqlupdate="UPDATE tb_users SET 		
				profile='$filename',name='$name',email='$email',
				password='$pass',status='$stt',role='$roles',noted='$desc',updated_on='$update' WHERE user_id='$id'";
				
				$stmt=$conn->prepare($sqlupdate);
				if($stmt->execute())
				{
					header("location: userlist.php?Update=successfully");
				}else{
					//echo "<span style='color:red'>Error:Please check your code!</span>";
					header("location: userEdit.php");
					
				}
			
			}else{
				$sqlupdate="UPDATE tb_users SET 		
				name='$name',email='$email',password='$pass',status='$stt',role='$roles',noted='$desc',updated_on='$update' WHERE user_id='$id'";
				 $stmt=$conn->prepare($sqlupdate);
				 if($stmt->execute())
				 {
					 header("location: userlist.php?Update=successfully");
				}else{
					header("location: userEdit.php");
				}
			}
		}
		
	
	//delete user
	if(isset($_GET['users_id']))
	{
		echo "Delete ".$_GET['users_id'];
		$sqlDelete="DELETE From tb_users WHERE user_id=?";
		$stmt=$conn->prepare($sqlDelete); 
		if($stmt->execute(array($_GET["users_id"])))
		{
			echo"
				<script>alert('user has been deleted');</script>
				<script>window.location ='userlist.php'</script>
			";
			// header("location: catelist.php?delete=successfully");
		}else
		{
			header("location: userlist.php?delete=failed");
		}
		//$count = $stmt->rowCount();
		
	}

	
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>