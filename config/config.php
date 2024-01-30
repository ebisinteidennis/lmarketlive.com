<?php

include 'db.php';

	$select = mysqli_query($link, "SELECT * FROM settings WHERE id = '1' ");
	if (mysqli_num_rows($select) > 0) {
		$row = mysqli_fetch_assoc($select);

		$sitename = $row['sitename'];
		$sitemail = $row['sitemail'];
		$siteurl = $row['siteurl'];
		$ref_bonus = $row['ref_bonus'];
		$btc_wallet = $row['btc_wallet'];
	}

	
	


?>

