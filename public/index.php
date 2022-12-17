<?php

if (!session_id()) session_start();

require_once "../app/init.php";
require_once "../config.php";

$app = new App;
