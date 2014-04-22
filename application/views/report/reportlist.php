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
<th>report_date</th>
<th>client</th>
<th>address</th>
<th>contactno</th>
<th>model_id</th>
<th>term </th>
<th>remarks </th>
<th>edit </th>
<th>delete </th>
</tr>
<?php
//print_r($reports);
for($i=0; $i<count($reports);$i++) {
?>
<tr>
<td><?php echo $reports[$i]->report_date;?></td>
<td><?php echo $reports[$i]->client;?></td>
<td><?php echo $reports[$i]->address;?></td>
<td><?php echo $reports[$i]->contactno;?></td>
<td><?php echo $reports[$i]->model_id;?></td>
<td><?php echo $reports[$i]->term;?></td>
<td><?php echo $reports[$i]->remarks;?></td>
<td><a href="/KiaDFRS/index.php/report/edit/<?php echo $reports[$i]->report_id;?>">edit</a></td>
<td><a href="/KiaDFRS/index.php/report/delete/<?php echo $reports[$i]->report_id;?>" onclick="return confirm('are you sure to delete')">delete</a></td>
</tr>
<?php }?>  
</table> 
</body>
</html>