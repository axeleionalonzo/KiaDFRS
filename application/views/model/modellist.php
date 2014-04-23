<html>
<head>
<title>model list</title>
</head>
<body>
    <h1>model list</h1>
    <a href="/KiaDFRS/index.php/report/add">Add report</a>
    <a href="/KiaDFRS/index.php/model/add">Add car</a>
<table border="1">
<tr>
<th>name</th>
<th>edit </th>
<th>delete </th>
</tr>
<?php
//print_r($models);
for($i=0; $i<count($models);$i++) {
?>
<tr>
<td><?php echo $models[$i]->name;?></td>

<td><a href="/KiaDFRS/index.php/model/edit/<?php echo $models[$i]->model_id;?>">edit</a></td>
<td><a href="/KiaDFRS/index.php/model/delete/<?php echo $models[$i]->model_id;?>" onclick="return confirm('are you sure to delete')">delete</a></td>
</tr>
<?php }?>  
</table> 
</body>
</html>