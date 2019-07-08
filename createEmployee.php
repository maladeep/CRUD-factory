


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
			"employee_name" => $_POST['name'],
			
			"street"  => $_POST['street'],
			"email"     => $_POST['email'],
			"sex"       => $_POST['sex'],
			"city"  => $_POST['city'],
			"bdate"       => $_POST['dateofbirth'],
			// "title" => $_POST['title'],
			"department_name" => $_POST['department_name'],

			
		);

		// $sql = "INSERT INTO users (firstname, lastname, email, age, location) values (:firstname, :lastname, :email, :age, :location)";

		$sql = sprintf(
				"INSERT INTO %s (%s) values (%s)",
				"EMPLOYEE",
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
	<blockquote><?php echo $_POST['name']; ?> successfully added.</blockquote>
<?php } ?>

<h2>Add a Employee</h2>







<div class="form-group">

  <form method="post">          <!-- <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post"> -->
            <div class="form-row">

              <div class="col-md-4">
                <label for="exampleInputName">First name</label>
                <input class="form-control" id="name" type="text" name="name" aria-describedby="nameHelp"  placeholder="Enter  name" required>
              </div>

              <div class="col-md-4">
                <label for="exampleInputName">Email</label>
                <input class="form-control" id="email" type="text" name="email" aria-describedby="nameHelp" placeholder="Enter Email" required>
              </div>


               <div class="col-md-4">
                <label for="exampleInputName">Street</label>
                <input class="form-control" id="street" type="text" name="street" aria-describedby="nameHelp" placeholder="Enter Street">
              </div>

                 <div class="col-md-4">
                <label for="exampleInputName">City</label>
                <input class="form-control" id="city" type="text" name="city" aria-describedby="nameHelp" placeholder="Enter City" required>
              </div>

					 <div class="col-md-4">
                <label for="exampleInputName">sex</label>
                <input class="form-control" id="sex" type="text" name="sex" aria-describedby="nameHelp" placeholder="Enter F/M">
              </div>

               <div class="col-md-4">
                <label for="exampleInputName">Date of Birth</label>
                <input class="form-control" id="dateofbirth" type="text" name="dateofbirth" aria-describedby="nameHelp" placeholder="Enter XXXX-XX-XX " required>
              </div>

<div class="col-md-4">
                <label for="exampleInputName">Title</label>
                <input class="form-control" id="title" type="text" name="tile" aria-describedby="nameHelp" placeholder="Enter Position">
              </div>

              <div class="col-md-4">
                <label for="exampleInputName">Department </label>
                <input class="form-control" id="department_name" type="text" name="department_name" aria-describedby="nameHelp" placeholder="Enter Position  " required>
              </div>


	 <button class="btn pull-right"  style= "margin-top: 10px;"><input type="submit" name="submit" value="Submit"></button>
 
</form>

 </div>
</div>

<!-- 

<form method="post">

<div class="form-row">

	 <div class="col-md-4">
	<label for="employee_name"> Name</label>
	<input type="text" name="name" id="name" placeholder="Enter Full name">
</div>

	<!-- label for="employee_id"> Employee ID</label>
	<input type="text" name="eid" id="eid"> -->
	 <!-- <div class="col-md-4">
     <label for="email">email</label>
	<input type="text" name="email" id="email">
</div>
 <div class="col-md-4">

	<label for="lastname">Street</label>
	<input type="text" name="street" id="street">
</div>

	<label for="">city</label>
	<input type="text" name="city" id="city">
	
	<label for="sex">Sex</label>
	<input type="text" name="sex" id="sex">
	<label for="location">date of birth</label>
	<input type="text" name="dateofbirth" id="dateofbirth">
	<input type="submit" name="submit" value="Submit">
</form> --> -->

<a href="create.php">Back to Create page</a>

<?php require "templates/footer.php"; ?>




