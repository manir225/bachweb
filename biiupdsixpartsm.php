<html>  
<head>  
<title>IOF Edit Completed</title>  
<style>
body {
    background-color: lightblue;
}
label{
    display:inline-block;
    width:240px;
    font-weight: bold;
}
</style>
</head>  
<body>  
<?php
require_once('db_functions.php');
$orderno = $_POST["orderno"]; 
$billto = $_POST["billto"];
$shipto = $_POST["shipto"];
$customerno = $_POST["customerno"];
$salesrepno = $_POST["salesrepno"];
$requestedby = $_POST["requestedby"];
$deptname = $_POST["deptname"];
$ioftype = $_POST["ioftype"];
$billtoaddr1 = $_POST["billtoaddr1"]; 
$shiptoaddr1 = $_POST["shiptoaddr1"];
$billtoaddr2 = $_POST["billtoaddr2"];
$shiptoaddr2 = $_POST["shiptoaddr2"];
$billtoaddr3 = $_POST["billtoaddr3"];
$shiptoaddr3 = $_POST["shiptoaddr3"]; 
$billtocity = $_POST["billtocity"];
$shiptocity = $_POST["shiptocity"];
$billtostate = $_POST["billtostate"];
$shiptostate = $_POST["shiptostate"];
$billtozip = $_POST["billtozip"];
$shiptozip = $_POST["shiptozip"];
$billtocountry = $_POST["billtocountry"];
$shiptocountry = $_POST["shiptocountry"];
$billtophone = $_POST["billtophone"];
$shiptophone = $_POST["shiptophone"];
$billtemail = $_POST["billtemail"];
$shiptoemail = $_POST["shiptoemail"];
$iofcomments = $_POST["iofcomments"];
$iofapprcomments = $_POST["iofcommentsforapprover"];
$update_sixpart_master_status = update_sixpart_master($orderno,$billto,$shipto,$customerno,$salesrepno,$requestedby,$deptname,$ioftype,$billtoaddr1,$shiptoaddr1,$billtoaddr2,$shiptoaddr2,$billtoaddr3,$shiptoaddr3,$billtocity,$shiptocity,$billtostate,$shiptostate,$billtozip,$shiptozip,$billtocountry,$shiptocountry,$billtophone,$shiptophone,$billtemail,$shiptoemail,$iofcomments,$iofapprcomments);
$my_master_result = get_iof_master_details($orderno);
?>
<table id="t01" width="86%" border="1">
<tr>
<th width="91"> <div align="center">OrderNumber  </div></th>
<th width="98"> <div align="center">CustNumber  </div></th>
<th width="198"> <div align="center">RequestedBy  </div></th>
<th width="97"> <div align="center">DeptName  </div></th>
<th width="97"> <div align="center">IOF Type  </div></th>
<th width="97"> <div align="center">BILL TO  </div></th>
<th width="97"> <div align="center">SHIP TO  </div></th>
</tr>
<?php
while($row1 = $my_master_result->fetch_assoc())
{
$iof_comments = $row1["IOF_COMMENTS"];
$iof_no = $row1["ORDER_NO"];
$iof_type = $row1["IOF_TYPE"];
?>
<tr>
<td width="10%"><div  align="center"><?=$row1["ORDER_NO"];?></div></td>
<td width="10%"><?=$row1["CUSTOMERNO"];?></td>
<td width="12%"><?=$row1["REQUESTED_BY"];?></td>
<td width="10%"><?=$row1["DEPT_NAME"];?></td>
<td width="20%"><?=$row1["IOF_TYPE"];?></td>
<td width="12%"><?=$row1["BILL_TO"];?></td>
<td width="12%"><?=$row1["SHIP_TO"];?></td>
<td width="8%" align="center"><a  href="biisixparteditmain.php?OrderNo=<?=$row1["ORDER_NO"];?>">Edit</a></td>
</tr>
<?php
}
?>
</table>
<hr>
<label>Special Instructions: <textarea rows="3" cols="100" style="border: none; background-color:lightblue; font-size:25px" readonly/><?php echo $iof_comments; ?></textarea>
<hr>
<form  action="biisixpartsearchitems.php?OrderNo=<?=$_GET["orderno"];?>&SearchCondition=<?=$_GET["searchcondition"];?>&SearchCondition2=<?=$_GET["searchcondition2"];?>"  name="frmEdit" method="post">
<?php
$iofno = $_POST["orderno"];
?>
<input type="hidden" value="<?php echo $iofno; ?>" name="orderno" />
<label>Search by Product Number: <input type="text" name="searchcondition2" value="<?php echo $searchcondition2; ?>" />
<br/>
<label>Search by Product Description: <input type="text" name="searchcondition" size="80" value="<?php echo $searchcondition; ?>" />
<br/>
<br>
<input type="submit" name="submit" value="SearchForProducts">
</form>
<hr>
<form  action="biilistsixparts.php"  name="frmEdit" method="post">
<?php
$IOFBILL = "IOF Bill";
$my_detail_result = get_iof_detail_details($orderno);
if ( $iof_type == $IOFBILL ) {
?>
<table id="t03"  width="600" border="1">
<tr>
<th width="41"> <div align="center">OrderNo  </div></th>
<th width="41"> <div align="center">ItemName  </div></th>
<th width="198"> <div align="center">Description  </div></th>
<th width="198"> <div align="center">Fill From  </div></th>
<th width="28"> <div align="center">Quantity  </div></th>
<th width="28"> <div align="center">Unit Price  </div></th>
<th width="28"> <div align="center">Extended Price  </div></th>
</tr>
<?php
while($row = $my_detail_result->fetch_assoc())
{
$itemqty = $row["QTY"];
$itemprice = $row["UNIT_PRICE"];
$extended_price = $itemqty*$itemprice;
?>
<tr>
<td><input type="text" name="txtORDERNO[]" size="18" value="<?=$row["ORDER_NO"];?>" style="background-color:lightblue;" readonly></td>
<td><input type="text" name="txtSEGMENT1[]" size="18" value="<?=$row["SEGMENT1"];?>" style="background-color:lightblue;" readonly></td>
<td><input type="text" name="txtDESCRIPTION[]" size="78" value="<?=$row["DESCRIPTION"];?>" style="background-color:lightblue;" readonly></td>
<td><input type="text" name="txtFILLFROM[]" size="6" value="<?=$row["FILL_FROM"];?>"></td>
<td><input type="text" name="txtQTY[]" size="6" value="<?=$row["QTY"];?>"></td>
<td><input type="text" name="txtUNITPRICE[]" size="6" value="<?=$row["UNIT_PRICE"];?>"></td>
<td><input type="text" name="txtEXTPRICE[]" size="6" value="<?=$extended_price;?>" style="background-color:lightblue;" readonly></td>
</tr>
<?php
}
?>
</table>
<?php
}
else {
?>
<hr>
<table id="t02" width="550" border="1">
<tr>
<th width="41"> <div align="center">OrderNo  </div></th>
<th width="41"> <div align="center">ItemName  </div></th>
<th width="198"> <div align="center">Description  </div></th>
<th width="198"> <div align="center">IOFType  </div></th>
<th width="198"> <div align="center">Fill From  </div></th>
<th width="28"> <div align="center">Quantity  </div></th>
</tr>
<?php
while($row = $my_detail_result->fetch_assoc())
{
?>
<tr>
<td><input type="text" name="txtORDERNO[]" size="18" value="<?=$row["ORDER_NO"];?>" style="background-color:lightblue;" readonly></td>
<td><input type="text" name="txtSEGMENT1[]" size="18" value="<?=$row["SEGMENT1"];?>" style="background-color:lightblue;" readonly></td>
<td><input type="text" name="txtDESCRIPTION[]" size="78" value="<?=$row["DESCRIPTION"];?>" style="background-color:lightblue;" readonly></td>
<td><input type="text" name="txtIOFTYPE[]" size="16" value="<?=$row["ITEM_IOF_TYPE"];?>"></td>
<td><input type="text" name="txtFILLFROM[]" size="6" value="<?=$row["FILL_FROM"];?>"></td>
<td><input type="text" name="txtQTY[]" size="12" value="<?=$row["QTY"];?>"></td>
</tr>
<?php
}
?>
</table>
<?php
}
?>
<input type="submit" name="submit" value="submit">
</form>
<?php
?>  
</body>  
</html> 
