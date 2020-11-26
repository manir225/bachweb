<html>  
<head>  
<title>IOF Main</title>  
<link type="text/css" rel="stylesheet" href="iofmainstyle.css">
</head>  
<body>  
<?php
$iofno = date('Ymd', strtotime("now")).rand(1,999);
$inclpartslist = 'NO';
$customerno = 'INTERNAL';
require_once('bt_array.php')
?>
<form  action="biiinssixparts.php?OrderNo=<?=$_GET["orderno"];?>&InclPartsList=<?=$_GET["inclpartslist"];?>&CustNo=<?=$_GET["customerno"];?>&SalesrepNo=<?=$_GET["salesrepno"];?>&DeptName=<?=$_GET["deptname"];?>&RequestedBy=<?=$_GET["requestedby"];?>&ioftype=<?=$_GET["ioftype"];?>&BillTo=<?=$_GET["billto"];?>&BillToAddr1=<?=$_GET["billtoaddr1"];?>&BillToAddr2=<?=$_GET["billtoaddr2"];?>&BillToAddr3=<?=$_GET["billtoaddr3"];?>&BillToCity=<?=$_GET["billtocity"];?>&BillToState=<?=$_GET["billtostate"];?>&BillToZip=<?=$_GET["billtozip"];?>&BillToCountry=<?=$_GET["billtocountry"];?>&BillToPhone=<?=$_GET["billtophone"];?>&BillToEmail=<?=$_GET["billtoemail"];?>&ShipTo=<?=$_GET["shipto"];?>&ShipToAddr1=<?=$_GET["shiptoaddr1"];?>&ShipToAddr2=<?=$_GET["shiptoaddr2"];?>&ShipToAddr3=<?=$_GET["shiptoaddr3"];?>&ShipToCity=<?=$_GET["shiptocity"];?>&ShipToState=<?=$_GET["shiptostate"];?>&ShipToZip=<?=$_GET["shiptozip"];?>&ShipToCountry=<?=$_GET["shiptocountry"];?>&ShipToPhone=<?=$_GET["shiptophone"];?>&ShipToEmail=<?=$_GET["shiptoemail"];?>&ShipDate=<?=$_GET["shipdate"];?>&IOFComments=<?=$_GET["iofcomments"];?>&IOFCommentsForAppr=<?=$_GET["iofcommentsforapprover"];?>"  name="frmEdit" method="post" onSubmit="return validateForm(this)">  
<div>
<img src = "bachmann_button.png" width="60" height="60" />          Please choose your Department: <select id="deptname" name="deptname">
<?php
  for ($i=0; $i<=sizeof($depts); $i++) {
         echo "<option value='$depts[$i]'>$deptnames[$i]</option>";
  }
?>
</select>
Please choose your Name:  <select id="requestedby" name="requestedby">
<?php
  for ($i=0; $i<=sizeof($email_ids); $i++) {
        echo "<option value='$email_ids[$i]'>$emp_names[$i]</option>";
  }
?>
</select>
Please choose the IOF Type:   <select id="ioftype" name="ioftype">
<?php
  for ($i=0; $i<=sizeof($IOF_TYPES); $i++) {
       echo "<option value='$IOF_TYPES[$i]'>$IOF_TYPES[$i]</option>";
  }
?>
</select>
<input type="hidden" name="orderno" value="<?php echo $iofno; ?>" />
<input type="hidden" name="inclpartslist" value="<?php echo $inclpartslist; ?>" />
<input type="hidden" name="salesrepno" value="<?php echo $salesrepno; ?>" />
<input type="hidden" name="shipdate" value="<?php echo date('Y-m-d'); ?>" />
</div>
<h3> Bill To Details </h3>
<table width="800">
<tr><th></th><tr>
<th>Bill To</th>
<th>Address Line1</th>
</tr>
<tr>
<td><input type="text" name="billto" id= "billto" maxlength="50" size="50" value="<?php echo $billto; ?>"></td>
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
<td><input type="text" name="billtoaddr3" maxlength="80" size="80" value="<?php echo $billtoaddr3; ?>"></td>
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
<td><input type="text" name="billtocity" maxlength="50" size="30" value="<?php echo $billtocity; ?>"></td>
<td><input type="text" name="billtostate" maxlength="20" size="5" value="<?php echo $billtostate; ?>"></td>
<td><input type="text" name="billtozip" size="15" value="<?php echo $billtozip; ?>"></td>
<td><input type="text" name="billtocountry" size="10" value="<?php echo $billtocountry; ?>"></td>
<td><input type="text" name="billtophone" maxlength="30" size="20" value="<?php echo $billtophone; ?>"></td>
<td><input type="text" name="billtoemail" size="45" value="<?php echo $billtoemail; ?>"></td>
</tr>
</table>
<h3> Ship To Details </h3>
<input type = 'checkbox' name="billingtoo" id="billingtoo"> Copy Bill To
<script type="text/javascript">
document.getElementById('billingtoo').onclick = function(){
 FillBilling(this.form);
};
</script>
<table width="800">
<tr><th></th><tr>
<th>Ship To</th>
<th>Address Line1</th>
</tr>
<tr>
<td><input type="text" name="shipto" id = "shipto" maxlength="50" size="50" value="<?php echo $shipto; ?>"></td>
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
<td><input type="text" name="shiptoaddr3" maxlength="80" size="80" value="<?php echo $shiptoaddr3; ?>"></td>
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
<td><input type="text" name="shiptocity" maxlength="50" size="30" value="<?php echo $shiptocity; ?>"></td>
<td><input type="text" name="shiptostate" maxlength="20" size="5" value="<?php echo $shiptostate; ?>"></td>
<td><input type="text" name="shiptozip" size="15" value="<?php echo $shiptozip; ?>"></td>
<td><input type="text" name="shiptocountry" size="10" value="<?php echo $shiptocountry; ?>"></td>
<td><input type="text" name="shiptophone" maxlength="30" size="20" value="<?php echo $shiptophone; ?>"></td>
<td><input type="text" name="shiptoemail" size="45" value="<?php echo $shiptoemail; ?>"></td>
</tr>
</table>
<h3> Other Information </h3>
<label>CustomerNO: <input type="text" id="customerno" name="customerno" value="<?php echo $customerno; ?>" />
<label>Net Term: <input type="text" id="netterm" name="netterm" value="<?php echo $netterm; ?>" />
<br/>
<label>Shipping/Filling Instructions: <input type="text" id="iofcomments" name="iofcomments" maxlength="200" size="200" value="<?php echo $iofcomments; ?>" />
<br/>
<label>Comments for Approver: <input type="text" name="iofcommentsforapprover" maxlength="200" size="200" value="<?php echo $iofcommentsforapprover; ?>" />
<br/>
<label>Message: <input type="text" id="errormessage" name="errormessage" size="90" style="border: none; font-weight: bold; color:red; background-color:lightblue;" readonly/>
<br/>
<input class="btn btn-sub" type="submit" name="submit" value="Add Products">  
</form>  
<script src="biiiofmain.js"></script>
</body>  
</html>  
