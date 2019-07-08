
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
			// "department_id" => $_POST['departid'],
			
			"department_name"  => $_POST['department_name'],
			
			
		);

		// $sql = "INSERT INTO users (firstname, lastname, email, age, location) values (:firstname, :lastname, :email, :age, :location)";

		$sql = sprintf(
				"INSERT INTO %s (%s) values (%s)",
				"DEPARTMENT",
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
	<blockquote><?php echo $_POST['department_name']; ?> successfully added.</blockquote>
<?php } ?>

<h2>Add a Department of Employee</h2>





<form method="post">


	
               <div class="col-md-4">
                <label for="exampleInputName">Department  Name</label>
                <input class="form-control" name="department_name" id="department_name" type="text" aria-describedby="nameHelp" placeholder="Enter  Company Name " required>
              </div>

          <!--     <div class="col-md-4">
                <label for="exampleInputName">Department id </label>
                <input class="form-control" name="department_name" id="department_name" type="text" aria-describedby="nameHelp" placeholder="Enter Depart id" required>
              </div> -->
	
	
	<button class="btn pull-left"  style= "margin-top: 10px;"><input type="submit" name="submit" value="Submit"></button>
		
</form>
</div>
</div>
<a href="create.php">  <-- Back to Create page</a>

<?php require "templates/footer.php"; ?>




