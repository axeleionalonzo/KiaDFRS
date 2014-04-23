<html>
<head>
<title>model edit</title>
</head>
<body>
    <h1>model edit</h1><a href="/KiaDFRS/index.php">list</a>
    <form name="add"   method="POST" action="/KiaDFRS/index.php/model/update">
        <input type="hidden" name="model_id" value="<?php echo $model[0]->model_id?>">
<table border="1">
<tr>
<th>name</th>
<td><input type="text" name="name" value="<?php echo $model[0]->name;?>"/></td>
</tr>
<tr>
<td><input type="submit"></td>
<td><input type="reset"></td>
</tr>
</form>

</table> 
</body>
</html>