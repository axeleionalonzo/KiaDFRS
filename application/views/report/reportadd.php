<html>
<head>
<title>report add</title>
</head>
<body>
    <h1>Report add</h1><a href="/KiaDFRS/index.php">list</a>
<form name="add"   method="POST" action="insert">
<table border="1">

<tr>
<th>report_date</th>
<td><input type="text" name="report_date"/></td>
<tr>
<th>client</th>
<td><input type="text" name="client"/></td>
<tr>
<th>address</th>
<td><input type="text" name="address"/></td>
<tr>
<th>contactno</th>
<td><input type="text" name="contactno"/></td>
<tr>
<th>model</th>
<td><select id="model" name="model">
	<option value="model">4</option>
	</select>
	</td>
<tr>
<th>term</th>
<td><input type="text" name="term"/></td>
<tr>
<th>remarks</th>
<td><input type="text" name="remarks"/></td>
</tr>
<tr>
<td><input type="submit"></td>
<td><input type="reset"></td>
</tr>
</form>
</table> 
</body>
</html>