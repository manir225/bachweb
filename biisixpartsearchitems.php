<html>  
<head>  
<title>IOF Search List</title>  
<link type="text/css" rel="stylesheet" href="sixpartsearchitems.css">
</head>  
<body>  
<?php
require_once('db_functions.php');
$ordno = $_POST["orderno"];
$myresult=get_iof_master_details($ordno);
?>
<table id="t01" width="90%" border="1">
<tr>
<th width="91"> <div align="left">IOFNumber  </div></th>
<th width="98"> <div align="left">CustNumber  </div></th>
<th width="198"> <div align="left">RequestedBy  </div></th>
<th width="97"> <div align="left">DeptName  </div></th>
<th width="198"> <div align="left">IOFType  </div></th>
<th width="198"> <div align="left">Bill To  </div></th>
<th width="198"> <div align="left">Ship To  </div></th>
<th width="198"> <div align="left">Status  </div></th>
</tr>
<?php
while($row1 = $myresult->fetch_assoc())
{
$iof_type = $row1["IOF_TYPE"];
?>
<tr>
<td width="10%"><div  align="left"><?=$row1["ORDER_NO"];?></div></td>
<td width="8%"><?=$row1["CUSTOMERNO"];?></td>
<td width="12%"><?=$row1["REQUESTED_BY"];?></td>
<td width="10%"><?=$row1["DEPT_NAME"];?></td>
<td width="18%"><?=$row1["IOF_TYPE"];?></td>
<td width="12%"><?=$row1["BILL_TO"];?></td>
<td width="12%"><?=$row1["SHIP_TO"];?></td>
<td width="8%"><?=$row1["STATUS"];?></td>
</tr>
<?php
}
?>
</table>
<hr>
<form  action="biisixpartsearchitems.php?OrderNo=<?=$_GET["orderno"];?>&SearchCondition=<?=$_GET["searchcondition"];?>&SearchCondition2=<?=$_GET["searchcondition2"];?>"  name="frmEdit" method="post">
<input type="hidden" value="<?php echo $_POST["orderno"]; ?>" name="orderno" />
<label>Search by Product Number: <input type="text" name="searchcondition2" value="<?php echo $searchcondition2; ?>" />
<br/>
<label>Search by Product Description: <input type="text" name="searchcondition" size="80" value="<?php echo $searchcondition; ?>" />
<br/>
<br>
<input class="btn btn-sub" type="submit" name="submit" value="SearchForProducts">
</form>
<hr>
<form  action="biilistsixparts.php"  name="frmEdit" method="post">
<?php
$search_condition2 = $_POST["searchcondition2"];
$search_condition1 = $_POST["searchcondition"];
$mysresult = get_search_items($search_condition1, $search_condition2); 
if ($iof_type == "IOF Bill" ) {
?>
<table id="t03" width="600" border="1">
<tr>
<th width="41"> <div align="left">IOFNumber  </div></th>
<th width="41"> <div align="left">ItemName  </div></th>
<th width="198"> <div align="left">Description  </div></th>
<th width="198"> <div align="left">Fill From  </div></th>
<th width="28"> <div align="left">Quantity Available  </div></th>
<th width="28"> <div align="left">Quantity  </div></th>
<th width="28"> <div align="left">Unit Price  </div></th>
</tr>
<?php
$i = 0;
while($row = $mysresult->fetch_assoc())
{
$itemno = $row["SEGMENT1"];
$text_desc=str_replace("&"," AND ",$row["DESCRIPTION"]);
if ($itemno == 'PARTS' ) {
   $text_desc= '';
}
$text_QTY = str_replace($row["QTY"],'0','');
++$i;
?>
<tr>
<td><input type="text" name="txtORDERNO[]" size="20" value="<?=substr($_POST["requestedby"],0,4).$_POST["orderno"];?>" style="background-color:lightblue;" readonly></td>
<td><input type="text" name="txtSEGMENT1[]" size="14" value="<?=$row["SEGMENT1"];?>" style="background-color:lightblue;" readonly></td>
<td><input type="text" name="txtDESCRIPTION[]" size="68" value="<?=$text_desc;?>"></td>
<td><input type="text" name="txtFILLFROM[]" size="10" value="SVC"></td>
<td><input type="text" name="txtQTYAVL[]" size="10" value="<?=$row["QTY_AVL"];?>" style="background-color:lightblue;" readonly></td>
<td><input type="text" name="txtQTY[]" size="10" value="<?=$text_QTY;?>"></td>
<td><input type="text" name="txtUNITPRICE[]" size="10" value=""></td>
</tr>
<?php
}
if ($i == 0) {
   echo "Currently there are no items available for this serach criteria, please change the criteria and search again";
}
?>
</table>
<?php
}
else { 
?>
<table id="t02" width="600" border="1">
<tr>
<th width="41"> <div align="left">IOFNumber  </div></th>
<th width="41"> <div align="left">ItemName  </div></th>
<th width="198"> <div align="left">Description  </div></th>
<th width="28"> <div align="left">IOF Type  </div></th>
<th width="198"> <div align="left">Fill From  </div></th>
<th width="28"> <div align="left">Quantity Available  </div></th>
<th width="28"> <div align="left">Quantity  </div></th>
</tr>
<?php
$i = 0;
while($row = $mysresult->fetch_assoc())
{
$itemno = $row["SEGMENT1"];
$text_desc=str_replace("&"," AND ",$row["DESCRIPTION"]);
if ($itemno == 'PARTS' ) {
   $text_desc= '';
}
$text_QTY = str_replace($row["QTY"],'0','');
++$i;
?>
<tr>
<td><input type="text" name="txtORDERNO[]" size="20" value="<?=substr($_POST["requestedby"],0,4).$_POST["orderno"];?>" style="background-color:lightblue;" readonly></td>
<td><input type="text" name="txtSEGMENT1[]" size="14" value="<?=$row["SEGMENT1"];?>" style="background-color:lightblue;" readonly></td>
<td><input type="text" name="txtDESCRIPTION[]" size="68" value="<?=$text_desc;?>"></td>
<td><input type="text" name="txtIOFTYPE[]" size="30" value="<?=$iof_type;?>"></td>
<td><input type="text" name="txtFILLFROM[]" size="10" value="SVC"></td>
<td><input type="text" name="txtQTYAVL[]" size="10" value="<?=$row["QTY_AVL"];?>" style="background-color:lightblue;" readonly></td>
<td><input type="text" name="txtQTY[]" id="txtQTY" size="10" value="<?=$text_QTY;?>"></td>
</tr>
<?php
}
if ($i == 0) {
   echo "Currently there are no items available for this serach criteria, please change the criteria and search again";
}
}
?>
</table>
<input class="btn btn-sub" type="submit" name="submit" value="Save Prodcuts">
</form>
<?php
?>  
</body>  
</html> 
