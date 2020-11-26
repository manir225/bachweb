<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="biiiofmainstyles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <title>IOF Main</title>
<style>
body {
    background-color: lightblue;
}
</style>
</head>
<body>

<div id='cssmenu'>
<ul>
   <li class='active'><a href='biisixpartsmain.php'><span>Home</span></a></li>
   <li><a href='biisixpartsnew.php'><span>CreateIOF</span></a></li>
   <li><a href='biiiofaddrlist.php'><span>SearchAddress</span></a></li>
</ul>
</div>
<?php
require_once('bt_array.php')
?>
<form  action="biisixpartreqlists.php?RequestedBy=<?=$_GET["requestedby"];?>"  name="frmEdit" method="post" onSubmit="return validateForm(this)">
<br>
Please choose your Name:  <select id="requestedby" name="requestedby">
<?php
  for ($i=0; $i<=sizeof($email_ids); $i++) {
        echo "<option value='$email_ids[$i]'>$emp_names[$i]</option>";
  }
?>
</select>
<br/>
<input class="btn btn-sub" type="submit" name="submit" value="IOFList">
<br/>
<br/>
<h2> Note: We have changed the IOF main/entry page. </h2> <h3> Before you create a new IOF, please use the SearchAddress menu option and look for any existing address for that customer. If an address exists, use that address and create a new IOF. If you have any question on this option, please call me (Manjunath Nair) @ 610-256-4912 or email to me nairm@bachmanntrains.com </h3>
<br>
<label>Message: <input type="text" id="errormessage" name="errormessage" size="90" style="border: none; font-weight: bold; color:red; background-color:lightblue;" readonly/>
</form>
<script src="biiiofmenu.js"></script>
</body>
<html>
