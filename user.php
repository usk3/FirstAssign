<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title> My First HomeWork page </title>
<!-- php class included -->  
<?php include("class_person.php"); ?>
<!-- CSS sheet linked -->  
<link rel="stylesheet" type="text/css" href="mystyle.css" >
<!-- link java script file -->
<script type="text/javascript" src="jquery.js">
 </script>
<script type="text/javascript">
	$(document).ready(function(){
		$("button").click(function(){
	    $("p").hide();
		});
	});
</script>
</head>
<body>
	<h6> "This Page Displays User Information"</h6>
	<hr>
	<h1> Welcome! </h1>
	<p>User Details</p>
	<button>Hide Above Text</button>
		
	<?php
	$user = new class_person();

	//set and get first name
	$user->setFirstName('Usha');
	echo "<h5>Your First Name: </h5>";
	echo $user->getFirstName();

	//set and get last name
	echo '<br>';
	$user->setLastName('Karri');
	echo "<h4>Your Last Name: </h4>" ;
	echo $user->getLastName();

	//set and get country 
	echo '<br>';
	$user->setCountry('USA');
	echo "<h3>Country you live in: </h3>";
	echo  $user->getCountry();
	 ?>
	
	<hr>
	<h2> Last Updated :</h2>
 </body>
</html>