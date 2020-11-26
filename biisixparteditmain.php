<html>  
<head>  
<title>IOF Edit</title>  
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
$order_no = $_GET["OrderNo"];
$my_master_result = get_iof_master_details($order_no);
while($row1 = $my_master_result->fetch_assoc())
{
$iofno=$row1["ORDER_NO"];
$customerno=$row1["CUSTOMERNO"];
$requestedby=$row1["REQUESTED_BY"];
$salesrepno=$row1["SALESREPNO"];
$deptname=$row1["DEPT_NAME"];
$ioftype=$row1["IOF_TYPE"];
$billto=$row1["BILL_TO"];
$shipto=$row1["SHIP_TO"];
$billtoaddr1=$row1["BILL_TO_ADDRESS1"];
$billtoaddr2=$row1["BILL_TO_ADDRESS2"];
$billtoaddr3=$row1["BILL_TO_ADDRESS3"];
$billtocity=$row1["BILL_TO_CITY"];
$billtostate=$row1["BILL_TO_STATE"];
$billtozip=$row1["BILL_TO_ZIPCOE"];
$billtocountry=$row1["BILL_TO_COUNTRY"];
$billtophone=$row1["BILL_TO_PHONE"];
$billtoemail=$row1["BILL_TO_EMAIL"];
$shiptoaddr1=$row1["SHIP_TO_ADDRESS1"];
$shiptoaddr2=$row1["SHIP_TO_ADDRESS2"];
$shiptoaddr3=$row1["SHIP_TO_ADDRESS3"];
$shiptocity=$row1["SHIP_TO_CITY"];
$shiptostate=$row1["SHIP_TO_STATE"];
$shiptozip=$row1["SHIP_TO_ZIPCOE"];
$shiptocountry=$row1["SHIP_TO_COUNTRY"];
$shiptophone=$row1["SHIP_TO_PHONE"];
$shiptoemail=$row1["SHIP_TO_EMAIL"];
$iofcomments=$row1["IOF_COMMENTS"];
$iofcommentsforapprover=$row1["IOF_COMMENTS_FOR_APPROVER"];
$iof_term = $row1["NET_TERM"];
}
$depts = array("SALES","MARKETING","FINANCE","IT","DESIGN","PRODUCT","SERVICE");
$deptnames = array("Sales Department","Marketing Department","Finance Department","IT Department","Design Department","Product Department","Service Department");
$emp_names = array("Terry Adair","Trevor Arnold","Doug Blane","Ray Buteux","Kimberly Gray","Larry Harrington","Laura Harris","Richard Janyszek","Judith Martin","David Melville","Debra Schiff","Helena Chandler-Stadler","Heather Stoltzfus","Mike Tonkinson","Philip Varughese","Carol Wagner","Ed Winter","Manjunath Nair");
$email_ids = array("AdairT@bachmanntrains.com","ArnoldT@bachmanntrains.com","BlaineD@bachmanntrains.com","buteuxr@bachmanntrains.com","grayk@bachmanntrains.com","HarringtonL@bachmanntrains.com","harrisl@bachmanntrains.com","JanyszekR@bachmanntrains.com","martinj@bachmanntrains.com","MelvilleD@bachmanntrains.com","SchiffD@bachmanntrains.com","stadlerh@bachmanntrains.com","stoltzfush@bachmanntrains.com","TonkinsonM@bachmanntrains.com","varughesep@bachmanntrains.com","WagnerC@bachmanntrains.com","WinterE@bachmanntrains.com","nairm@bachmanntrains.com");
$IOF_TYPES = array("IOF Bill","IOF Courtesy","IOF Donation (Sales)","IOF Donation (G AND A)","IOF Employee Sale","IOF Photography","IOF Prod Review","IOF Prod Testing","IOF Promotion","IOF R & D","IOF Replacement","IOF Sample","IOF Shortage","IOF Trade Show","IOF Borrow","IOF Catalog");
?>
<form  action="biiupdsixpartsm.php?OrderNo=<?=$_GET["orderno"];?>&CustNo=<?=$_GET["customerno"];?>&SalesrepNo=<?=$_GET["salesrepno"];?>&DeptName=<?=$_GET["deptname"];?>&RequestedBy=<?=$_GET["requestedby"];?>&ioftype=<?=$_GET["ioftype"];?>&BillTo=<?=$_GET["billto"];?>&BillToAddr1=<?=$_GET["billtoaddr1"];?>&BillToAddr2=<?=$_GET["billtoaddr2"];?>&BillToAddr3=<?=$_GET["billtoaddr3"];?>&BillToCity=<?=$_GET["billtocity"];?>&BillToState=<?=$_GET["billtostate"];?>&BillToZip=<?=$_GET["billtozip"];?>&BillToCountry=<?=$_GET["billtocountry"];?>&BillToPhone=<?=$_GET["billtophone"];?>&BillToEmail=<?=$_GET["billtoemail"];?>&ShipTo=<?=$_GET["shipto"];?>&ShipToAddr1=<?=$_GET["shiptoaddr1"];?>&ShipToAddr2=<?=$_GET["shiptoaddr2"];?>&ShipToAddr3=<?=$_GET["shiptoaddr3"];?>&ShipToCity=<?=$_GET["shiptocity"];?>&ShipToState=<?=$_GET["shiptostate"];?>&ShipToZip=<?=$_GET["shiptozip"];?>&ShipToCountry=<?=$_GET["shiptocountry"];?>&ShipToPhone=<?=$_GET["shiptophone"];?>&ShipToEmail=<?=$_GET["shiptoemail"];?>&ShipDate=<?=$_GET["shipdate"];?>&IOFComments=<?=$_GET["iofcomments"];?>&IOFCommentsForAppr=<?=$_GET["iofcommentsforapprover"];?>&SearchCondition=<?=$_GET["searchcondition"];?>"  name="frmEdit" method="post">  
<div>
Please select a department:
<select id="deptname" name="deptname">
<?php
  for ($i=0; $i<=6; $i++) {
      if($deptname == $depts[$i]){   
         echo "<option selected value='$depts[$i]'>$deptnames[$i]</option>";
   
      }
      else {
         echo "<option value='$depts[$i]'>$deptnames[$i]</option>";
      }
  }
