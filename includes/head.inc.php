<!-- begin head.inc.php -->
<?php 
	date_default_timezone_set('America/Sao_Paulo');
	$date = date('l, jS F Y g:i a');
	$timezone = date_default_timezone_get();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="/favicon.png">

	<link rel="stylesheet" type="text/css" href="/styles/fonts.css">
	<link rel="stylesheet" type="text/css" href="/styles/styles.css">
	<link rel="stylesheet" type="text/css" href="/styles/lightbox.css">

	<script type="text/javascript" src="/scripts/lightbox.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="/scripts/script.js" crossorigin="anonymous" defer></script>
	<title>Australia Down Under 
        <?php if(isset($pagetitle)) print "- $pagetitle"; ?>
    </title>
</head>
<!-- end head.inc.php -->