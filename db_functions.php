<?php 

function get_iof_approved_status($iof_ordno) {
  require('connect_iof.php');
  $strSQL = "SELECT ORDER_NO, STATUS from BII_IOF_APPROVED_STATUS_TAB WHERE ORDER_NO = '".iof_ordno."' ";
  $coni = new mysqli($iof_host, $iof_user, $iof_passwd, $iof_db);
  if ($coni->connect_error) {
       die("Connection failed: " . $coni->connect_error);
  }
  $result = $coni->query($strSQL);
  if ($result->num_rows > 0) { 
      return "Y";
  } else {
    return "N";
  }
}

function insert_approve_status_tab ($iof_ordno,$iof_appr_status,$iof_reject_reason) {
   require('connect_iof.php');
   $strISQL = "INSERT INTO  BII_IOF_APPROVED_STATUS_TAB(ORDER_NO,STATUS,REJECT_REASON) VALUES ";
   $strISQL .="( '".$iof_ordno."' ";
   $strISQL .=", '".$iof_appr_status."' ";
   $strISQL .=", '".$iof_reject_reason."' )";
   $coni = new mysqli($iof_host, $iof_user, $iof_passwd, $iof_db);
   if ($coni->connect_error) {
       die("Connection failed: " . $coni->connect_error);
   }
   if ($coni->query($strISQL) === TRUE) {
        $coni->close();
        return "SUCCESS";
   } else {
        $coni->close();
        return "FAILURE";
   }
}

function insert_master_tab($text_iof_ordno,$text_iof_customerno,$text_iof_salesrepno,$text_iof_deptname,$text_iof_requestedby,$text_iof_approvedby,$text_iof_ioftype,$text_iof_status,$text_iof_comments,$text_appr_comments,$text_iof_shipto,$text_iof_billto,$text_iof_billtoaddr1,$text_iof_shiptoaddr1,$text_iof_billtoaddr2,$text_iof_shiptoaddr2, $text_iof_billtoaddr3,$text_iof_shiptoaddr3,$text_iof_billtocity,$text_iof_shiptocity,$text_iof_billtostate,$text_iof_shiptostate,$text_iof_billtozip,$text_iof_shiptozip, $text_iof_billtocountry,$text_iof_shiptocountry,$text_iof_billtophone,$text_iof_shiptophone,$text_iof_billtoemail,$text_iof_shiptoemail,$text_iof_inclpartslist,$text_iof_netterm,$text_iof_track_no,$text_iof_carrier,$iof_reject_reason,$text_opt_out_emails,$text_iof_emp_total,$text_iof_freight_charge,$text_iof_webrec) {
   require('connect_iof.php');
 $strSQL = "INSERT INTO  BII_SIXPART_MASTER_TAB(ORDER_NO,CUSTOMERNO,SALESREPNO,DEPT_NAME,REQUESTED_BY,IOF_TYPE,STATUS,BILL_TO,SHIP_TO,BILL_TO_ADDRESS1,SHIP_TO_ADDRESS1,BILL_TO_ADDRESS2,SHIP_TO_ADDRESS2,BILL_TO_ADDRESS3,SHIP_TO_ADDRESS3,BILL_TO_CITY,SHIP_TO_CITY,BILL_TO_STATE,SHIP_TO_STATE,BILL_TO_ZIPCOE, SHIP_TO_ZIPCOE,BILL_TO_COUNTRY,SHIP_TO_COUNTRY,BILL_TO_PHONE,SHIP_TO_PHONE,BILL_TO_EMAIL,SHIP_TO_EMAIL,IOF_COMMENTS,IOF_COMMENTS_FOR_APPROVER,INCL_PARTS_LIST,NET_TERM,WEB_REC,CREATION_DATE) VALUES ";
   $strSQL .="( '".$text_iof_ordno."' ";
   $strSQL .=", '".$text_iof_customerno."' ";
   $strSQL .=", '".$text_iof_salesrepno."' ";
   $strSQL .=", '".$text_iof_deptname."' ";
   $strSQL .=", '".$text_iof_requestedby."' ";
   $strSQL .=", '".$text_iof_ioftype."' ";
   $strSQL .=", '".$text_iof_status."' ";
   $strSQL .=", '".$text_iof_billto."' ";
   $strSQL .=", '".$text_iof_shipto."' ";
   $strSQL .=", '".$text_iof_billtoaddr1."' ";
   $strSQL .=", '".$text_iof_shiptoaddr1."' ";
   $strSQL .=", '".$text_iof_billtoaddr2."' ";
   $strSQL .=", '".$text_iof_shiptoaddr2."' ";
   $strSQL .=", '".$text_iof_billtoaddr3."' ";
   $strSQL .=", '".$text_iof_shiptoaddr3."' ";
   $strSQL .=", '".$text_iof_billtocity."' ";
   $strSQL .=", '".$text_iof_shiptocity."' ";
   $strSQL .=", '".$text_iof_billtostate."' ";
   $strSQL .=", '".$text_iof_shiptostate."' ";
   $strSQL .=", '".$text_iof_billtozip."' ";
   $strSQL .=", '".$text_iof_shiptozip."' ";
   $strSQL .=", '".$text_iof_billtocountry."' ";
   $strSQL .=", '".$text_iof_shiptocountry."' ";
   $strSQL .=", '".$text_iof_billtophone."' ";
   $strSQL .=", '".$text_iof_shiptophone."' ";
   $strSQL .=", '".$text_iof_billtoemail."' ";
   $strSQL .=", '".$text_iof_shiptoemail."' ";
   $strSQL .=", '".$text_iof_comments."' ";
   $strSQL .=", '".$text_appr_comments."' ";
   $strSQL .=", '".$text_iof_inclpartslist."' ";
   $strSQL .=", '".$text_iof_netterm."' ";
   $strSQL .=", '".$text_iof_webrec."' ";
   $strSQL .=",curdate()) ";
   $coni = new mysqli($iof_host, $iof_user, $iof_passwd, $iof_db);
   if ($coni->connect_error) {
       die("Connection failed: " . $coni->connect_error);
   }
   if ($coni->query($strSQL) === TRUE) {
        $coni->close();
        return "SUCCESS";
   } else {
        $coni->close();
        return "FAILURE";
   }
}

