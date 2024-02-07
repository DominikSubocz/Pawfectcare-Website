<?php

session_start();

require("classes/utils.php");

$_SESSION = [];

session_destroy();

header("Location: " . Utils::$projectFilePath. "/pet-list.php");