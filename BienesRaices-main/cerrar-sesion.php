<?php
session_start();
$_SESSION = [];

header("Location: {$_GET['url']}");