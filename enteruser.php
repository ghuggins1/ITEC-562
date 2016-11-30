<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<title>Sakila</title>
	
	<?php 
	
	$firstname = $lastname = $street = $city = $state = "";
	$zipcode = $email = $phonenumber = "";
	$firstnameErr = $lastnameErr = $emailErr = $phoneErr = "";
	$active = "yes";
	$errFlag = false;
	$errStart = false;
	
	
	function test_input($data)
	{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
  if (empty($_POST["firstname"])) {
    $firstnameErr = "First name is required";
    $errFlag = true;
  } else {
    $firstname = test_input($_POST["firstname"]);
    $errStart = true;
    if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
  	$firstnameErr = "Only letters and white space allowed";
  	$errFlag = true;
  }
  }
  
  if (empty($_POST["lastname"])) {
    $lastnameErr = "Last name is required";
    $errFlag = true;
  } else {
    $lastname = test_input($_POST["lastname"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
  	$lastnameErr = "Only letters and white space allowed";
  	$errFlag = true;
  }
  }

  if (empty($_POST["street"])) {
    $street = "";
  } else {
    $street = test_input($_POST["street"]);
  }

  if (empty($_POST["city"])) {
    $city = "";
  } else {
    $city = test_input($_POST["city"]);
  }
  
  if (empty($_POST["state"])) {
    $state = "";
  } else {
    $state = test_input($_POST["state"]);
  }
  
  if (empty($_POST["zipcode"])) {
    $zipcode = "";
  } else {
    $zipcode = test_input($_POST["zipcode"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $errFlag = true;
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $errFlag = true;
  }
  }
  
  if (empty($_POST["phonenumber"])) {
    $phonenumber = "";
  } else {
    $phonenumber = test_input($_POST["phonenumber"]);
    if (!preg_match("/^(?:1(?:[. -])?)?(?:\((?=\d{3}\)))?([2-9]\d{2})(?:(?<=\(\d{3})\))? ?(?:(?<=\d{3})[.-])?([2-9]\d{2})[. -]?(\d{4})(?: (?i:ext)\.? ?(\d{1,5}))?$/", $phonenumber))
			{
			$phoneErr = "Invalid Phone Format: (555)555-5555";
			$errFlag = true;
			}
  }
  
  If ($_POST["active"]=="yes") {
  		$active = "Active";
  		}
  	else { $active = "Inactive";}

}

?>

</head>

<body>

<div id="page" align="center">
	<div id="content" >
	
	<div id="logo">
		<div style="margin-top:45px" class="whitetitle">Sakila Database</div>
	</div>
	
	<div id="topheader">
		<br>
		<br>
		<br>
		<br>
		<br>
				
	</div>
	
		<div id="menu">
	<div align="left" class="smallwhitetext" style="padding:9px;">
<nav>
<ul>

<li> <a href="index.html"> Home </a> </li>

<li> <a href=""> Forms </a>
	<ul>
		<li> <a href="enteruser.php"> Enter User </a> </li>
	</ul>
</li>

<li> <a href=""> Static Queries </a>
	<ul> 
		<li> <a href="allusers.php"> All Users </a> </li>
		<li> <a href="inactiveusers.php"> Inactive Users </a> </li>
		<li> <a href="twotables.php"> Film Genre </a> </li>
	</ul>
</li>

<li> <a href=""> Adhoc Queries </a>
	<ul>
		<li> <a href="adhocselect.php"> Select Query </a> </li>
		<li> <a href="adhocupdate.php"> Update Query </a> </li>
	</ul>
</li>

<li> <a href="resources.html"> Resources </a> </li>

</ul>
</nav>	
</div>

	
	<div id="contenttext">
				<div>
					<span class="titletext">Enter New User</span>
				</div>
	</div>
	
<div id="usertext1">
				
<div class="bodytext" style="padding:12px" align="center">

<strong> 
		This form allows you to enter information into the "tblUsers" table in the Sakila Database. Please
		enter all information in the correct format and with the requried fields filled out.     </strong> <br>
					
</div>
</div>	




				
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="form">

<table>

<tr>
<td>
* Required Fields
<div id="error">
<?php
if ($errFlag==true)
		
		{
			echo "Please view errors at the bottom and revise form";
		}
?>
</div>
</td>
</tr>
<tr>

<td>First Name: * <br>
 <input type="text" name="firstname" value="<?php echo $firstname?>" placeholder="Joe"> </td>

</tr>

<tr>

<td>Last Name: * <br>
<input type="text" name="lastname" value="<?php echo $lastname?>" placeholder="Smith"> </td>

</tr>

<tr>

<td>Street Name: <br>
 <input type="text" name="street" value="<?php echo $street?>" placeholder="32 Apple Wood Ln."> </td>

</tr>

<tr>

<td>City: <br>
<input type="text" name="city" value="<?php echo $city?>" placeholder="Columbia"> </td>

</tr>

<tr>

<td>State: <br>
<input type="text" name="state" value="<?php echo $state?>" placeholder="SC"> </td>

</tr>

<tr>

<td>Zipcode: <br>
<input type="text" name="zipcode" value="<?php echo $zipcode?>" placeholder="29527"> </td>

</tr>

<tr>

<td>Email Address: * <br>
<input type="text" name="email" value="<?php echo $email?>" placeholder="jsmith@yahoo.com"> </td>

</tr>

<tr>

<td>Phone Number: <br>
<input type="text" name="phonenumber" value="<?php echo $phonenumber?>" placeholder="(843)907-4535"> </td>

</tr>

<tr>

<td>Active: <br>


<input id="click1" type="radio" name="active" value="yes" <?php
if ($active == "yes") echo "checked"; ?> > Yes 

<input id="click2" type="radio" name="active" value="no" <?php
if ($active == "no") echo "checked"; ?>> No

</td>
</tr>

<tr colspan="2">
<td> <input  type="submit" name="submit" value="Submit">
 <input  type="reset" name="reset" value="Reset"> </td>
</tr>


</table>
</form>




<div id="error" >

<?php

		if ($errFlag==true)
		
		{
			echo $firstnameErr, "<br>";
			echo $lastnameErr, "<br>";
			echo $emailErr, "<br>";
			echo $phoneErr, "<br>";
		}
		else if ($errStart==true)
		{
			
				$servername = "localhost";
				$username = "username";
				$password = "password";
				$dbname = "sakila";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
   					die("Connection failed: " . $conn->connect_error);
				} 

				$sql = "INSERT INTO tblUsers (First_Name, Last_Name, Street_Name, City, State, Zipcode, Email, Phone_Number, Active)
				VALUES ('$firstname', '$lastname', '$street', '$city', '$state', '$zipcode', '$email', '$phonenumber', '$active')";

				if ($conn->query($sql) === TRUE) {
   				    echo "New record created successfully";
				} else {
    				echo "Error: " . $sql . "<br>" . $conn->error;
				}

				$conn->close();

			
		}
?>


<div class="bodytext" style="padding:12px" align="center">
	<strong> 
		If you have any questions or issues please forward your concerns to the database administrator at ghuggins
		@email.sc.edu.    </strong> <br>
					
</div>	

	


				

	
	
	
	
</body>
</html>