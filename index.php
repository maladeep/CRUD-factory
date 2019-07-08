<?php include "templates/header.php"; ?>

<div  class="container pull-center">
	<div class="row">
		<div class="col-md-12">
 <h1 class="pull-center container"> Sweets Nepal </h1>

  <quote>  ALL Data Records in  sweets Nepal,An inentory for keeping your recording

</quote>
</div>
</div>
</div>



<div class="container">
	<div class="row">
		<div class="col-md-6">


<?php
require "config.php";
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
try{
    $pdo = new PDO("mysql:host=localhost;dbname=Factory", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
 
// Attempt select query execution
try{
    $sql = "SELECT * FROM EMPLOYEE";   
    $result = $pdo->query($sql);
    if($result->rowCount() > 0){
    	echo "EMPLOYEEES";
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>Employee Name</th>";
                echo "<th>title</th>";
                echo "<th>E-mail</th>";
            echo "</tr>";
        while($row = $result->fetch()){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['employee_name'] . "</td>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        unset($result);
    } else{
        echo "No records matching your query were found.";
    }
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close connection
unset($pdo);
?>


</div>

<div class="col-md-3">


<?php
require "config.php";
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
try{
    $pdo = new PDO("mysql:host=localhost;dbname=Factory", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
 
// Attempt select query execution
try{
    $sql = "SELECT * FROM RETAILER";   
    $result = $pdo->query($sql);
    if($result->rowCount() > 0){
        echo "<table>";
            echo "<tr>";
                // echo "<th>id</th>";
                echo "<th>Retailer Name</th>";
                echo "<th>Retailer City</th>";
                // echo "<th>email</th>";
            echo "</tr>";
        while($row = $result->fetch()){
            echo "<tr>";
                // echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['retailer_name'] . "</td>";
                echo "<td>" . $row['retailer_city'] . "</td>";
                // echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        unset($result);
    } else{
        echo "No records matching your query were found.";
    }
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close connection
unset($pdo);
?>


</div>




		<div class="col-md-3">


<?php
require "config.php";
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
try{
    $pdo = new PDO("mysql:host=localhost;dbname=Factory", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
 
// Attempt select query execution
try{
    $sql = "SELECT * FROM SUPPLIER";   
    $result = $pdo->query($sql);
    if($result->rowCount() > 0){
    	
        echo "<table>";
            echo "<tr>";
                // echo "<th>id</th>";
                echo "<th>Supplier Name</th>";
                echo "<th>City</th>";
                // echo "<th>email</th>";
            echo "</tr>";
        while($row = $result->fetch()){
            echo "<tr>";
                // echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['supplier_name'] . "</td>";
                echo "<td>" . $row['city'] . "</td>";
                // echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        unset($result);
    } else{
        echo "No records matching your query were found.";
    }
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close connection
unset($pdo);
?>


</div>
</div >

</div>

<div class="container">
	<div class="row">


<div class="col-md-6">
<strong class="pull-center"><h1>SALES</h1></strong>

<?php
require "config.php";
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
try{
    $pdo = new PDO("mysql:host=localhost;dbname=Factory", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
 
// Attempt select query execution
try{
    $sql = "SELECT * FROM SALES";   
    $result = $pdo->query($sql);
    if($result->rowCount() > 0){
   echo '<div class="table" >';  

        echo "<table>";
            echo "<tr>";
                echo "<th>Product Id</th>";
                echo "<th>Retailer Name</th>";
                echo "<th>sales Date</th>";
                echo "<th>sales Quantity</th>";
                echo "<th>sales Cost</th>";

            echo "</tr>";
           
        while($row = $result->fetch()){
            echo "<tr>";
                echo "<td>" . $row['product_id'] . "</td>";
                echo "<td>" . $row['retailer_name'] . "</td>";
                echo "<td>" . $row['sales_date'] . "</td>";
                echo "<td>" . $row['sales_quantity'] . "</td>";
                 echo "<td>" . $row['sales_cost'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        // Free result set
        unset($result);

    } else{
        echo "No records matching your query were found.";
    }
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close connection
unset($pdo);
?>


</div>
</div>

</div>


<div class="container">
    <div class="row">


<div class="col-md-6">
<strong class="pull-center"><h1>Retailer and its sales values in city wise</h1></strong>

<?php
require "config.php";
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
try{
    $pdo = new PDO("mysql:host=localhost;dbname=Factory", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
 
// Attempt select query execution
try{
    
    $sql="SELECT *
FROM SALES  
NATURAL JOIN RETAILER  ";

    // $sql = "SELECT * FROM SALES as,RETAILER 
    // WHERE sales";   
    $result = $pdo->query($sql);
    if($result->rowCount() > 0){
   echo '<div class="table" >';  

        echo "<table>";
            echo "<tr>";
                echo "<th>Product Id</th>";
                echo "<th>Retailer Name</th>";
                echo "<th>sales Date</th>";
                echo "<th>sales Quantity</th>";
                echo "<th>sales Cost</th>";
                echo "<th> Retailer City</th>";

            echo "</tr>";
           
        while($row = $result->fetch()){
            echo "<tr>";
                echo "<td>" . $row['product_id'] . "</td>";
                echo "<td>" . $row['retailer_name'] . "</td>";
                echo "<td>" . $row['sales_date'] . "</td>";
                echo "<td>" . $row['sales_quantity'] . "</td>";
                 echo "<td>" . $row['sales_cost'] . "</td>";
                  echo "<td>" . $row['retailer_city'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        // Free result set
        unset($result);

    } else{
        echo "No records matching your query were found.";
    }
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close connection
unset($pdo);
?>


</div>
</div>










<!-- <ul>
	<li><a href="create.php"><strong>Create Records</strong></a> - add a user</li>
	<li><a href="read.php"><strong>View Records (Search)</strong></a> - find a user</li>
	<li><a href="update.php"><strong>Update Records</strong></a> - edit a user</li>
	<li><a href="delete.php"><strong>Delete Records</strong></a> - delete a user</li>

</ul> -->


<?php include "templates/footer.php"; ?>