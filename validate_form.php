<?php

session_start();	//start the session


//VALIDATION OF FORM
if(isset($_POST['btn_submit'])) //check if submit button pressed
{
	//assign $_POST array values into local variables
		foreach($_POST as $key => $value)
		{
			$$key = $value;
		}
		$libID = $_POST['libID'];
		#
		//error messages
	$fnerr = $lnerr = $pwerr = $emlerr = $typerr = "";
	$errflag = false;
	
	//VALIDATION	
	if((strlen($fname) > 2) && !preg_match("~[A-Z]{1}[a-zA-Z-' ]~", $fname))  
	{
		$_SESSION['fnerr'] = "<p style = 'color:red; font-size: 50%;'>Your FIRST NAME only use A-Z, - and '. Must begin with a Capital Letter.</p>";
		$errflag = true;
	}else
	if(strlen($fname) < 3)
	{
		$_SESSION['fnerr'] = "<p style = 'color:red; font-size: 50%'>Your FIRST NAME should be MORE THAN 2 characters.</p>";
		$errflag = true;
	}
	else 
	{
		$_SESSION['fnerr'] = "";
	}
	
	if(strlen($pw)<5)
	{
		$_SESSION['pwerr'] = "<p style = 'color:red; font-size: 50%'>Your PASSWORD should be MORE THAN 5 characters.</p>";
	}
	else
	{
		$_SESSION['pwerr'] = "";
	}
	
	if((strlen($lname) > 2) && !preg_match("~[a-zA-Z-' ]~", $lname))  
	{
		$_SESSION['lnerr'] = "<p style = 'color:red; font-size: 50%'>Your LAST NAME only use A-Z, - and '.</p>";
		$errflag = true;
	}
	else
	if(strlen($fname) < 3)
	{
		$_SESSION['lnerr'] = "<p style = 'color:red; font-size: 50%'>Your LAST NAME should be MORE THAN 2 characters.</p>";
		$errflag =true;
	}
	else 
	{
		$_SESSION['lnerr'] = "";
	}
	
	//validate email address
	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		$_SESSION['emlerr'] = "<p style = 'color:red; font-size: 50%'>Your Email is Invalid</p>";
		$errflag = true;
	}
	else
	{
		$_SESSION['emlerr'] = "";
	}
	
	//check if Type was not selected
	if($type == "")
	{
		$_SESSION['typerr'] = "<p style = 'color:red; font-size: 50%'>Please select a valid user type.</p>";
		$errflag = true;
	}
	else
	{
		$_SESSION['typerr'] = "";
	}
	//validation of userid
			
		
		if($errflag == true) // if an error is detected
	{
		$_SESSION['errflag'] = true;
	
		foreach($_POST as $key => $value)
		{
			$_SESSION[$key] = $value; //e.g. $_SESSION['fname'] = $_POST['fname'];
		}
		header("Location:register.php");
	}
	
	else
	{	
		$_SESSION['errflag'] = 'nobad';
		
		foreach($_POST as $key => $value)
		{
			$_SESSION[$key] = $value; //e.g. $_SESSION['fname'] = $_POST['fname'];
		}
				header("Location:display.php");
	}
	
}
else if(isset($_POST['submit']))	
{
	$usr = $_POST['Uname'];
    $pw = $_POST['password'];
    //$AType = $_POST['Atype'];
	
	$err = "";
	$errflag = false;
	
	$con = mysqli_connect("localhost", "root","", "larceny") or die("Could not connect to database.");
	
	$query = "SELECT * FROM login WHERE `username` = '$usr' AND `Password` = '$pw'"; 
	
	$result = mysqli_query($con, $query);	//run query
	
	$numrows = mysqli_num_rows($result);
	
	if($numrows ==1)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			switch($row["Type"])
			{
				case "Administrator":
				header("Location:Admin_Menu.php");
				$_SESSION['user'] = $row['username'];
				//$_SESSION['userid'] = $row['libID'];
				die();
				break;
				case "Librarian":
				header("Location:Librarian.php");
				die();
				break;
			}
		}
	}
	else
	{		
			foreach($_POST as $key=>$value)
			{
				$_SESSION[$key] = $_POST[$key];
			}
			$_SESSION['errflag'] = true;
			$_SESSION['err'] = "<p style = color:red;>Your Username and Password are Incorrect</p>";
			
			header("Location:index.php");
	}
	;   
}
else
{
	header("Location:register.php"); // redirect if user opens page
}
?>




