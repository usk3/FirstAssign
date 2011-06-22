<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>HTML Tag Program</title>
</head>
<body>
<div align="center">
<form action="createTags.php" method="post" name="Tag Creation">
<h1>Enter Your Tag Type:</h1><input name="tag" type="text" size="50" />
<h1>Enter Up To Three Different Attributes:</h1>
<table width="200" border="0">
  <tr align="center">
    <td><strong>Attribute</strong></td>
    <td><p>&nbsp;&nbsp;</p></td>
    <td><strong>Value</strong></td>
  </tr>
  <tr>
    <td><input name="attribute1" type="text" size="25" /></td>
    <td><p>&nbsp;&nbsp;</p></td>
    <td><input name="value1" type="text" size="25" /></td>
  </tr>
  <tr>
    <td><input name="attribute2" type="text" size="25" /></td>
    <td><p>&nbsp;&nbsp;</p></td>
    <td><input name="value2" type="text" size="25" /></td>
  </tr>
  <tr>
    <td><input name="attribute3" type="text" size="25" /></td>
    <td><p>&nbsp;&nbsp;</p></td>
    <td><input name="value3" type="text" size="25" /></td>
  </tr>
</table>
<h1>Enter Your Content:</h1><input name="content" type="text" size="50" /><br/><br/>
<input name="Submit" type="submit" value="Create Tag" />
</form>
</div>
</body>
</html>