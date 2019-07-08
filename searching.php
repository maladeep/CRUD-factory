
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