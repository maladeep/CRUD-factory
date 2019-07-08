
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
			"company_name" => $_POST['company_name'],
			
			"city"  => $_POST['city'],
			
			
		);

		// $sql = "INSERT INTO users (firstname, lastname, email, age, location) values (:firstname, :lastname, :email, :age, :location)";

		$sql = sprintf(
				"INSERT INTO %s (%s) values (%s)",
				"COMPANY",
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
	<blockquote><?php echo $_POST['company_name']; ?> successfully added.</blockquote>
<?php } ?>

<h2>Add a Company </h2>

<div class= "container model">



<form method="post">




	 <div class="col-md-4">
                <label for="exampleInputName">Company  Name</label>
                <input class="form-control" name="company_name" id="company_name" type="text" aria-describedby="nameHelp" placeholder="Enter  Company Name ">
              </div>
 <div class="col-md-4">
                <label for="exampleInputName">City </label>
                <input class="form-control" name="city" id="city" type="text" aria-describedby="nameHelp" placeholder="Enter  Company Name ">
              </div>


	
		<button class="btn pull-left "><input type="submit" name="submit" value="Submit"></button>
</form>
</div>
</div>
</div>


<a href="create.php"> <-- Back to Create page</a>

<?php require "templates/footer.php"; ?>




