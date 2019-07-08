
<?php

/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */


if (isset($_POST['submit'])) {
	require "config.php";
	require "common.php";

	try {
		$connection = new PDO($dsn, $username, $password, $options);
		
		$new_user = array(
			"retailer_name" => $_POST['ret_name'],
			
			"retailer_city"  => $_POST['ret_city'],
			
			
		);

		// $sql = "INSERT INTO users (firstname, lastname, email, age, location) values (:firstname, :lastname, :email, :age, :location)";

		$sql = sprintf(
				"INSERT INTO %s (%s) values (%s)",
				"	RETAILER",
				implode(", ", array_keys($new_user)),
				":" . implode(", :", array_keys($new_user))
		);
		
		$statement = $connection->prepare($sql);
		$statement->execute($new_user);
	} catch(PDOException $error) {
		echo $error->getMessage();
	}
	
}
?>

<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) { ?>
	<blockquote><?php echo $_POST['ret_name']; ?> successfully added.</blockquote>
<?php } ?>

<h2>Add a Retailer</h2>





<form method="post">


	<label for="retailer_name"> Retailer Name</label>
	<input type="text" name="ret_name" id="ret_name" required>

	

	<label for="retailer_city">city</label>
	<input type="text" name="ret_city" id="ret_city" required>
	
		<input type="submit" name="submit" value="Submit">
</form>

<a href="create.php">Back to Create page</a>

<?php require "templates/footer.php"; ?>




