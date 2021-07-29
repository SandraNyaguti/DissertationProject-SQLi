<?php
 // functions 
function check_login($con)
{

	if(isset($_SESSION['USERID']))
	{

		$id = $_SESSION['USERID'];
		$query = "select * from users where USERID = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;

}

function random_num($length)
{

	$new_id = "";
	if($length < 2)
	{
		$length = 2;
	}

	$len = rand(1,$length);

	for ($i=0; $i < $len; $i++) { 
		

		$new_id .= rand(0,9);
	}

	return $new_id;
}
?>