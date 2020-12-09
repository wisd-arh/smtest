<?php
require_once("classes.php");

$task = new Task($_POST["task"]);
$task->execute();
$task = null;
