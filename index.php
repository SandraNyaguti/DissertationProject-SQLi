<?php 

session_start();

	include("dbconnect.php");
    include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//user data Entered
		$user_name = $_POST['USERNAME'];
		$password = $_POST['PASSWORD'];
    
        

		if(!empty($user_name) && !empty($password)) 
		{

			//read from database
			$query = "select * from users where USERNAME = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) >0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['PASSWORD'] === $password)
					{

						$_SESSION['USERID'] = $user_data['USERID'];
					    header("Location: retrieve.php");
					    die;
					}
				}
			}
			echo "wrong username or password! give it another GO!";
		
		/*}else
		{
			echo "Hmm Your details do not match what you gave me! give it another GO!";*/
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<style type="text/css">
	#title
    {
        font-size: 30px; 
        margin: 20px; 
        color: white;
        align-content: center;
		padding-right: 5px
		
    }

	#text
	{

		height: 40px;
        
		border-radius: 10px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
        margin:40 0 10px
    
	}

	#button
	{

		padding: 10px;
		color : white;
        background-color: #799;
		border: none;
        margin: 40 0px;
        width: 100%;
        border-radius: 10px
    
	}

	#box
	{

		background-color: hsla(50, 33%, 25%, .75);
        border-radius: 10px; 
		margin: auto;
		width: 400px;
		padding: 20px;
        text-align: center;
	}

	</style>

	<div id="box">
		
		<form method="POST">
			<div id="title"> </div>

			<input id="text" type="text" name="USERNAME" placeholder="Username"><br><br>
			<input id="text" type="password" name="PASSWORD" placeholder="Password"><br><br>

			<input id="button" type="submit" value="Login"> <br><br>

			

			

		</form>
	</div>
</body>
</html>