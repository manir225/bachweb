<html>  
<head>  
<title>IOF Details</title>  
<link type="text/css" rel="stylesheet" href="biiioflist.css">
</head>  
<body>  
<?php
require_once('db_functions.php');
$order_no = array();
$item_name = array();
$item_desc = array();
$item_qty = array();
$item_fill_from = array();
$item_price = array();
$item_iof_type = array();
$oind = 0;
$iind = 0;
$dind = 0;
$qind = 0;
$find = 0;
$pind = 0;
$tind = 0;
foreach ($_POST as $key => $entry)
{
   if (is_array($entry)) {
        foreach($entry as $value) {
           if ($key == 'txtORDERNO') {
               $order_no[$oind] = $value;
               $oind++;
           }
           if ($key == 'txtSEGMENT1') {
               $item_name[$iind] = $value;
               $iind++;
           }
           if ($key == 'txtDESCRIPTION') {
               if ($value == '' ) {
                  $item_desc[$dind] = 'MISC';
               }
               else {
                  $item_desc[$dind] = $value;
               }
               $dind++;
           }
           if ($key == 'txtQTY') {
               $item_qty[$qind] = $value;
               $qind++;
           }
           if ($key == 'txtFILLFROM') {
               $item_fill_from[$find] = $value;
               $find++;
           }
           if ($key == 'txtUNITPRICE') {
               $item_price[$pind] = $value;
               $pind++;
           }
           if ($key == 'txtIOFTYPE') {
               $item_iof_type[$tind] = $value;
               $tind++;
           }
       }
   }
}
for($x = 0; $x < $oind+1; $x++) {
    if ($item_qty[$x] <> '' ) {
        if ($item_qty[$x] == '0' ) { 
           $del_sixpart_detail_status = delete_sixpart_detail($order_no[$x],$item_name[$x],$item_desc[$x]);
        } 
        else { 
          //echo $item_iof_type[$x];
          if ( $item_iof_type[$x] == '' ) {
             $my_master_type_result = get_iof_master_details($order_no[$x]);
             while($rowmt = $my_master_type_result->fetch_assoc()) {
                  $iof_mtype = $rowmt["IOF_TYPE"];
             }
          }
          else {
               $iof_mtype = $item_iof_type[$x];
          }
          $iof_type_result = validate_iof_type($iof_mtype);
          while($rowit = $iof_type_result->fetch_assoc()) {
               $iof_item_type = $rowit["SEGMENT1"];
          }
          $iof_fill_from = $item_fill_from[$x];
          if  ( strtoupper($iof_fill_from) == 'PHI' ) {
              if ( $iof_item_type == 'IOF Shortage' ) {
                 $iof_fill_from = $item_fill_from[$x];
              }
              else {
                 $iof_fill_from = 'SVC';
              }
          }
          $text_desc1=str_replace("'"," ",$item_desc[$x]);
          $text_desc=str_replace("&","AND",$text_desc1);
          $iof_detail_result = check_iof_detail($order_no[$x],$item_name[$x],$text_desc);
          if ( $iof_detail_result == "NR" ){
             $text_desc=str_replace("'"," ",$item_desc[$x]);
             $ins_sixpart_detail_status = insert_sixpart_detail($order_no[$x],$item_name[$x],$text_desc,$iof_fill_from,(int)$item_qty[$x],str_replace($item_price[$x],'','0'),$iof_item_type);
          }
          else {
            while($row3 = $iof_detail_result->fetch_assoc()) {
               $upd_sixpart_detail_status = update_sixpart_detail((int)$item_qty[$x],$item_price[$x],$iof_fill_from,$iof_item_type,$order_no[$x],$item_name[$x],$text_desc);
            }
          }
       
       } 
   }
}
$iof_status = 'OPEN';
$upd_sixpart_master_status = update_sixpart_master_status($order_no[0],$iof_status);
$ITEM_EXIST = 1;
if ( $order_no[0] == '' ) {
   $ITEM_EXIST = 0;
   echo "You need to choose atleaset one product/item before you press the submit button, please go back and correct it";
}
else {
    $ITEM_EXIST = 1;
    $my_master_result = get_iof_master_details($order_no[0]);
?>
<table id="t01" class="main" width="100%" border="1">
<tr>
<th width="91"> <div align="center">OrderNumber  </div></th>
<th width="98"> <div align="center">CustNumber  </div></th>
<th width="97"> <div align="center">DeptName  </div></th>
<th width="97"> <div align="center">IOF Type  </div></th>
<th width="97"> <div align="center">Bill To  </div></th>
<th width="97"> <div align="center">Ship To  </div></th>
<th width="97"> <div align="center">Status  </div></th>
</tr>
<?php
while($row1 = $my_master_result->fetch_assoc())
{
$iof_type = $row1["IOF_TYPE"];
$IOFEMPSALE = "IOF Employee Sale";
$IOFBILL = "IOF Bill";
$IOFCATLOG = "IOF Catalog";
$IOFSHORTAGE = "IOF Shortage";
$iof_comments = $row1["IOF_COMMENTS"];
$ioforderno = $row1["ORDER_NO"];
if ($iof_type == $IOFEMPSALE ) {
 $sumbit_value = "CreateShipDocuments";
 $ioftypeurl = "biisixpartshipconfirm.php?OrderNo=".$ioforderno;
}
elseif ($iof_type == $IOFBILL ) {
 $sumbit_value = "SendforCreditCheck"; 
 $ioftypeurl = "biisixpartapprreq.php?OrderNo=".$ioforderno;
}
elseif ($iof_type == $IOFCATLOG ) {
 $sumbit_value = "SendforCatalogCheck"; 
 $ioftypeurl = "biisixpartapprreq.php?OrderNo=".$ioforderno;
}
elseif ($iof_type == $IOFSHORTAGE ) {
 $sumbit_value = "ProcessShortage"; 
 $ioftypeurl = "biisixpartsvcorphi.php?OrderNo=".$ioforderno;
}
else {
 $sumbit_value = "SendforApproval";
 $ioftypeurl = "biisixpartapprreq.php?OrderNo=".$ioforderno;
}
$inclpartslist = $row1["INCL_PARTS_LIST"];
if ($inclpartslist == 'YES' ) {
   $fname = $ioforderno.".pdf";
   $partsviewurl = "biisixpartdisplaypdf.php?PDFFile=".$fname;
   $partsviewdesc = "ViewPartsDetails";
}
else {
  $partsviewurl = "";
  $partsviewdesc = "";
}
?>
<tr>
<td width="10%"><div  align="center"><?=$row1["ORDER_NO"];?></div></td>
<td width="8%"><?=$row1["CUSTOMERNO"];?></td>
<td width="10%"><?=$row1["DEPT_NAME"];?></td>
<td width="16%"><?=$row1["IOF_TYPE"];?></td>
<td width="12%"><?=$row1["BILL_TO"];?></td>
<td width="12%"><?=$row1["SHIP_TO"];?></td>
<td width="12%"><?=$row1["STATUS"];?></td>
<td width="8%" align="center"><a  href="biisixparteditmain.php?OrderNo=<?=$row1["ORDER_NO"];?>">Edit</a></td>
<td width="8%" align="center"><a  href="biiuploadsixpartimg.php?OrderNo=<?=$row1["ORDER_NO"];?>">UploadPartsPDF</a></td>
<td width="8%" align="center"><a  href="<?=$ioftypeurl;?>"><?php echo $sumbit_value; ?></a></td>
<td width="6%" align="center"><a  href="<?=$partsviewurl;?>"><?=$partsviewdesc;?></a></td>
</tr>
<?php
}
?>
</table>
<hr>
<label>Special Instructions: <textarea rows="3" cols="100" style="border: none; background-color:lightblue; font-size:25px" readonly/><?php echo $iof_comments; ?></textarea>
<hr>
<form  action="biisixpartsearchitems.php?OrderNo=<?=$_GET["orderno"];?>&SearchCondition=<?=$_GET["searchcondition"];?>&SearchCondition2=<?=$_GET["searchcondition2"];?>"  name="frmEdit" method="post">
<input type="hidden" value="<?php echo $order_no[0]; ?>" name="orderno" />
<label>Search by Product Number: <input type="text" name="searchcondition2" value="<?php echo $searchcondition2; ?>" />
<br/>
<label>Search by Product Description: <input type="text" name="searchcondition" size="80" value="<?php echo $searchcondition; ?>" />
<br/>
<br>
<input type="submit" name="submit" value="SearchForProducts">
</form>
<form  action="biilistsixparts.php"  name="frmItem" method="post" onSubmit="return validateItem(this)">
<?php
$my_detail_result = get_iof_detail_details($order_no[0]);
$ITEM_EXIST = 0;
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
$ITEM_EXIST = 1;
$itemqty = $row["QTY"];
$itemprice = $row["UNIT_PRICE"];
$extended_price = $itemqty*$itemprice;
?>
<tr>
<td><input type="text" name="txtORDERNO[]" size="18" value="<?=$order_no[0];?>" style="background-color:lightblue;" readonly></td>
<td><input type="text" name="txtSEGMENT1[]" size="18" value="<?=$row["SEGMENT1"];?>" style="background-color:lightblue;" readonly></td>
<td><input type="text" name="txtDESCRIPTION[]" size="78" value="<?=$row["DESCRIPTION"];?>" style="background-color:lightblue;" readonly></td>
<td><input type="text" name="txtFILLFROM[]" size="6" value="<?=$row["FILL_FROM"];?>"></td>
<td><input type="text" name="txtQTY[]" id="txtQTY" size="6" value="<?=$row["QTY"];?>"></td>
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
$ITEM_EXIST = 1;
?>
<tr>
<td><input type="text" name="txtORDERNO[]" size="18" value="<?=$order_no[0];?>" style="background-color:lightblue;" readonly></td>
<td><input type="text" name="txtSEGMENT1[]" size="18" value="<?=$row["SEGMENT1"];?>" style="background-color:lightblue;" readonly></td>
<td><input type="text" name="txtDESCRIPTION[]" size="78" value="<?=$row["DESCRIPTION"];?>" style="background-color:lightblue;" readonly></td>
<td><input type="text" name="txtIOFTYPE[]" size="16" value="<?=$row["ITEM_IOF_TYPE"];?>"></td>
<td><input type="text" name="txtFILLFROM[]" size="6" value="<?=$row["FILL_FROM"];?>"></td>
<td><input type="text" name="txtQTY[]" id="txtQTY" size="12" value="<?=$row["QTY"];?>"></td>
</tr>
<?php
}
?>
</table>
<?php
}
?>
<input type="hidden" name="itemexist" id="itemexist" value="<?php echo $ITEM_EXIST; ?>" />
<label>Message: <input type="text" id="errormessage" name="errormessage" id= "errormessage" size="90" style="border: none; font-weight: bold; color:red; background-color:lightblue;" readonly/>
<br>
<input type="submit" name="submit" value="submit">
</form>
<script src="biiioflist_mod.js"></script>
<?php
}
?>  
</body>  
</html> 
