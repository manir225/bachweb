<html>  
<head>  
<title>Six Parts Details</title>  
<link type="text/css" rel="stylesheet" href="iofinssixparts.css">
</head>  
<body>  
<script>
  function display() {
    console.log('I am here');
            var ad1 = document.getElementById('saddr1').value;
            var ad2 = document.getElementById('saddr2').value;
            var adc = document.getElementById('city').value;
            var ads = document.getElementById('state').value;
            var adz = document.getElementById('zip').value;
            alert(ad1 + ", " + ad2 + ", " + adc + ", " + ads + ", " + adz);
   }
</script>
<?php
require_once('db_functions.php');
require_once('common_functions.php');
$cust_valid = "NO";
$iof_type = $_POST["ioftype"];
$custno = $_POST["customerno"];
if ( $iof_type == 'IOF Bill' ) {
    $cust_valid = check_customer ($custno);
}
else {
  $cust_valid = "YES";
}
if ($cust_valid == "YES" ) {
   $text_iof_ordno = substr($_POST["requestedby"],0,strpos($_POST["requestedby"],'@')).$_POST["orderno"];
   $text_iof_comments = getNewStr($_POST["iofcomments"]);;
   $text_appr_comments = getNewStr($_POST["iofcommentsforapprover"]);
   $text_iof_shipto= getNewStr($_POST["shipto"]);;
   $text_iof_billto= getNewStr($_POST["billto"]);;
   $text_iof_billtoaddr1= getNewStr($_POST["billtoaddr1"]);
   $text_iof_shiptoaddr1= getNewStr($_POST["shiptoaddr1"]);
   $text_iof_billtoaddr2= getNewStr($_POST["billtoaddr2"]);
   $text_iof_shiptoaddr2= getNewStr($_POST["shiptoaddr2"]);
   $text_iof_billtoaddr3= getNewStr($_POST["billtoaddr3"]);
   $text_iof_shiptoaddr3= getNewStr($_POST["shiptoaddr3"]);
   $text_iof_billtocity= getNewStr($_POST["billtocity"]);
   $text_iof_shiptocity= getNewStr($_POST["shiptocity"]);
   $text_iof_billtostate= getNewStr($_POST["billtostate"]);
   $text_iof_shiptostate= getNewStr($_POST["shiptostate"]);
   $text_iof_billtozip= getNewStr($_POST["billtozip"]);
   $text_iof_shiptozip= getNewStr($_POST["shiptozip"]);
   $text_iof_billtocountry= getNewStr($_POST["billtocountry"]);
   $text_iof_shiptocountry= getNewStr($_POST["shiptocountry"]);
   $text_iof_billtophone= getNewStr($_POST["billtophone"]);
   $text_iof_shiptophone= getNewStr($_POST["shiptophone"]);
   $text_iof_billtoemail= $_POST["billtoemail"];
   $text_iof_shiptoemail= $_POST["shiptoemail"];
   $text_iof_inclpartslist = $_POST["inclpartslist"];
   $text_iof_netterm = $_POST["netterm"];
   $text_iof_customerno = $_POST["customerno"];
   $text_iof_salesrepno = $_POST["salesrepno"];
   $text_iof_deptname   = $_POST["deptname"];
   $text_iof_requestedby = $_POST["requestedby"];
   $text_iof_ioftype     = $_POST["ioftype"];
   $text_iof_status  = "OPEN";
   $text_iof_approvedby = "";
   $text_iof_track_no = "";
   $text_iof_carrier = "";
   $iof_reject_reason = "";
   $text_opt_out_emails = "";
   $text_iof_emp_total = "";
   $text_iof_freight_charge = "";
   $text_iof_webrec = "YES";
   $insert_status = insert_master_tab($text_iof_ordno,$text_iof_customerno,$text_iof_salesrepno,$text_iof_deptname,$text_iof_requestedby,$text_iof_approvedby,$text_iof_ioftype,$text_iof_status,$text_iof_comments,$text_appr_comments,$text_iof_shipto,$text_iof_billto,$text_iof_billtoaddr1,$text_iof_shiptoaddr1,$text_iof_billtoaddr2,$text_iof_shiptoaddr2, $text_iof_billtoaddr3,$text_iof_shiptoaddr3,$text_iof_billtocity,$text_iof_shiptocity,$text_iof_billtostate,$text_iof_shiptostate,$text_iof_billtozip,$text_iof_shiptozip, $text_iof_billtocountry,$text_iof_shiptocountry,$text_iof_billtophone,$text_iof_shiptophone,$text_iof_billtoemail,$text_iof_shiptoemail,$text_iof_inclpartslist,$text_iof_netterm,$text_iof_track_no,$text_iof_carrier,$iof_reject_reason,$text_opt_out_emails,$text_iof_emp_total,$text_iof_freight_charge,$text_iof_webrec);
   if ($insert_status == 'SUCCESS' ) {
      $myresult = get_iof_master_details($text_iof_ordno);
?>
<table id="t01" class="main" width="94%" border="1">
<tr>
<th width="30"> <div align="left">IOFNumber  </div></th>
<th width="45"> <div align="left">CustNumber  </div></th>
<th width="40"> <div align="left">DeptName  </div></th>
<th width="120"> <div align="left">IOF Type  </div></th>
<th width="120"> <div align="left">Bill To  </div></th>
<th width="120"> <div align="left">Ship To  </div></th>
</tr>
<?php
     $rec_exists = 'NO';
     while($row1 = $myresult->fetch_assoc())
     {
       $saddress1 = $row1["SHIP_TO_ADDRESS1"];
       $saddress2 = $row1["SHIP_TO_ADDRESS2"];
       $scity = $row1["SHIP_TO_CITY"];
       $state = $row1["SHIP_TO_STATE"];
       $szip = $row1["SHIP_TO_ZIPCOE"];
       $rec_exists = 'YES';
?>
<tr>
<td width="12%"><div  align="center"><?=$row1["ORDER_NO"];?></div></td>
<td width="10%"><?=$row1["CUSTOMERNO"];?></td>
<td width="12%"><?=$row1["DEPT_NAME"];?></td>
<td width="18%"><?=$row1["IOF_TYPE"];?></td>
<td width="12%"><?=$row1["BILL_TO"];?></td>
<td width="12%"><?=$row1["SHIP_TO"];?></td>
<td width="8%" align="center"  ><a  href="biisixparteditmain.php?OrderNo=<?=$row1["ORDER_NO"];?>">Edit</a></td>
<td width="8%" align="center"  ><a  href="biiuploadsixpartitems.php?OrderNo=<?=$row1["ORDER_NO"];?>">UploadItemsFromCSV</a></td>
<td width="8%" align="center"  ><a  href="biiuploadsixpartimg.php?OrderNo=<?=$row1["ORDER_NO"];?>">UploadPartsPDF</a></td>
<td width="8%" ><input class="addr_btn" type="button" value="Address..." onClick="display();"></td>
</tr>
<?php
    }
    if ($rec_exists == 'YES' ) {
?>
</table>
<input type="hidden" value="<?php echo $saddress1; ?>" name="saddr1" id="saddr1" />
<input type="hidden" value="<?php echo $saddress2; ?>" name="saddr2" id="saddr2" />
<input type="hidden" value="<?php echo $scity; ?>" name="city" id="city" />
<input type="hidden" value="<?php echo $state; ?>" name="state" id="state" />
<input type="hidden" value="<?php echo $szip; ?>" name="zip" id="zip" />
<hr>
<form  action="biisixpartsearchitems.php?OrderNo=<?=$_GET["orderno"];?>&SearchCondition=<?=$_GET["searchcondition"];?>&SearchCondition2=<?=$_GET["searchcondition2"];?>"  name="frmEdit" method="post">
<input type="hidden" value="<?php echo substr($_POST["requestedby"],0,strpos($_POST["requestedby"],'@')).$_POST["orderno"]; ?>" name="orderno" />
<label>Search by Product Number: <input type="text" name="searchcondition2" value="<?php echo $searchcondition2; ?>" />  
<br/>
<label>Search by Product Description: <input type="text" name="searchcondition" size="80" value="<?php echo $searchcondition; ?>" />
<br/>
<br>
<input class="btn btn-sub" type="submit" name="submit" value="SearchForProducts">
</form>
<?php
   }
   else {
       echo "These is problem creating the IOF, please press the back button and correct the issue";
   }
 }
}
else {
 echo "For IOF Bill, please choose a valid existing customer";
}
?>  
</body>  
</html> 