?>
</select>
Please choose an employee:   
<select id="requestedby" name="requestedby">
<?php
  for ($i=0; $i<=17; $i++) {
      if($requestedby == $email_ids[$i]){
        echo "<option selected value='$email_ids[$i]'>$emp_names[$i]</option>";
      }
      else {
        echo "<option value='$email_ids[$i]'>$emp_names[$i]</option>";
      }
  }
?>
</select>
Please choose an  IOF Type:   
<select id="ioftype" name="ioftype">
<?php
  for ($i=0; $i<=15; $i++) {
       if(strtoupper($ioftype) == strtoupper($IOF_TYPES[$i])){
         echo "<option selected value='$IOF_TYPES[$i]'>$IOF_TYPES[$i]</option>";
       }
       else {
         echo "<option value='$IOF_TYPES[$i]'>$IOF_TYPES[$i]</option>";
       }
  }
?>
</select>
<input type="hidden" name="orderno" value="<?php echo $iofno; ?>" />
<h3> Bill To Details </h3>
<table width="800">
<tr><th></th><tr>
<th>Bill To</th>
<th>Address Line1</th>
</tr>
<tr>
<td><input type="text" name="billto" maxlength="50" size="50" value="<?php echo $billto; ?>"></td>
<td><input type="text" name="billtoaddr1" maxlength="80" size="100" value="<?php echo $billtoaddr1; ?>"></td>
</tr>
</table>
<table width="800">
<tr><th></th><tr>
<th>Address Line2</th>
<th>Address Line3</th>
</tr>
<tr>
<td><input type="text" name="billtoaddr2" maxlength="80" size="80" value="<?php echo $billtoaddr2; ?>"></td>
<td><input type="text" name="billtoaddr3" maxlength="70" size="70" value="<?php echo $billtoaddr3; ?>"></td>
</tr>
</table>
<table width="800">
<tr><th></th><tr>
<th>City</th>
<th>State</th>
<th>ZIP</th>
<th>Country</th>
<th>Phone</th>
<th>Email</th>
</tr>
<tr>
<td><input type="text" name="billtocity" maxlength="30" size="30" value="<?php echo $billtocity; ?>"></td>
<td><input type="text" name="billtostate" maxlength="20" size="5" value="<?php echo $billtostate; ?>"></td>
<td><input type="text" name="billtozip" size="15" value="<?php echo $billtozip; ?>"></td>
<td><input type="text" name="billtocountry" size="10" value="<?php echo $billtocountry; ?>"></td>
<td><input type="text" name="billtophone" maxlength="30" size="20" value="<?php echo $billtophone; ?>"></td>
<td><input type="text" name="billtoemail" maxlength="30" size="45" value="<?php echo $billtoemail; ?>"></td>
</tr>
</table>
<h3> Ship To Details </h3>
<table width="800">
<tr><th></th><tr>
<th>Ship To</th>
<th>Address Line1</th>
</tr>
<tr>
<td><input type="text" name="shipto" maxlength="50" size="50" value="<?php echo $shipto; ?>"></td>
<td><input type="text" name="shiptoaddr1" maxlength="80" size="100" value="<?php echo $shiptoaddr1; ?>"></td>
</tr>
</table>
<table width="800">
<tr><th></th><tr>
<th>Address Line2</th>
<th>Address Line3</th>
</tr>
<tr>
<td><input type="text" name="shiptoaddr2" maxlength="80" size="80" value="<?php echo $shiptoaddr2; ?>"></td>
<td><input type="text" name="shiptoaddr3" maxlength="70" size="70" value="<?php echo $shiptoaddr3; ?>"></td>
</tr>
</table>
<table width="800">
<tr><th></th><tr>
<th>City</th>
<th>State</th>
<th>ZIP</th>
<th>Country</th>
<th>Phone</th>
<th>Email</th>
</tr>
<tr>
<td><input type="text" name="shiptocity" maxlength="30" size="30" value="<?php echo $shiptocity; ?>"></td>
<td><input type="text" name="shiptostate"  maxlength="20" size="5" value="<?php echo $shiptostate; ?>"></td>
<td><input type="text" name="shiptozip" size="15" value="<?php echo $shiptozip; ?>"></td>
<td><input type="text" name="shiptocountry" size="10" value="<?php echo $shiptocountry; ?>"></td>
<td><input type="text" name="shiptophone" maxlength="30" size="20" value="<?php echo $shiptophone; ?>"></td>
<td><input type="text" name="shiptoemail" maxlength="30" size="45" value="<?php echo $shiptoemail; ?>"></td>
</tr>
</table>
<h3> Other Information </h3>
<label>CustomerNO: <input type="text" name="customerno" value="<?php echo $customerno; ?>" /><br/>
<label>Net Term: <input type="text" name="netterm" value="<?php echo $iof_term; ?>" /><br/>
<label>SalesRepNo: <input type="text" name="salesrepno" value="<?php echo $salesrepno; ?>" /><br/>
<label>Shipping/Filling Instructions: <input type="text" name="iofcomments" size="200" value="<?php echo $iofcomments; ?>" /><br/>
<label>Comments for Approver: <input type="text" name="iofcommentsforapprover" size="200" value="<?php echo $iofcommentsforapprover; ?>" /><br/>
<br>
<input type="submit" name="submit" value="submit">  
</div>
</form>  
</body>  
</html>  
