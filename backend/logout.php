<?php
require_once("connect_local.php");

global $CON;

session_unset();

header("location: ../index.php");