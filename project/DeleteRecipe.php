<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<form action="DeleteRecipe.php" method="post" />
<title>Schema Creator</title>
</head>
<?php
function __autoload($class_name) {
include $class_name . '.php';
}
if (empty($_POST["RecipeName"]) && empty($_POST["Description"]) && empty($_POST["ImageName"]) && empty($_POST["URLName"]))
{
 echo 'Please Enter Recipe Information.' ;
 }
else
{
$thing=new Recipe('' ,'',''); //As Thing, the super parent class extends Tag. Tag construtor is invoked.
echo $thing->RemoveThing("name", $_POST["RecipeName"]);
//echo $thing->RemoveCreativeWork();
//echo $thing->RemoveRecipe();
echo 'Recipe Deleted Successfully.';
}
?>
<body>
	<div style="border-style: outset; width: 450px" align="left">
		<h2 align="center" style="color: red">Delete Recipe</h2>
		<h5 style="color: red">
			<h5>
				<table width="400" border="0">
					<tr>
						<td align="right"><strong>Name :</strong></td>
						<td align="left"><input id="recipeID" type="text"
							name="RecipeName" /></td>
					</tr>
					<tr align="center">
						<td align="right"><strong>Description:</strong></td>
						<td align="left"><input id="descid" type="text" name="Description" />
						</td>
					</tr>
					<tr align="center">
						<td align="right"><strong>Image :</strong></td>
						<td align="left"><input id="imgid" type="text" name="ImageName" />
						</td>
					</tr>
					<tr align="center">
						<td align="right"><strong>URL:</strong></td>
						<td align="left"><input id="URLID" type="text" name="URLName" /></td>
					</tr>
					<tr align="center">
						<td align="right"><strong>About:</strong></td>
						<td align="left"><input id="AboutID" type="text" name="About" /></td>
					</tr>
					<tr align="center">
						<td align="right"><strong>Author:</strong></td>


						<td align="left"><input id="AuthorID" type="text" name="Author" />
						</td>
					</tr>
					10

					<td align="right"><strong>Ingredients:</strong></td>
					<td align="left"><input id="ingrenID" type="text"
						name="Ingredients" /></td>
					</tr>
					<tr align="center">
						<td align="right"><strong>Instructions:</strong></td>
						<td align="left"><input id="instructID" type="text"
							name="Instructions" /></td>
					</tr>
					<tr align="left">
						<td colspan="2" align="center"><input type="submit" name="Check"
							title="Check" value="Delete Recipe" />
						</td>
					</tr>
				</table>
	
	</div>
</body>
</form>
</html>