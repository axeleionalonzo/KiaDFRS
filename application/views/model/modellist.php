<html>
<head>
<title>report list</title>
</head>
<body>
    <h1>report list</h1>
    <a href="/KiaDFRS/index.php/report/add">Add report</a>
    <a href="/KiaDFRS/index.php/model/add">Add car</a>
<table border="1">
<tr>
<th>name</th>
<th>edit </th>
<th>delete </th>
</tr>
<?php
//print_r($reports);
for($i=0; $i<count($model);$i++) {
?>
<tr>
<td><?php echo $models[$i]->name;?></td>

<td><a href="/KiaDFRS/index.php/report/edit/<?php echo $reports[$i]->report_id;?>">edit</a></td>
<td><a href="/KiaDFRS/index.php/report/delete/<?php echo $reports[$i]->report_id;?>" onclick="return confirm('are you sure to delete')">delete</a></td>
</tr>
<?php }?>  
</table> 
</body>
</html>