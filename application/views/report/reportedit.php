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
<th>report_date</th>
<td><input type="text" name="report_date" value="<?php echo $report[0]->report_date;?>"/></td>
<tr>
<th>client</th>
<td><input type="text" name="client" value="<?php echo $report[0]->client;?>"/></td>
<tr>
<th>address</th>
<td><input type="text" name="address" value="<?php echo $report[0]->address;?>"/></td>
<tr>
<th>contactno</th>
<td><input type="text" name="contactno" value="<?php echo $report[0]->contactno;?>"/></td>
<tr>
<th>model</th>
<td><select id="model_id" name="model" value="<?php echo $report[0]->model_id;?>"/></td>
<tr>
<th>term</th>
<td><input type="text" name="term" value="<?php echo $report[0]->term;?>"/></td>
</tr>
<th>remarks</th>
<td><input type="text" name="remarks" value="<?php echo $report[0]->remarks;?>"/></td>
</tr>
<tr>
<td><input type="submit"></td>
<td><input type="reset"></td>
</tr>
</form>

</table> 
</body>
</html>