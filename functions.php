<?php
//User Must be loged in, Check Login 
function check_login($con)
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$query = "select * from users where user_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: pvds/login.php");
	die;

}

// function random_num($length)
// {

// 	$text = "";
// 	if($length < 5)
// 	{
// 		$length = 5;
// 	}

// 	$len = rand(4,$length);

// 	for ($i=0; $i < $len; $i++) { 
// 		# code...

// 		$text .= rand(0,9);
// 	}

// 	return $text;
// }
global $num;
$num = 10001;
function idNo(){
	$year = 22;
	$code = 01;
	if($num>0){
		$num +=1;
	}
	$num = $year.$code.$num;
	return $num;
}

?>