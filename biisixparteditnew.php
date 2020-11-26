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
$iofno=date('Ymd', strtotime("now")).rand(1,999);
$customerno="INTERNAL";
$requestedby=$_GET["RequestedBy"];
$salesrepno="";
$deptname=$_GET["DeptName"];
$ioftype=$_GET["IofType"];
$billto=$_GET["ShipTo"];
$shipto=$_GET["ShipTo"];
$billtoaddr1=$_GET["ShipToAddr1"];
$billtoaddr2=$_GET["ShipToAddr2"];
$billtoaddr3=$_GET["ShipToAddr3"];
$billtocity=$_GET["ShipToCity"];
$billtostate=$_GET["ShipToState"];
$billtozip=$_GET["ShipToZip"];
$billtocountry=$_GET["ShipToCountry"];
$billtophone=$_GET["ShipToPhone"];
$billtoemail=$_GET["ShipToEmail"];
$shiptoaddr1=$_GET["ShipToAddr1"];
$shiptoaddr2=$_GET["ShipToAddr2"];
$shiptoaddr3=$_GET["ShipToAddr3"];
$shiptocity=$_GET["ShipToCity"];
$shiptostate=$_GET["ShipToState"];
$shiptozip=$_GET["ShipToZip"];
$shiptocountry=$_GET["ShipToCountry"];
$shiptophone=$_GET["ShipToPhone"];
$shiptoemail=$_GET["ShipToEmail"];
$iofcomments="";
$iofcommentsforapprover="";
$iof_term = "";
$emp_names = array("Terry Adair","Trevor Arnold","Doug Blane","Ray Buteux","Kimberly Gray","Larry Harrington","Laura Harris","Richard Janyszek","Judith Martin","David Melville","Debra Schiff","Helena Chandler-Stadler","Heather Stoltzfus","Mike Tonkinson","Philip Varughese","Carol Wagner","Ed Winter","Manjunath Nair");
$email_ids = array("AdairT@bachmanntrains.com","ArnoldT@bachmanntrains.com","BlaineD@bachmanntrains.com","buteuxr@bachmanntrains.com","grayk@bachmanntrains.com","HarringtonL@bachmanntrains.com","harrisl@bachmanntrains.com","JanyszekR@bachmanntrains.com","martinj@bachmanntrains.com","MelvilleD@bachmanntrains.com","SchiffD@bachmanntrains.com","stadlerh@bachmanntrains.com","stoltzfush@bachmanntrains.com","TonkinsonM@bachmanntrains.com","varughesep@bachmanntrains.com","WagnerC@bachmanntrains.com","WinterE@bachmanntrains.com","nairm@bachmanntrains.com");
?>
<form  action="biiinssixparts.php?OrderNo=<?=$_GET["orderno"];?>&CustNo=<?=$_GET["customerno"];?>&SalesrepNo=<?=$_GET["salesrepno"];?>&DeptName=<?=$_GET["deptname"];?>&RequestedBy=<?=$_GET["requestedby"];?>&ioftype=<?=$_GET["ioftype"];?>&BillTo=<?=$_GET["billto"];?>&BillToAddr1=<?=$_GET["billtoaddr1"];?>&BillToAddr2=<?=$_GET["billtoaddr2"];?>&BillToAddr3=<?=$_GET["billtoaddr3"];?>&BillToCity=<?=$_GET["billtocity"];?>&BillToState=<?=$_GET["billtostate"];?>&BillToZip=<?=$_GET["billtozip"];?>&BillToCountry=<?=$_GET["billtocountry"];?>&BillToPhone=<?=$_GET["billtophone"];?>&BillToEmail=<?=$_GET["billtoemail"];?>&ShipTo=<?=$_GET["shipto"];?>&ShipToAddr1=<?=$_GET["shiptoaddr1"];?>&ShipToAddr2=<?=$_GET["shiptoaddr2"];?>&ShipToAddr3=<?=$_GET["shiptoaddr3"];?>&ShipToCity=<?=$_GET["shiptocity"];?>&ShipToState=<?=$_GET["shiptostate"];?>&ShipToZip=<?=$_GET["shiptozip"];?>&ShipToCountry=<?=$_GET["shiptocountry"];?>&ShipToPhone=<?=$_GET["shiptophone"];?>&ShipToEmail=<?=$_GET["shiptoemail"];?>&ShipDate=<?=$_GET["shipdate"];?>&IOFComments=<?=$_GET["iofcomments"];?>&IOFCommentsForAppr=<?=$_GET["iofcommentsforapprover"];?>&SearchCondition=<?=$_GET["searchcondition"];?>"  name="frmEdit" method="post" onSubmit="return validateForm(this)">  
<div>
Please select a department:
<select id="deptname" name="deptname">
  <option value="0">--Select a Department--</option>
  <option value="DESIGN">Design Department</option>
  <option value="FINANCE">Finance Department</option>
  <option value="IT">IT Department</option>
  <option value="MARKETING">Marketing Department</option>
  <option value="PRODUCT">Product Department</option>
  <option value="SALES">Sales Department</option>
  <option value="SERVICE">Service Department</option>
  <option value="SHIPPING">Shipping Department</option>
