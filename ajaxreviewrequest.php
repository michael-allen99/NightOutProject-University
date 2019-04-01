<?php
	session_start();
	
	$conn = new PDO("mysql:host=localhost;dbname=assign101;", "assign101", "Tei5or7o");

	$review = $_GET["review"];
	$id = $_GET["id"];
	$username = $_SESSION["gatekeeper"];
	
	$send_review = $conn->query("insert into reviews(venueID, username, review, approved) values ($id, '$username', '$review', '0')");
?>