function get_iof_master_details($iof_ordno) {
  require('connect_iof.php');
  $strSQL = "SELECT ORDER_NO, CUSTOMERNO, CREATION_DATE, DEPT_NAME, REQUESTED_BY, APPROVED_BY, SHIP_DATE, BILL_TO_ADDRESS1, SHIP_TO_ADDRESS1, STATUS, REJECT_REASON , IOF_TYPE,BILL_TO ,SHIP_TO,BILL_TO_ADDRESS2,IOF_TYPE,BILL_TO ,SHIP_TO,BILL_TO_ADDRESS2,SHIP_TO_ADDRESS2,BILL_TO_ADDRESS3,SHIP_TO_ADDRESS3,BILL_TO_CITY, SHIP_TO_CITY ,BILL_TO_STATE ,SHIP_TO_STATE,BILL_TO_ZIPCOE, SHIP_TO_ZIPCOE,BILL_TO_COUNTRY,SHIP_TO_COUNTRY,BILL_TO_PHONE,SHIP_TO_PHONE,BILL_TO_EMAIL,SHIP_TO_EMAIL,IOF_COMMENTS,IOF_TRACK_NO,IOF_CARRIER,IOF_COMMENTS_FOR_APPROVER,INCL_PARTS_LIST,OPT_OUT_EMAILS,IOF_EMP_TOTAL,APPR_DATE,FILL_DATE,NET_TERM from BII_SIXPART_MASTER_TAB WHERE ORDER_NO = '".$iof_ordno."' ";
  $coni = new mysqli($iof_host, $iof_user, $iof_passwd, $iof_db);
  if ($coni->connect_error) {
       die("Connection failed: " . $coni->connect_error);
  }
  $result = $coni->query($strSQL);
  if ($result->num_rows > 0) {
      return $result;
  } else {
      return " ";
  }
}

