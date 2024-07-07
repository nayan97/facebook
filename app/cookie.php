<?php

/**
*set cooke msg 
*/

function setMsg($type, $msg){
    setcookie($type, $msg, time() +2);
}

/**
 * show cooke msg
 */

 function showMsg($type){

    if(isset($_COOKIE[$type])){

        echo "<p class=\"alert alert-{$type}\">{$_COOKIE[$type]} ! <button class=\"close\" data-dismiss=\"alert\">&times;</button></p>";
    }
 }