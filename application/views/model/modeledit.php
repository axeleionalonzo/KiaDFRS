<html>
<head>
<title>report edit</title>
</head>
<body>
    <h1>report edit</h1><a href="/KiaDFRS/index.php">list</a>
    <form name="add"   method="POST" action="/KiaDFRS/index.php/report/update">
            <input type="hidden" name="report_id" value="<?php echo $report[0]->report_id?>">
<table border="1">
<tr>
<th>name</th>
<td><input type="text" name="name" value="<?php echo $report[0]->name;?>"/></td>
</tr>
<tr>
<td><input type="submit"></td>
<td><input type="reset"></td>
</tr>
</form>

</table> 
</body>
</html>