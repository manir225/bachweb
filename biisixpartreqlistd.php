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
require_once('connect_oracle.php');
$conn = OCILogon($oracle_user,$oracle_pass,$db);
$strCSQL = "SELECT REQUESTED_BY,APPROVED_BY,STATUS from BII_SIXPART_MASTER_TAB WHERE ORDER_NO = '".$_GET["OrderNo"]."' AND NVL(STATUS,'OPEN') NOT IN ('OPEN','CANCELLED') ";
$stid = oci_parse($conn, $strCSQL);
oci_execute($stid,OCI_DEFAULT);
while($rowc = oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS))
{
 $rec_exists = 'Y';
 $reqby = $rowc["REQUESTED_BY"];
 $apprby = $rowc["APPROVED_BY"];
 $io_status =  $rowc["STATUS"];
}
if ($rec_exists == 'Y' ) {
$to = 'greenc@bachmanntrains.com,cromwellr@bachmanntrains.com,adairt@bachmanntrains.com,nairm@bachmanntrains.com';
//$to = 'nairm@bachmanntrains.com';
$subject = "IOF ".$_GET["OrderNo"]." has been cancelled  after the IOF is ".$io_status. ", if necessary please check and correct inventory. ";
$message = "IOF ".$_GET["OrderNo"]." has been cancelled  after the IOF is ".$io_status. ", if necessary please check and correct inventory. ";
 $headers = 'From: '.$reqby . "\r\n" .
 'CC: '.$reqby . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'MIME-Version: 1.0'. "\r\n" .
    'Content-Type: text/html; charset=ISO-8859-1'. "\r\n" ;
mail($to, $subject, $message, $headers);
}
$strSQL = "UPDATE BII_SIXPART_MASTER_TAB set STATUS = 'CANCELLED' WHERE ORDER_NO = '".$_GET["OrderNo"]."' ";
$objParse = oci_parse($conn, $strSQL);
$objExecute = oci_execute($objParse, OCI_DEFAULT);
if($objExecute) {
   oci_commit($conn); //*** Commit Transaction ***//
}
$strSQL1 = "SELECT ORDER_NO, CUSTOMERNO, REQUESTED_BY, DEPT_NAME,IOF_TYPE,BILL_TO,SHIP_TO,STATUS from BII_SIXPART_MASTER_TAB WHERE NVL(STATUS,'OPEN') NOT IN('SHIPPED','CANCELLED') AND REQUESTED_BY = '".$_GET["Requestedby"]."' ";
$stid = oci_parse($conn, $strSQL1);
oci_execute($stid,OCI_DEFAULT);
?>
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
while($row1 = oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS))
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
</body>  
</html> 