function get_iof_master_details_by_reqby($reqby) {
  require('connect_iof.php');
  $strSQL = "SELECT ORDER_NO, CUSTOMERNO, CREATION_DATE, DEPT_NAME, REQUESTED_BY, APPROVED_BY, SHIP_DATE, BILL_TO_ADDRESS1, SHIP_TO_ADDRESS1, STATUS, REJECT_REASON , IOF_TYPE,BILL_TO ,SHIP_TO,BILL_TO_ADDRESS2,IOF_TYPE,BILL_TO ,SHIP_TO,BILL_TO_ADDRESS2,SHIP_TO_ADDRESS2,BILL_TO_ADDRESS3,SHIP_TO_ADDRESS3,BILL_TO_CITY, SHIP_TO_CITY ,BILL_TO_STATE ,SHIP_TO_STATE,BILL_TO_ZIPCOE, SHIP_TO_ZIPCOE,BILL_TO_COUNTRY,SHIP_TO_COUNTRY,BILL_TO_PHONE,SHIP_TO_PHONE,BILL_TO_EMAIL,SHIP_TO_EMAIL,IOF_COMMENTS,IOF_TRACK_NO,IOF_CARRIER,IOF_COMMENTS_FOR_APPROVER,INCL_PARTS_LIST,OPT_OUT_EMAILS,IOF_EMP_TOTAL,APPR_DATE,FILL_DATE,NET_TERM from BII_SIXPART_MASTER_TAB WHERE REQUESTED_BY = '".$reqby."' AND STATUS IN ('SHIPPED','CANCELLED')";
  $coni = new mysqli($iof_host, $iof_user, $iof_passwd, $iof_db);
  if ($coni->connect_error) {
       die("Connection failed: " . $coni->connect_error);
  }
  $result = $coni->query($strSQL);
  if ($result->num_rows > 0) {
      return $result;
  } else {
      return " ";
  }
}

function get_iof_master_details_by_req($iof_reqby) {
  require('connect_iof.php');
  $strSQL = "SELECT ORDER_NO, CUSTOMERNO, CREATION_DATE, DEPT_NAME, REQUESTED_BY, APPROVED_BY, SHIP_DATE, BILL_TO_ADDRESS1, SHIP_TO_ADDRESS1, STATUS, REJECT_REASON , IOF_TYPE,BILL_TO ,SHIP_TO,BILL_TO_ADDRESS2,IOF_TYPE,BILL_TO ,SHIP_TO,BILL_TO_ADDRESS2,SHIP_TO_ADDRESS2,BILL_TO_ADDRESS3,SHIP_TO_ADDRESS3,BILL_TO_CITY, SHIP_TO_CITY ,BILL_TO_STATE ,SHIP_TO_STATE,BILL_TO_ZIPCOE, SHIP_TO_ZIPCOE,BILL_TO_COUNTRY,SHIP_TO_COUNTRY,BILL_TO_PHONE,SHIP_TO_PHONE,BILL_TO_EMAIL,SHIP_TO_EMAIL,IOF_COMMENTS,IOF_TRACK_NO,IOF_CARRIER,IOF_COMMENTS_FOR_APPROVER,INCL_PARTS_LIST,OPT_OUT_EMAILS,IOF_EMP_TOTAL,APPR_DATE,FILL_DATE,NET_TERM from BII_SIXPART_MASTER_TAB WHERE STATUS NOT IN('SHIPPED','CANCELLED') AND REQUESTED_BY = '".$iof_reqby."' ORDER BY ORDER_NO";
  $coni = new mysqli($iof_host, $iof_user, $iof_passwd, $iof_db);
  if ($coni->connect_error) {
       die("Connection failed: " . $coni->connect_error);
  }
  $result = $coni->query($strSQL);
  if ($result->num_rows > 0) {
      return $result;
  } else {
    return " ";
  }
}

function get_search_items($search_condition1, $search_condition2) {
 require('connect_iof.php');
 if ($search_condition2 <> '' ) {
   $strSQL = "SELECT SEGMENT1, DESCRIPTION, IFNULL(QTY,0) QTY, QTY_AVL from BII_SIXPART_ITEMS_DET_V where SEGMENT1 like '%".strtoupper($search_condition2)."%' order by segment1";
 } else {
   $strSQL = "SELECT SEGMENT1, DESCRIPTION, IFNULL(QTY,0) QTY, QTY_AVL from BII_SIXPART_ITEMS_DET_V where upper(DESCRIPTION) like '%".strtoupper($search_condition1)."%' order by segment1";
 }
 $coni = new mysqli($iof_host, $iof_user, $iof_passwd, $iof_db);
 if ($coni->connect_error) {
     die("Connection failed: " . $coni->connect_error);
 }
 $result = $coni->query($strSQL);
 if ($result->num_rows > 0) {
    return $result;
 } else {
    return " ";
 }
} 

