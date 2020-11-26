<html>  
<head>  
<title>IOF List</title>  
<style>
body {
    background-color: lightblue;
}
td {
    border:none;
}
label{
    display:inline-block;
    width:240px;
}
</style>
</head>  
<body>  
<?php
require_once('db_functions.php');
$reqby = $_POST["reqby"];
$my_master_rec_by_reqby = get_iof_master_details_by_reqby($reqby);
?>
<table id="t01" width="96%" border="1">
<tr>
<th width="91"> <div align="center">IOFNumber  </div></th>
<th width="98"> <div align="center">CustNumber  </div></th>
<th width="198"> <div align="center">RequestedBy  </div></th>
<th width="97"> <div align="center">DeptName  </div></th>
<th width="97"> <div align="center">IOFType  </div></th>
<th width="97"> <div align="center">Bill To  </div></th>
<th width="97"> <div align="center">Ship To  </div></th>
<th width="97"> <div align="center">Ship Date </div></th>
<th width="97"> <div align="center">Status </div></th>
</tr>
<?php
while($row1 = $my_master_rec_by_reqby->fetch_assoc())
{
?>
<tr>
<td width="10%"><div  align="center"><?=$row1["ORDER_NO"];?></div></td>
<td width="10%"><?=$row1["CUSTOMERNO"];?></td>
<td width="12%"><?=$row1["REQUESTED_BY"];?></td>
<td width="10%"><?=$row1["DEPT_NAME"];?></td>
<td width="12%"><?=$row1["IOF_TYPE"];?></td>
<td width="12%"><?=$row1["BILL_TO"];?></td>
<td width="15%"><?=$row1["SHIP_TO"];?></td>
<td width="8%"><?=$row1["SHIP_DATE"];?></td>
<td width="12%"><?=$row1["STATUS"];?></td>
<td width="6%" align="center"><a  href="biisixpartcanshipdet.php?OrderNo=<?=$row1["ORDER_NO"];?>">List</a></td>
</tr>
<?php
}
?>
</table>
</body>  
</html> 
