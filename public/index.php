<?php

if (!session_id()) session_start();

require_once "../app/init.php";
require_once "../config.php";

$re = '/https?:\/\/(?:www\.)?([-a-zA-Z0-9@:%._\+~#=]{2,256}\.?[a-z]{2,6}\b)*(\/[\/\d\w\.-]*)*(?:[\?])*(.+)*/i';
$subst = "$2";
preg_match_all($re, BASE_URL, $matches, PREG_SET_ORDER, 0);

define("ROOT_URL", $matches[0][2]);
$app = new App;
