<html>
<head>
<title>IOF Address List</title>
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
$myresult = get_iof_address_data($_POST["searchcondition"],$_POST["searchcondition2"],$_POST["searchcondition3"]);
?>
<form  action="biiiofaddrlist.php?SearchCondition=<?=$_GET["searchcondition"];?>&SearchCondition2=<?=$_GET["searchcondition2"];?>"  name="frmEdit" method="post">
<label>Search by Ship To: <input type="text" name="searchcondition" value="<?php echo $searchcondition; ?>" />
<br/>
<label>Search by Address Line1: <input type="text" name="searchcondition2" size="100" value="<?php echo $searchcondition2; ?>" />
<br/>
<label>Search by Postal Code: <input type="text" name="searchcondition3" size="50" value="<?php echo $searchcondition3; ?>" />
<br/>
<br>
<input type="submit" name="submit" value="SearchForAddr">
<br>
<br>
<table id="t03" width="150%" border="1">
<tr>
<th width="30"> <div align="center">ShipTo  </div></th>
<th width="30"> <div align="center">Address1  </div></th>
<th width="25"> <div align="center">Address2  </div></th>
<th width="5"> <div align="center">City  </div></th>
<th width="5"> <div align="center">State  </div></th>
<th width="5"> <div align="center">Zipcode  </div></th>
</tr>
<?php
while($row1 = $myresult->fetch_assoc())
{
?>
<tr>
<td width="20%"><?=$row1["SHIP_TO"];?></td>
<td width="30%"><?=$row1["SHIP_TO_ADDRESS1"];?></td>
<td width="25%"><?=$row1["SHIP_TO_ADDRESS2"];?></td>
<td width="10%"><?=$row1["SHIP_TO_CITY"];?></td>
<td width="10%"><?=$row1["SHIP_TO_STATE"];?></td>
<td width="10%"><?=$row1["SHIP_TO_ZIPCOE"];?></td>
<td width="10%" align="center"><a  href="biisixparteditnew.php?ShipTo=<?=$row1["SHIP_TO"];?>&ShipToAddr1=<?=$row1["SHIP_TO_ADDRESS1"];?>&ShipToAddr2=<?=$row1["SHIP_TO_ADDRESS2"];?>&ShipToAddr3=<?=$row1["SHIP_TO_ADDRESS3"];?>&ShipToCity=<?=$row1["SHIP_TO_CITY"];?>&ShipToState=<?=$row1["SHIP_TO_STATE"];?>&ShipToZip=<?=$row1["SHIP_TO_ZIPCOE"];?>&ShipToCountry=<?=$row1["SHIP_TO_COUNTRY"];?>&ShipToPhone=<?=$row1["SHIP_TO_PHONE"];?>&ShipToEmail=<?=$row1["SHIP_TO_EMAIL"];?>&RequestedBy=<?=$_POST["reqby"];?>&DeptName=<?=$row1["DEPT_NAME"];?>&IofType=<?=$row1["IOF_TYPE"];?>">NewIOF</a></td>
</tr>
<?php
}
?>
</table>
</form>
</body>
</html>