function delete_sixpart_detail($order_no,$item_name,$item_desc) {
 require('connect_iof.php');
 $strDSQL = "DELETE FROM BII_SIXPART_DETAIL_TAB where ORDER_NO = '".$order_no."' and ITEM_NO = '".$item_name."' and ITEM_DESCRIPTION = '".$item_desc."' ";
 $coni = new mysqli($iof_host, $iof_user, $iof_passwd, $iof_db);
 if ($coni->connect_error) {
       die("Connection failed: " . $coni->connect_error);
 }
 if ($coni->query($strISQL) === TRUE) {
        $coni->close();
        return "SUCCESS";
 } else {
        $coni->close();
        return "FAILURE";
 }
}

function validate_iof_type($iof_type) {
 require('connect_iof.php');
 $strSQL = "SELECT SEGMENT1 FROM BII_MTL_GENERIC_DISPOSITIONS WHERE UPPER(segment1) LIKE '%".strtoupper($iof_type)."%'";
 $coni = new mysqli($iof_host, $iof_user, $iof_passwd, $iof_db);
  if ($coni->connect_error) {
       die("Connection failed: " . $coni->connect_error);
  }
  $result = $coni->query($strSQL);
  if ($result->num_rows > 0) {
      return $result;
  } else {
    return "N";
  }

}
function update_sixpart_master($orderno,$billto,$shipto,$customerno,$salesrepno,$requestedby,$deptname,$ioftype,$billtoaddr1,$shiptoaddr1,$billtoaddr2,$shiptoaddr2,$billtoaddr3,$shiptoaddr3,$billtocity,$shiptocity,$billtostate,$shiptostate,$billtozip,$shiptozip,$billtocountry,$shiptocountry,$billtophone,$shiptophone,$billtemail,$shiptoemail,$iofcomments,$iofapprcomments) {

require('connect_iof.php');

$text_iof_comments=str_replace("'","''",$iofcomments);
$text_appr_comments=str_replace("'","''",$iofapprcomments);
$mod_billtostr = str_replace("'", "''",$billto);
$mod_shiptostr = str_replace("'", "''",$shipto);

$strSQL= "UPDATE BII_SIXPART_MASTER_TAB SET CUSTOMERNO = '".$customerno."',SALESREPNO = '".$salesrepno."' ";
 if ( $requestedby <> '0' ) {
   $strSQL .=",REQUESTED_BY= '".$requestedby."' ";
 }
 if ( $deptname <> '0' ) {
   $strSQL .=",DEPT_NAME = '".$deptname."' ";
 }
 if ( $ioftype <> '0' ) {
   $strSQL .=",IOF_TYPE = '".$ioftype."' ";
 }
$strSQL .=",BILL_TO = '".$mod_billtostr."' ";
$strSQL .=",SHIP_TO = '".$mod_shiptostr."' ";
$strSQL .=",BILL_TO_ADDRESS1 = '".$billtoaddr1."' ";
$strSQL .=",SHIP_TO_ADDRESS1 = '".$shiptoaddr1."' ";
$strSQL .=",BILL_TO_ADDRESS2 = '".$billtoaddr2."' ";
$strSQL .=",SHIP_TO_ADDRESS2 = '".$shiptoaddr2."' ";
$strSQL .=",BILL_TO_ADDRESS3 = '".$billtoaddr3."' ";
$strSQL .=",SHIP_TO_ADDRESS3 = '".$shiptoaddr3."' ";
$strSQL .=",BILL_TO_CITY = '".$billtocity."' ";
$strSQL .=",SHIP_TO_CITY = '".$shiptocity."' ";
$strSQL .=",BILL_TO_STATE = '".$billtostate."' ";
$strSQL .=",SHIP_TO_STATE = '".$shiptostate."' ";
$strSQL .=",BILL_TO_ZIPCOE = '".$billtozip."' ";
$strSQL .=",SHIP_TO_ZIPCOE = '".$shiptozip."' ";
$strSQL .=",BILL_TO_COUNTRY = '".$billtocountry."' ";
$strSQL .=",SHIP_TO_COUNTRY = '".$shiptocountry."' ";
$strSQL .=",BILL_TO_PHONE = '".$billtophone."' ";
$strSQL .=",SHIP_TO_PHONE = '".$shiptophone."' ";
$strSQL .=",BILL_TO_EMAIL = '".$billtemail."' ";
$strSQL .=",SHIP_TO_EMAIL = '".$shiptoemail."' ";
$strSQL .=",IOF_COMMENTS = '".$text_iof_comments."' ";
$strSQL .=",IOF_COMMENTS_FOR_APPROVER = '".$text_appr_comments."' ";
$strSQL .="  WHERE ORDER_NO = '".$orderno."' ";
echo $$strSQL;
$coni = new mysqli($iof_host, $iof_user, $iof_passwd, $iof_db);

 if ($coni->connect_error) {
       die("Connection failed: " . $coni->connect_error);
 }
 if ($coni->query($strSQL) === TRUE) {
        $coni->close();
        return "SUCCESS";
 } else {
        $coni->close();
        return "FAILURE";
 }
}

