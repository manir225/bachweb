<?php
function getNewStr($cur_str){
    $temp_str = str_replace('&', ' AND ', $cur_str);
    $mod_str = str_replace("'", "''",$temp_str);
    $new_str = preg_replace('/[^A-Za-z0-9\-\'\@]/', ' ', $mod_str);
    return $new_str;
}
?>
