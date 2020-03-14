<?php
session_start();

	
		foreach($_SESSION as $key => $value)
		{
			$$key = $value;
		}
		
	//	session_destroy();

			echo "
				<!DOCTYPE html>
				<html>
					<head>
						<title>Confirmation Page</title>
							<link rel='stylesheet' type='text/css' href='index.css'>
							<link rel='stylesheet' type='text/css' href='style.css'>
							<script>
								function goBack() {
									window.history.back();
								}
							</script>
							<style>
							.container
{
 border-radius: 20px; /* rounds the corners of the fieldset border */
	 background:rgba(255, 255, 255, 0.6);
	 border:20px;
	 padding: 10px;
	 width:35%;
	 
	 }
	 </style>
					</head>
					
					<body>
					
						<div class='container'>
						<h1></h1>
						<fieldset >
							<legend>Confirmation Page</legend>
							<table >
								
								<tr>
									<td><label>Tag Num:</label></td>
									<td><p> ". $num."</p></td>
								</tr>
								<tr>
									<td><label>Animal Type:</label></td>
									<td><p> ". $animal."</p></td>
								</tr>
								<tr>
									<td><label>Gender:</label></td>
									<td><p> ". $sex."</p></td>
								</tr>
								<tr>
									<td><label>Dob:</label></td>
									<td><p> ". $dob."</p></td>
								</tr>
								<tr>
									<td><label>Bought Date:</label></td>
									<td><p> ". $bought."</p></td>
								</tr>
								<tr>
									<td><label>Slaughtered Date:</label></td>
									<td><p> ". $slaught."</p></td>
								</tr>
								<tr>
									<td><label>Medic:</label></td>
									<td><p> ". $med."</p></td>
								</tr>
								<tr>
									<td>
										<form action>
											<input type = 'button' value =  'Go Back' onclick='goBack()'/>
										</form>
									</td>
									<td>
										<form action = 'index.php'>
											<input type = 'submit' value = 'Register' name = 'regSubmit'/>
										</form>
									</td>
								</tr>
							</div>
					</body>
				</html>";
				$flag=0;
				
		//file create
		$myfile = fopen('data.txt','a+') or die("Could not create file.");
		
		fwrite($myfile, "$num\n$animal\n$sex\n$dob\n$bought\n$slaught\n$med----------\n",500);
		
		fclose($myfile);
		//echo "<p style = 'color:green;'>FILE CREATED</p>";
      session_destroy();
	
?>