function update_sixpart_detail($itemqty,$itemprice,$ioffillfrom,$iof_item_type,$order_no,$item_name,$text_desc) {
 require('connect_iof.php');
 $price = str_replace($itemprice,'','0');
 $strUSQL = "UPDATE BII_SIXPART_DETAIL_TAB SET ITEM_QUANTITY = '".(int)$itemqty."' , UNIT_PRICE = '".$price."' , FILL_FROM = '".$ioffillfrom."' ,ITEM_IOF_TYPE = '".$iof_item_type."' where ORDER_NO = '".$order_no."' and ITEM_NO = '".$item_name."' and ITEM_DESCRIPTION = '".$text_desc."' ";
 $coni = new mysqli($iof_host, $iof_user, $iof_passwd, $iof_db);
 if ($coni->connect_error) {
       die("Connection failed: " . $coni->connect_error);
 }
 if ($coni->query($strUSQL) === TRUE) {
        $coni->close();
        return "SUCCESS";
 } else {
        $coni->close();
        return "FAILURE";
 }
}

function update_sixpart_master_status($order_no,$iof_status) {
 require('connect_iof.php');
 $strUSQL = "UPDATE BII_SIXPART_MASTER_TAB SET STATUS = '".$iof_status."' WHERE ORDER_NO = '".$order_no."' ";
 $coni = new mysqli($iof_host, $iof_user, $iof_passwd, $iof_db);
 if ($coni->connect_error) {
       die("Connection failed: " . $coni->connect_error);
 }
 if ($coni->query($strUSQL) === TRUE) {
        $coni->close();
        return "SUCCESS";
 } else {
        $coni->close();
        return "FAILURE";
 }
}

function insert_sixpart_detail($order_no,$item_name,$text_desc,$iof_fill_from,$item_qty,$item_price,$iof_item_type) {
 require('connect_iof.php');
 $strISQL = "INSERT INTO  BII_SIXPART_DETAIL_TAB(ORDER_NO,ITEM_NO,ITEM_DESCRIPTION,FILL_FROM,ITEM_QUANTITY,UNIT_PRICE,ITEM_IOF_TYPE) VALUES ";
               $strISQL .="( '".$order_no."' ";
               $strISQL .=", '".$item_name."' ";
               $strISQL .=", '".$text_desc."' ";
               $strISQL .=", '".$iof_fill_from."' ";
               $strISQL .=", '".(int)$item_qty."' ";
               $strISQL .=", '".$item_price."' ";
               $strISQL .=", '".$iof_item_type."' ";
               $strISQL .=") ";
 $coni = new mysqli($iof_host, $iof_user, $iof_passwd, $iof_db);
 if ($coni->connect_error) {
       die("Connection failed: " . $coni->connect_error);
 }
 if ($coni->query($strISQL) === TRUE) {
        $coni->close();
        return "SUCCESS";
 } else {
        echo $strISQL;
        $coni->close();
        return "FAILURE";
 }
}

