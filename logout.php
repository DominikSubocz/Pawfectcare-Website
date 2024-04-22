<?php

/// This must come first when we need access to the current session
session_start();;

require("classes/utils.php");

$_SESSION = [];

session_destroy();

header("Location: " . Utils::$projectFilePath. "/pet-list.php");