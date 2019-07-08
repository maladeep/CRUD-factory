
<?php

/**
 * Function to query information based on 
 * a parameter: in this case, location.
 *
 */




if (isset($_POST['submit'])) {
	try {	
		require "config.php";
		require "common.php";


		

		$connection = new PDO($dsn, $username, $password);

		$sql = "SELECT * 
						FROM EMPLOYEE
						WHERE employee_name = :name";
	   					

		$location = $_POST['name'];

		$statement = $connection->prepare($sql);
		$statement->bindParam(':name', $location, PDO::PARAM_STR);
		$statement->execute();

		$result = $statement->fetchAll();
	} catch(PDOException $error) {
		echo  $error->getMessage();
	}
}
?>
<?php require "templates/header.php"; ?>


<h2>Find user based on Employee Name</h2>
<div class="pull-center">
<a href="index.php"> View All Records </a>	
</div>
<form method="post">

<label for="employee_name"> Name</label>
	<input type="text" name="name" id="name">
	<input type="submit" name="submit" value="View Results">
</form>




<div>
<a href="home.php"> <-- Back to home</a>
</div>









<?php require "templates/footer.php"; ?>


		
<?php  
if (isset($_POST['submit']))
 {
	if ($result && $statement->rowCount() > 0) { ?>
	<table  class="table">	
 	<tbody>
    <thead class="dark">	
	

		
				<tr>
					<th>#</th>
					<th>Employee Name</th>
      <th>Sex</th>
      <th>Birth Date</th>
      <th>Street</th>
      <th>Email Address</th>
      <th>City</th>

				</tr>
			</thead>
			<tbody>
	<?php foreach ($result as $row) { ?>
			<tr>
				<td><?php echo escape($row["id"]); ?></td>
				<td><?php echo escape($row["employee_name"]); ?></td>
       <td><?php echo escape($row["sex"]); ?> </td>
       <td><?php echo escape($row["bdate"]); ?></td>

      <td><?php echo escape($row["street"]); ?></td>
      <td><?php echo escape($row["email"]); ?></td>
      <td><?php echo escape($row["city"]); ?></td>
			</tr>
		<?php } ?> 
			</tbody>
	</table>
	<?php } else { 
		?>
		<blockquote>No results found for <?php echo escape($_POST['name']); ?>.</blockquote>
		<blockquote> <a href="create.php"> <strong>click here to add this record </strong></a></blockquote>

	<?php } 
} ?> 








