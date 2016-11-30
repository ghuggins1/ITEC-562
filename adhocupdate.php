<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<title>Sakila</title>
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
					<span class="titletext">Adhoc Update Query</span>
				</div>
			</div>
			
<div id="usertext1">
				
<div class="bodytext" style="padding:12px" align="center">
<strong> 
		This query allows you to update entries in the "tblUsers" table. To update entries 
		please enter the ID of the user that you would like to revise and enter the updated information. 
		Also please be sure to select whether the user is active or inactive.   </strong> <br>
					
</div>
</div>	

<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "sakila";
$newfirstname = $newlastname = $newstreet = $newcity = $newstate = "";
$newzipcode = $newemail = $newphonenumber = $setid = "";
$errFlag = $firstnameErr = $lastnameErr = $emailErr = $phoneErr = "";
$firstname = $lastname = $street = $city = $state = $zipcode = "";
$email = $phonenumber = $idErr = "";
$newactive = "yes";
$errStart = false;


	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if (empty($_POST["setid"])) {
    $errFlag = true;
    $idErr = "Please Enter Id to Update";
  } else {
    $setid = test_input($_POST["setid"]);
    $errStart = true;
  }
	
  if (empty($_POST["firstname"])) {
    $newfirstname="";
  } else {
    $newfirstname = test_input($_POST["firstname"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$newfirstname)) {
  	$firstnameErr = "Only letters and white space allowed";
  	$errFlag = true;
  }
  }
  
  if (empty($_POST["lastname"])) {
    $newlastname="";
  } else {
    $newlastname = test_input($_POST["lastname"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$newlastname)) {
  	$lastnameErr = "Only letters and white space allowed";
  	$errFlag = true;
  }
  }

  if (empty($_POST["street"])) {
    $newstreet="";
  } else {
    $newstreet = test_input($_POST["street"]);
  }

  if (empty($_POST["city"])) {
    $newcity="";
  } else {
    $newcity = test_input($_POST["city"]);
  }
  
  if (empty($_POST["state"])) {
    $newstate="";
  } else {
    $newstate = test_input($_POST["state"]);
  }
  
  if (empty($_POST["zipcode"])) {
    $newzipcode="";
  } else {
    $newzipcode = test_input($_POST["zipcode"]);
  }

  if (empty($_POST["email"])) {
    $newemail="";
  } else {
    $newemail = test_input($_POST["email"]);
    if (!filter_var($newemail, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $errFlag = true;
  }
  }
  
  if (empty($_POST["phonenumber"])) {
    $newphonenumber="";
  } else {
    $newphonenumber = test_input($_POST["phonenumber"]);
    if (!preg_match("/^(?:1(?:[. -])?)?(?:\((?=\d{3}\)))?([2-9]\d{2})(?:(?<=\(\d{3})\))? ?(?:(?<=\d{3})[.-])?([2-9]\d{2})[. -]?(\d{4})(?: (?i:ext)\.? ?(\d{1,5}))?$/", $newphonenumber))
			{
			$phoneErr = "Invalid Phone Format: (555)555-5555";
			$errFlag = true;
			}
  }
  
  If ($_POST["active"]=="yes"){
  		$newactive = "Active";
  		$newactive1=true;
  		}
  	else { $newactive = "Inactive";
  		   $newactive1=false;}

}
	
	function test_input($data)
	{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
	}

?>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="form2">

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

<td>ID: *<br>
 <input type="text" name="setid" value="<?php echo $setid?>" placeholder="ID"> </td>

</tr>
<tr>

<td>First Name: <br>
 <input type="text" name="firstname" value="<?php echo $newfirstname?>" placeholder="Joe"> </td>

</tr>

<tr>

<td>Last Name: <br>
<input type="text" name="lastname" value="<?php echo $newlastname?>" placeholder="Smith"> </td>

</tr>

<tr>

<td>Street Name: <br>
 <input type="text" name="street" value="<?php echo $newstreet?>" placeholder="32 Apple Wood Ln."> </td>

</tr>

<tr>

<td>City: <br>
<input type="text" name="city" value="<?php echo $newcity?>" placeholder="Columbia"> </td>

</tr>

<tr>

<td>State: <br>
<input type="text" name="state" value="<?php echo $newstate?>" placeholder="SC"> </td>

</tr>

<tr>

<td>Zipcode: <br>
<input type="text" name="zipcode" value="<?php echo $newzipcode?>" placeholder="29527"> </td>

</tr>

<tr>

<td>Email Address: <br>
<input type="text" name="email" value="<?php echo $newemail?>" placeholder="jsmith@yahoo.com"> </td>

</tr>

<tr>

<td>Phone Number: <br>
<input type="text" name="phonenumber" value="<?php echo $newphonenumber?>" placeholder="(843)907-4535"> </td>

</tr>

<tr>

<td>Active: * <br>


<input id="click1" type="radio" name="active" value="yes" <?php
if ($newactive == "yes") echo "checked"; ?> > Yes 

<input id="click2" type="radio" name="active" value="no" <?php
if ($newactive == "no") echo "checked"; ?>> No

</td>
</tr>

<tr>
<td colspan="2"> <input  type="submit" name="submit" value="Submit">
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
			echo $idErr, "<br>";
		}
		else if ($errStart==true)
		{
		
	try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE tblUsers  SET First_Name = '$newfirstname' WHERE UserId=$setid AND '".$newfirstname."' != '';
    		UPDATE tblUsers SET Last_Name = '$newlastname' WHERE UserId=$setid AND '".$newlastname."' != '';
    		UPDATE tblUsers SET Street_Name = '$newstreet' WHERE UserId=$setid AND '".$newstreet."' != '';
    		UPDATE tblUsers SET City = '$newcity' WHERE UserId=$setid AND '".$newcity."' != '';
    		UPDATE tblUsers SET State = '$newstate' WHERE UserId=$setid AND '".$newstate."' != '';
    		UPDATE tblUsers SET Zipcode = '$newzipcode' WHERE UserId=$setid AND '".$newzipcode."' != '';
    		UPDATE tblUsers SET Email = '$newemail' WHERE UserId=$setid AND '".$newemail."' != '';
    		UPDATE tblUsers SET Phone_Number = '$newphonenumber' WHERE UserId=$setid AND '".$newphonenumber."' != '';
    		UPDATE tblUsers SET Active = '$newactive' WHERE UserId=$setid;";

    
    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }}

$conn = null;


?>
</div>



	
	
<div id="usertext">
				
<div class="bodytext" style="padding:12px" align="center">
		<strong> 
		If you have any questions or issues please forward your concerns to the database administrator at ghuggins
		@email.sc.edu.    </strong> <br>
					
</div>
</div>

</div>
</div>

</body>
</html>