<?php 
    session_start();
	include("../connection.php");
	include("../functions.php");
  	//include('header.php');
	$user_data = check_login($con);

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
	  //something was posted
	  $m_name = $_POST['m_name'];
	  $sex = $_POST['sex'];
	  $blood = $_POST['blood'];
	  $fname = $_POST['fname'];
	  $mname = $_POST['mname'];
	  $village = $_POST['village'];
	  $post = $_POST['post'];
	  $upzila = $_POST['upzila'];
	  $zila = $_POST['zila'];
	  $divition = $_POST['divition'];
	  $Edu = $_POST['Edu'];
	  $phone = $_POST['phone'];
	  $course = $_POST['course'];
	  $picture = $_FILES['picture']['name'];
	  $tmpname = $_FILES['picture']['tmp_name'];

	//   $pvds_id = random_num(20);
	$pvds_id = idNo();

	  if(!empty($pvds_id))
	  {
		  //picture upload 
		  $destinationFile = '../img/'.$picture;
		  move_uploaded_file($tmpname,$destinationFile);
		  //save to database
		 
		  $action = 'NO';
		  $query = "insert into regi (m_name,sex,blood,fname,mname,village,post,upzila,zila,divition,Edu,course,phone,pvds_id,pic,action) 
		  values ('$m_name','$sex','$blood','$fname','$mname','$village','$post','$upzila','$zila','$divition',
		   '$Edu','$course','$phone','$pvds_id','$destinationFile','$action')";

		  mysqli_query($con, $query);

		  header("Location: dashboard.php");
		  die;
	  }else
	  {
		  echo "Please enter some valid information!";
	  }
  }
?>


<!DOCTYPE html>
<html>
<head>
  <title>PVDS Member Registration</title>
</head>
<body>

  <style type="text/css">
  
  #text{

	  height: 25px;
	  border-radius: 5px;
	  padding: 4px;
	  border: solid thin #aaa;
	  width: 100%;
	  background-color: white;
  }

  #button{

	  padding: 10px;
	  width: 100px;
	  color: white;
	  background-color: lightblue;
	  border: none;
  }

  #box{

	  background-color: grey;
	  margin: auto;
	  width: 50%;
	  padding: 50px;
  }

  </style>

  <div id="box">
  <div style="font-size: 20px;margin: 10px;color: white; ">Member Registration Form </div>  
  <!-- Registration Form -->
	  <form method="post" enctype="multipart/form-data">
		<p>Member Name</p><input id="text" type="text" name="m_name"><br><br> 
		<p>Gender:</p>
            <input type="radio" id="male" name="sex" value="Male">
            <label for="male">Male</label>
            <input type="radio" id="famale" name="sex" value="Famale">
            <label for="famale">Famale</label>
			<input type="radio" id="3rdGender" name="sex" value="3rdGender">
            <label for="3rdGender">3rd Gender</label><br>
		<p>Blood:</p> 
		<select name="blood" id="blood">
			<option value="select">select</option>
			<option value="A+">A+</option>
			<option value="A-">A-</option>
			<option value="B+">B+</option>
			<option value="B-">B-</option>
			<option value="O+">O+</option>
			<option value="O-">O-</option>
			<option value="AB+">AB+</option>
			<option value="AB-">AB-</option>
		</select><br><br>
		<p>Phone Number</p> <input id="text" type="number" name="phone"><br><br>
		<p>Father Name:</p> <input id="text" type="text" name="fname"><br><br>
		<p>Mother Name:</p> <input id="text" type="text" name="mname"><br><br>
		<p>Village/Pourosova:</p> <input id="text" type="text" name="village"><br><br>
		<p>Post:</p> <input id="text" type="text" name="post"><br><br>
		<p>Upozila/Thana:</p> <input id="text" type="text" name="upzila"><br><br>
		<p>District:</p> <input id="text" type="text" name="zila"><br><br>
		<label for="divition">Divition:</label>
		<select name="division" id="division">
			<option value="select">select</option>
			<option value="Barishal">Barishal</option>
			<option value="Chattogram">Chattogram</option>
			<option value="Dhaka">Dhaka</option>
			<option value="Khulna">Khulna</option>
			<option value="Rajshahi">Rajshahi</option>
			<option value="Rangpur">Rangpur</option>
			<option value="Mymensingh ">Mymensingh </option>
			<option value="Sylhet">Sylhet</option>	
		</select><br><br>
		<label for="edu">Generel Education:</label>
		<select name="Edu" id="Edu">
			<option value="select">select</option>
			<option value="Masters">Masters or Equavalent</option>
			<option value="Honors">Honors or Equavalent</option>
			<option value="Hsc">Hsc or Equavalent</option>
			<option value="SSC">Ssc or Equavalent</option>
		</select><br><br>
		<p>Profational Course:</p> <input id="text" type="text" name="course"><br><br>
		<label for="file">Upload Your Picture:</label>
		<input id="file" type="file" name="picture"><br><br>
					
		   <input id="button" type="submit" value="Submit"><br><br>

	  </form>
  </div>
<?php // include('footer.php'); ?> 