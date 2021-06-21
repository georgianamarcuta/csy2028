<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title>Kate's Kitchen - Starters</title>
	</head>
	<body>
	<header>
		<section>
			<aside>
				<h3>Opening times:</h3>
				<p>Sun-Thu: 12:00-22:00</p>
				<p>Fri-Sat: 12:00-23:30</p>
			</aside>
			<h1>Kate's Kitchen</h1>

		</section>
	</header>
	<nav>
		<ul>
			<li><a href="/">Home</a></li>
			<li>Menu
				<ul>
					<li><a href="/starters.php">Starters</a></li>
					<li><a href="/mains.php">Mains</a></li>
					<li><a href="/dessert.php">Dessert</a></li>

				</ul>
			</li>
			<li><a href="/about.html">About Us</a></li>
			<li><a href="/FAQs.php">FAQs</a></li>
		</ul>

	</nav>
<img src="images/randombanner.php"/>

	<main class="sidebar">

	<section class="left">
		<ul>
				<li><a class="current" href="/starters.php">Starters</a></li>
				<li><a href="/mains.php">Mains</a></li>
				<li><a href="/dessert.php">Dessert</a></li>		</ul>
	</section>

	<section class="right">

	<h1>Starters</h1>

	<ul class="listing">


	<?php
	$pdo = new PDO('mysql:dbname=kitchen;host=127.0.0.1', 'student', 'student');
	$stmt = $pdo->prepare('SELECT * FROM menu WHERE categoryId = 1');

	$stmt->execute();


	foreach ($stmt as $record) {
		echo '<li>';

		echo '<div class="details">';
			echo '<h3>£' . $record['price'] . '</h3>';
		echo '<h2>' . $record['name'] . '</h2>';
	
		echo '<p>' . nl2br($record['description']) . '</p>';


		echo '</div>';
		echo '</li>';
	}

	?>

</ul>

</section>
	</main>


	<footer>
		&copy; Kate's Kitchen 2021
	</footer>
</body>
</html>

