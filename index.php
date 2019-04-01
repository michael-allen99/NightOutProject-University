<?php
	session_start();
	
	if (!isset($_SESSION["gatekeeper"]))
	{
		header("Location: login.html");
	}
	else
	{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
		echo "<div class='sectionarea welcome'>Welcome ". $_SESSION['gatekeeper'];
		echo '<form method="post" action="logout.php">
				<input type="submit" value="Log Out"/>
			  </form></div>
			';
		echo '
			<div class="sectionarea">
				<form method="post" action="addnewvenue.php">
					<h2>Add a new venue</h2>
					<p>Enter venue name</p>
					<input type="text" name="venue_name" />
					<p>Enter venue type</p>
					<input name="venue_type" />
					<p>Enter venue description</p>
					<input type="text" name="venue_description" /></br></br>
					<input type="submit" value="Add venue" />
				</form>
			</div>
			<div class="sectionarea">
				<form method="get" action="searchvenue.php">
					<h2>Search for a Venue (Standard PHP)</h2>
					<p>Enter venue type: (E.g Restaurant, Bar, Club, Pub)</p>
					<input name="venue_type" /></br></br>
					<input type="submit" value="Search!" />
				</form>
			</div>
			<div class="sectionarea">
				<h2><a href="ajaxsearch.html">Search for a venue using AJAX</a></h2>
			</div>
			';
		if ($_SESSION["gatekeeper"] == "admin")	
			echo '<div class="sectionarea welcome"><a href="approvereview.php"><h3>Approve Reviews</h3></a></div>';
	 ?>
	
</body>
</html>
<?php
	}
?>