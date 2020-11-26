<html>  
<head>  
<title>IOF Details</title>  
<style>
body {
    background-color: lightblue;
}
label{
    display:inline-block;
    width:240px;
    font-weight: bold;
}
.main {
  font-family:Arial,Verdana,sans-serif;
  font-size:1.5em; 
}
input[type="text"]
{
    font-size:18px;
}
</style>
</head>  
<body>  
<?php
require_once('db_functions.php');
$order_no = $_GET["OrderNo"];
$my_master_result = get_iof_master_details($order_no);
?>
<table id="t01" class="main" width="100%" border="1">
<tr>
<th width="30"> <div align="center">IOFNumber  </div></th>
<th width="45"> <div align="center">CustNumber  </div></th>
<th width="40"> <div align="center">DeptName  </div></th>
<th width="120"> <div align="center">IOFType   </div></th>
<th width="120"> <div align="center">Bill To   </div></th>
<th width="120"> <div align="center">Ship To   </div></th>
<th width="120"> <div align="center">Status    </div></th>
</tr>
<?php
while($row1 = $my_master_result->fetch_assoc())
{
$iof_comments = $row1["IOF_COMMENTS"];
$iof_type =  $row1["IOF_TYPE"];
$iof_no = $row1["ORDER_NO"];
?>
<tr>
<td width="10%"><div  align="center"><?=$row1["ORDER_NO"];?></div></td>
<td width="10%"><?=$row1["CUSTOMERNO"];?></td>
<td width="10%"><?=$row1["DEPT_NAME"];?></td>
<td width="14%"><?=$row1["IOF_TYPE"];?></td>
<td width="12%"><?=$row1["BILL_TO"];?></td>
<td width="12%"><?=$row1["SHIP_TO"];?></td>
<td width="10%"><?=$row1["STATUS"];?></td>
<td width="8%" align="center"><a  href="biilistmultirec.php?OrderNo=<?=$row1["ORDER_NO"];?>">AddMultiRec</a></td>
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
<input type="hidden" value="<?php echo $iof_no; ?>" name="orderno" />
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
$my_detail_result = get_iof_detail_details($order_no);
$IOFBILL = "IOF Bill";
if ( $iof_type == $IOFBILL ) {
?>
<table id="t03" class="main" width="600" border="1">
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
<td><input type="text" name="txtORDERNO[]" size="18" value="<?=$_GET["OrderNo"];?>" style="background-color:lightblue;" readonly></td>
<td><input type="text" name="txtSEGMENT1[]" size="18" value="<?=$row["SEGMENT1"];?>" style="background-color:lightblue;" readonly></td>
<td><input type="text" name="txtDESCRIPTION[]" size="78" value="<?=$row["DESCRIPTION"];?>" style="background-color:lightblue;" readonly></td>
<td><input type="text" name="txtFILLFROM[]" size="10" value="<?=$row["FILL_FROM"];?>"></td>
<td><input type="text" name="txtQTY[]" size="10" value="<?=$row["QTY"];?>"></td>
<td><input type="text" name="txtUNITPRICE[]" size="10" value="<?=$row["UNIT_PRICE"];?>"></td>
<td><input type="text" name="txtEXTPRICE[]" size="10" value="<?=$extended_price;?>" style="background-color:lightblue;" readonly></td>
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
<table id="t02" width="600" border="1">
<tr>
<th width="41"> <div align="center">OrderNo  </div></th>
<th width="41"> <div align="center">ItemName  </div></th>
<th width="198"> <div align="center">Description  </div></th>
<th width="198"> <div align="center">Fill From  </div></th>
<th width="28"> <div align="center">Quantity  </div></th>
</tr>
<?php
while($row = $my_detail_result->fetch_assoc())
{
?>
<tr>
<td><input type="text" name="txtORDERNO[]" size="18" value="<?=$_GET["OrderNo"];?>" style="background-color:lightblue;" readonly></td>
<td><input type="text" name="txtSEGMENT1[]" size="18" value="<?=$row["SEGMENT1"];?>" style="background-color:lightblue;" readonly></td>
<td><input type="text" name="txtDESCRIPTION[]" size="78" value="<?=$row["DESCRIPTION"];?>" style="background-color:lightblue;" readonly></td>
<td><input type="text" name="txtFILLFROM[]" size="10" value="<?=$row["FILL_FROM"];?>"></td>
<td><input type="text" name="txtQTY[]" size="10" value="<?=$row["QTY"];?>"></td>
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
