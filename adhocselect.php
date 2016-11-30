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
					<span class="titletext">Adhoc Select Query</span>
				</div>
			</div>
			
<div id="usertext1">
				
<div class="bodytext" style="padding:12px" align="center">
<strong> 
		This query allows you to enter parameters that filter the entries of the "tblUsers" table.    </strong> <br>
					
</div>
</div>	

<?php

$firstname = $lastname = $state = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
	if (empty($_POST["firstname"]))
		{
		$firstname="";
		}
	  else
		{
		$firstname = test_input($_POST["firstname"]); 
		}
	if (empty($_POST["lastname"]))
		{
		$lastname="";
		}
	  else
		{
		$lastname = test_input($_POST["lastname"]); 
		}
	if (empty($_POST["state"]))
		{
		$state="";
		}
	  else
		{
		$state = test_input($_POST["state"]); 
		}
	}

function test_input($data)
	{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
	}

?>	



<form method="POST" action="select.php" id="form1">

<table>


<tr>

<td>First Name: </td>
<td> <input type="text" name="firstname" value="" placeholder="Joe"> </td>

</tr>

<tr>

<td>Last Name:</td>
<td> <input type="text" name="lastname" value="" placeholder="Smith"> </td>

</tr>

<tr>

<td>State:</td>
<td> <input type="text" name="state" value="" placeholder="SC"> </td>

</tr>


<tr>
<td colspan="2"> <input  type="submit" name="submit" value="Submit">
 <input  type="reset" name="reset" value="Reset"> </td>
</tr>



</table>
</form>	


	
	
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