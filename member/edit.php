<?php 
session_start();

	include("../connection.php");
  	//include('../header.php');

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
      //Geting id value by link form dashbord
      $pvds_id = $_GET['pvds_id'];

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
	//   $picture = $_FILES['picture']['name'];
	//   $tmpname = $_FILES['picture']['tmp_name'];

	  if(!empty($pvds_id))
	  {
		   //picture upload 
		//    $destinationFile = '../img/'.$picture;
		//    move_uploaded_file($tmpname,$destinationFile);
		  //Update  to database
          $edit_query = " UPDATE regi SET m_name = '$m_name', sex = '$sex', blood = '$blood', phone = '$phone',
           fname = '$fname', mname = '$mname', village = '$village', post = '$post', upzila = '$upzila',
		   zila = '$zila', divition = '$divition', Edu = '$Edu', course = '$course'
           WHERE pvds_id = $pvds_id";
          $result = mysqli_query($con, $edit_query);
 
		  header("Location: allMemberList.php");
		  die;
	  }else{
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
  <!-- Taking Data from Database To Show during Edit -->
  <?php 
    $pvds_id = $_GET['pvds_id'];
      $conn = mysqli_connect("localhost", "root", "", "pvds");
      if($conn-> connect_error){
          die("Connection failed:".$conn-> connect_error);
      }
     $sql = "SELECT m_name,sex,blood,fname,mname,village,post,upzila,zila,divition,Edu,course,phone,pvds_id  
     FROM regi WHERE pvds_id = $pvds_id";

     $result = $conn-> query($sql);
      
     /* Strorin Value */
     $row = $result-> fetch_assoc();
  ?>

  <div id="box">
  <div style="font-size: 20px;margin: 10px;color: white; ">Member Registration Form </div>  
	  <form method="post">
		<p>Member Name</p><input id="text" type="text" name="m_name" value="<?php echo $row['m_name']; ?>"><br><br> 
		<p>Gender:</p>
            <input type="radio" id="male" name="sex" value="Male">
            <label for="male">Male</label>
            <input type="radio" id="famale" name="sex" value="Famale">
            <label for="famale">Famale</label><br>
		<p>Blood</p> <input id="text" type="text" name="blood" value="<?php echo $row['blood']; ?>"><br><br>
		<p>Mobile</p> <input id="text" type="number" name="phone" value="<?php echo $row['phone']; ?>"><br><br>
		<p>Father Name:</p> <input id="text" type="text" name="fname" value="<?php echo $row['fname']; ?>"><br><br>
		<p>Mother Name:</p> <input id="text" type="text" name="mname" value="<?php echo $row['mname']; ?>"><br><br>
		<p>Village/Pourosova:</p> <input id="text" type="text" name="village" value="<?php echo $row['village']; ?>"><br><br>
		<p>Post:</p> <input id="text" type="text" name="post" value="<?php echo $row['post']; ?>"><br><br>
		<p>Upozila/Thana:</p> <input id="text" type="text" name="upzila" value="<?php echo $row['upzila']; ?>"><br><br>
		<p>District:</p> <input id="text" type="text" name="zila" value="<?php echo $row['zila']; ?>"><br><br>
		<label for="division">Division:</label>
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
		<!-- <label for="file">Upload Your New Picture:</label>
		<input id="file" type="file" name="picture"><br><br> -->
					
		   <input id="button" type="submit" value="Update"><br><br>

	  </form>
  </div>
    <?php // include('footer.php'); ?> 