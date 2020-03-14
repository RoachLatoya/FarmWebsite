<!DOCTYPE html>
<html lang="en">
<head>
  <title>Farmer</title>
  <meta charset="utf-8">
   <link rel="stylesheet" href="index.css">
 <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
body{
  background-image: url('https://www.pymnts.com/wp-content/uploads/2019/07/farm-big-bank-lending.jpg');
 background-size: cover;
   background-repeat: no-repeat;
  
}
.container
{
 border-radius: 20px; /* rounds the corners of the fieldset border */
	 background:rgba(255, 255, 255, 0.6);
	 border:20px;
	 padding: 10px;
	 width:35%;
	 
	 }
.form-control{
width:50%;
}

.form-group{
padding:3px;
}

form{
   font-weight: bold;
  color: #000000;
  }
 
</style>
<?php
 session_start();
	
	
	if(isset($_SESSION['pbtn']))
	{
		
		//unset($_SESSION['btn_submit']);
		
		
		foreach($_SESSION as $key => $value)
		{
			$$key = $value;
		}
		
	}else
	{
		
	$num = 0;
	$animal ="";
	$sex = "";
	$dob ="";
	$bought = "";
	$slaught ="";
	$med ="";
	//$errNum ="";
	$errFlag = 0;
	
		//session_destroy();
	}
 ?>
</head>
<body>
<div class= "wrapper">
	<div class="nav-area">
	 <div class="angle-1"></div>
	  <div class="angle-2"></div>
	  
	  
	  <div class="menu-bg">
	    <ul id="menu">
		<li><a href="index.php">Home</a>
		<li><a href="farmer.php">Animal Information</a>
		<li><a href="#">GPS Location</a>
		
		
		</ul>
	  </div>
	  <div class="angle-3"></div>
	  <div class="angle-4"></div>
	  
	</div>
 </div>
<div class="container">
		  <h2 align='center'>Animal Information</h2>
  <form action="farmer_validate.php"  method='POST' enctype="multipart/form-data" class="was-validated" >
    <div class="form-group">
      <label for="num">Tag ID:</label>
	 <input type="number" class="form-control" id="num" placeholder="Enter Tag ID" name="num"  value='<?php echo $num; ?>'required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="animal">Type of Animal:</label>
      <input type="text" class="form-control" id="animal" placeholder="State type of animal" name="animal" value='<?php echo $animal; ?>' required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
	
	<div class="form-group">
      <label for="sex">Gender:</label>&nbsp; &nbsp; &nbsp;
	  <input type="radio" name="sex" <?php if (isset($sex) && $sex=="female") echo "checked";?> value="female">Female
  <input type="radio" name="sex" <?php if (isset($sex) && $sex=="male") echo "checked";?> value="male">Male
	 <div class="invalid-feedback">Please fill out this field.</div>
    </div>
	<div class="form-group">
      <label for="dob">DOB:</label>
      <input type="date" class="form-control" id="dob" placeholder="Enter DOB" name="dob" value='<?php echo $dob; ?>'required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="bought">Date Purchased:</label>
      <input type="date" class="form-control" id="bought" placeholder="Purchase Date" name="bought" value='<?php echo $bought; ?>'>
         
    </div>
	
    <div class="form-group">
      <label for="slaught">Slaughtered Date:</label>
      <input type="date" class="form-control" id="slaught" placeholder="Date Slaughtered" name="slaught" value='<?php echo $slaught; ?>'>
      
    </div>
	 <div class="form-group">
      <label for="med">Medical Conditions:</label>
      <input type="text" class="form-control" id="med" placeholder="State Medical Conditions" name="med"  value='<?php echo $med; ?>'required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
       </label>
	   <button type="submit" class="btn btn-primary" name="pbtn">Submit</button>
    </div>
    
  </form>
  
</div>

</body>
</html>
