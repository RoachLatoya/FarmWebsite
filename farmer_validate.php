<?php
session_start();
if (isset($_POST['pbtn']))
{
	$num = $_POST['num'];
	$animal =$_POST['animal'];
	$sex = $_POST['sex'];
	$dob =$_POST['dob'];
	$bought = $_POST['bought'];
	$slaught =$_POST['slaught'];
	$med =$_POST['med'];

	$errFlag = 0;
	

	foreach($_POST as $key => $value)
		{
			$_SESSION[$key] = $value; 
		}
	
	
	if($errFlag > 0)
	{
		header('Location:farmer.php');
	}
	else if($errFlag == 0)
	{
		$_SESSION['errFlag']='nobad';
		header('Location:display.php');
	}
}
?>