function get_iof_detail_details($order_no) {
 require('connect_iof.php');
 $strSQL = "SELECT ORDER_NO,ITEM_NO SEGMENT1, ITEM_DESCRIPTION DESCRIPTION,  FILL_FROM,UNIT_PRICE,ITEM_QUANTITY QTY,ITEM_IOF_TYPE from BII_SIXPART_DETAIL_TAB  where order_no = '".$order_no."' order by segment1";
 $coni = new mysqli($iof_host, $iof_user, $iof_passwd, $iof_db);
 if ($coni->connect_error) {
       die("Connection failed: " . $coni->connect_error);
 }
 $result = $coni->query($strSQL);
 if ($result->num_rows > 0) {
      return $result;
 } else {
    return " ";
 }
}

function check_iof_detail($order_no,$item_name,$item_desc) {
 require('connect_iof.php');
 $strSQL = "SELECT ORDER_NO, ITEM_NO, ITEM_DESCRIPTION ITEM_IOF_TYPE from BII_SIXPART_DETAIL_TAB  where order_no = '".$order_no."' and ITEM_NO = '".$item_name."' and ITEM_DESCRIPTION = '".$item_desc."' order by ITEM_NO";
 $coni = new mysqli($iof_host, $iof_user, $iof_passwd, $iof_db);
 if ($coni->connect_error) {
       die("Connection failed: " . $coni->connect_error);
 }
 $result = $coni->query($strSQL);
 if ($result->num_rows > 0) {
      return $result;
 } else {
    return "NR";
 }
}

function get_iof_address_data($shipto,$shiptoaddr1,$shiptozip) {
require('connect_iof.php');
$strASQL = "SELECT DISTINCT IFNULL(SHIP_TO,BILL_TO) SHIP_TO ,IFNULL(SHIP_TO_ADDRESS1,BILL_TO_ADDRESS1) SHIP_TO_ADDRESS1,IFNULL(SHIP_TO_ADDRESS2,BILL_TO_ADDRESS2) SHIP_TO_ADDRESS2,IFNULL(SHIP_TO_ADDRESS3,BILL_TO_ADDRESS3) SHIP_TO_ADDRESS3,IFNULL(SHIP_TO_CITY,BILL_TO_CITY) SHIP_TO_CITY,IFNULL(SHIP_TO_STATE,BILL_TO_STATE) SHIP_TO_STATE,IFNULL(SHIP_TO_ZIPCOE,BILL_TO_ZIPCOE) SHIP_TO_ZIPCOE,IFNULL(SHIP_TO_COUNTRY,BILL_TO_COUNTRY) SHIP_TO_COUNTRY,IFNULL(SHIP_TO_PHONE,BILL_TO_PHONE) SHIP_TO_PHONE,IFNULL(SHIP_TO_EMAIL,BILL_TO_EMAIL) SHIP_TO_EMAIL from BII_SIXPART_MASTER_TAB WHERE IFNULL(SHIP_TO,'NOREC') != 'NOREC' ";
if ($shipto <> '' ) {
   $strASQL = $strASQL . " and upper(ship_to) like '%".strtoupper($shipto)."%'";
}
if ($shiptoaddr1 <> '' ) {
   $strASQL = $strASQL . " and upper(ship_to_address1) like '%".strtoupper($ship_to_address1)."%'";
}
if ($shiptozip <> '' ) {
   $strASQL = $strASQL . " and upper(SHIP_TO_ZIPCOE) like '%".strtoupper($shiptozip)."%'";
}
$strASQL = $strASQL . " order by ship_to";

 $coni = new mysqli($iof_host, $iof_user, $iof_passwd, $iof_db);
 if ($coni->connect_error) {
       die("Connection failed: " . $coni->connect_error);
 }
 $result = $coni->query($strASQL);
 if ($result->num_rows > 0) {
      return $result;
 } else {
    echo $strASQL;
    return "NR";
 }
}
?>
