<html>  
<head>  
<title>IOF Open List for a Requestor</title>  
<style>
body {
    background-color: lightblue;
}
</style>
</head>  
<body>  
<h1>IOF Open List</h1>
<?php
require_once('db_functions.php');
require_once('common_functions.php');
$text_iof_reqby = $_POST["requestedby"];
$myresult = get_iof_master_details_by_req($text_iof_reqby);
$reqby = $text_iof_reqby;
?>
<form  action="biisixpartreqslist.php?reqby=<?=$_GET["reqby"];?>" name="frmEdit" method="post">
<table id="t01" width="96%" border="1">
<tr>
<th width="91"> <div align="center">IOFNumber  </div></th>
<th width="98"> <div align="center">CustNumber  </div></th>
<th width="198"> <div align="center">RequestedBy  </div></th>
<th width="97"> <div align="center">DeptName  </div></th>
<th width="97"> <div align="center">IOFType  </div></th>
<th width="97"> <div align="center">Bill To  </div></th>
<th width="97"> <div align="center">Ship To  </div></th>
<th width="97"> <div align="center">Status </div></th>
</tr>
<?php
while($row1 = $myresult->fetch_assoc())
{
?>
<tr>
<td width="10%"><div  align="center"><?=$row1["ORDER_NO"];?></div></td>
<td width="10%"><?=$row1["CUSTOMERNO"];?></td>
<td width="12%"><?=$row1["REQUESTED_BY"];?></td>
<td width="10%"><?=$row1["DEPT_NAME"];?></td>
<td width="18%"><?=$row1["IOF_TYPE"];?></td>
<td width="12%"><?=$row1["BILL_TO"];?></td>
<td width="12%"><?=$row1["SHIP_TO"];?></td>
<td width="18%"><?=$row1["STATUS"];?></td>
<td width="6%" align="center"><a  href="biisixpartreqlistdet.php?OrderNo=<?=$row1["ORDER_NO"];?>">List</a></td>
<td width="6%" align="center"><a  href="biisixpartreqlistd.php?OrderNo=<?=$row1["ORDER_NO"];?>&Requestedby=<?=$_GET["Requestedby"];?>">Cancel</a></td>
</tr>
<?php
}
?>
</table>
<hr>
<input type="hidden" value="<?php echo $reqby; ?>" name="reqby" />
<input type="submit" name="sclist" value="ShippedCancelledList">
<input type="submit" name="creiof" value="CreateIOF">
</form>
</body>  
</html> 
