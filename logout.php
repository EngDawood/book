<?php
	session_start();
	$_SESSION['client'] = '';
	header("Location: index.php");