</select>
Please choose your Name:  <select id="requestedby" name="requestedby">
  <option value="0">--Select an Employee--</option>
  <option value="AdairT@bachmanntrains.com">Terry Adair</option>
  <option value="ArnoldT@bachmanntrains.com">Trevor Arnold</option>
  <option value="BlaineD@bachmanntrains.com">Doug Blane</option>
  <option value="buteuxr@bachmanntrains.com">Ray Buteux</option>
  <option value="grayk@bachmanntrains.com">Kimberly Gray</option>
  <option value="HarringtonL@bachmanntrains.com">Larry Harrington</option>
  <option value="harrisl@bachmanntrains.com">Laura Harris</option>
  <option value="JanyszekR@bachmanntrains.com">Richard Janyszek</option>
  <option value="lynchj@bachmanntrains.com">Jack Lynch</option>
  <option value="martinj@bachmanntrains.com">Judith Martin</option>
  <option value="MelvilleD@bachmanntrains.com">David Melville</option>
  <option value="SchiffD@bachmanntrains.com">Debra Schiff</option>
  <option value="stadlerh@bachmanntrains.com">Helena Chandler-Stadler</option>
  <option value="stoltzfush@bachmanntrains.com">Heather Stoltzfus</option>
  <option value="TonkinsonM@bachmanntrains.com">Mike Tonkinson</option>
  <option value="varughesep@bachmanntrains.com">Philip Varughese</option>
  <option value="WagnerC@bachmanntrains.com">Carol Wagner</option>
  <option value="WinterE@bachmanntrains.com">Ed Winter</option>
  <option value="nairm@bachmanntrains.com">Manjunath Nair</option>
</select>
Please choose an  IOF Type:   
<select id="ioftype" name="ioftype">
  <option value="0">--Select the IOF Type--</option>
  <option value="IOF Bill">IOF Bill</option>
  <option value="IOF Courtesy">IOF Courtesy</option>
  <option value="IOF Donation (Sales)">IOF Donation (Sales)</option>
  <option value="IOF Donation (G AND A)">IOF Donation (G AND A)</option>
  <option value="IOF Employee Sale">IOF Employee Sale</option>
  <option value="IOF Photography">IOF Photography</option>
  <option value="IOF Prod Review">IOF Product Review</option>
  <option value="IOF Prod Testing">IOF Product Testing</option>
  <option value="IOF Promotion">IOF Promotion</option>
  <option value="IOF R & D">IOF R & D</option>
  <option value="IOF Replacement">IOF Replacement</option>
  <option value="IOF Sample">IOF Sample</option>
  <option value="IOF Shortage">IOF Shortage</option>
  <option value="IOF Trade Show">IOF Trade Show</option>
  <option value="IOF Borrow">IOF Borrow</option>
  <option value="IOF Catalog">IOF Catalog</option>
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
<label>Message: <input type="text" id="errormessage" name="errormessage" size="90" style="border: none; font-weight: bold; color:red; background-color:lightblue;" readonly/>
<br>
<input type="submit" name="submit" value="submit">  
</div>
</form>  
<script src="biiiofmain.js"></script>
</body>  
</html>  
