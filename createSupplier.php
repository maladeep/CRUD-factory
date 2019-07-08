
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
			"supplier_name" => $_POST['sup_name'],
			
			"city"  => $_POST['sup_city'],
			
			
		);

		// $sql = "INSERT INTO users (firstname, lastname, email, age, location) values (:firstname, :lastname, :email, :age, :location)";

		$sql = sprintf(
				"INSERT INTO %s (%s) values (%s)",
				"	SUPPLIER",
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
	<blockquote><?php echo $_POST['sup_name']; ?> successfully added.</blockquote>
<?php } ?>

<h2>Add a Supplier</h2>





<form method="post">


	<label for="supplier_name"> Supplier Name</label>
	<input type="text" name="sup_name" id="sup_name">

	

	<label for="supplier_city">city</label>
	<input type="text" name="sup_city" id="sup_city">
	
		<input type="submit" name="submit" value="Submit">
</form>

<a href="create.php">Back to Create page</a>

<?php require "templates/footer.php"; ?>




