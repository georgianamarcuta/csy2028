<?php
$pdo = new PDO('mysql:dbname=kitchen;host=127.0.0.1', 'student', 'student', [PDO::ATTR_ERRMODE =>  PDO::ERRMODE_EXCEPTION ]);
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title>Kate's Kitchen - Admin</title>
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
				<?php
        // A sample product array
        $products = array("Mobile", "Laptop", "Tablet", "Camera");
        
        // Iterating through the product array
        foreach($products as $item){
            echo '<option value="' . strtolower($item) . '">' . $item . '</option>';
        }
        ?>
				</ul>
			</li>
			<li><a href="/about.html">About Us</a></li>
			<li><a href="/FAQs.php">FAQs</a></li>
		</ul>

	</nav>
<img src="/images/randombanner.php"/>
	<main class="sidebar">


	<section class="left">
		<ul>
			<li><a href="menu.php">Menu</a></li>
			<li><a href="categories.php">Categories</a></li>

		</ul>
	</section>

	<section class="right">

	<?php

		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		?>


			<h2>Menu</h2>

			<a class="new" href="adddish.php">Add new dish</a>
			

			<?php
			echo '<table>';
			echo '<thead>';
			echo '<tr>';
			echo '<th>Title</th>';
			echo '<th style="width: 15%">Price</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 15%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '</tr>';

			$stmt = $pdo->query('SELECT * FROM menu');

			foreach ($stmt as $record) {
				echo '<tr>';
				echo '<td>' . $record['name'] . '</td>';
				echo '<td>' . $record['price'] . '</td>';
				echo '<td><a style="float: right" href="editdish.php?id=' . $record['id'] . '">Edit</a></td>';
				echo '<td><a style="float: right" href="hide.php?id=' . $record['id'] . '"><button onclick="myFunction()">Hide it</button></a>
				
				</td>';
				echo '<td><a style="float: right" href="show.php?id=' . $record['id'] . '">Show</a></td>';
				echo '<td><form method="post" action="deletedish.php">
				<input type="hidden" name="id" value="' . $record['id'] . '" />
				<input type="submit" name="submit" value="Delete" />
				</form></td>';
				echo '</tr>';
			}

			echo '</thead>';
			echo '</table>';

		}

		else {
			?>
			<h2>Log in</h2>

			<form action="index.php" method="post">
				<label>Password</label>
				<input type="password" name="password" />

				<input type="submit" name="submit" value="Log In" />
			</form>
		<?php
		}
	?>

</section>
	</main>

	<footer>
		&copy; Kate's Kitchen 2021
	</footer>
</body>
</html>


