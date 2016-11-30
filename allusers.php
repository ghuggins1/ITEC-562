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
					<span class="titletext">Display All Users</span>
				</div>
			</div>
			
<div id="usertext1">
				
<div class="bodytext" style="padding:12px" align="center">
<strong> 
		This table displays all of the users that are in the "tblUsers" table.    </strong> <br>
					
</div>
</div>	
					
			

<?php
echo "<table id='table'>";
echo "<tr><th>Id</th><th>First Name</th><th>Last Name</th><th>Steet Name</th><th>City</th><th>State</th><th>Zipcode</th><th>Email</th><th>Phone Number</th><th>Registration Date</th><th>Active/Inactive</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "sakila";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT UserId, First_Name, Last_Name, Street_Name, City, State, Zipcode, Email, Phone_Number, Registration_Date, Active FROM tblUsers"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>	

	
			
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