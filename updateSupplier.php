
<?php

/**
 * List all users with a link to edit
 */

try {
  require "config.php";
  require "common.php";

  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM SUPPLIER";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo  $error->getMessage();
}
?>
<?php require "templates/header.php"; ?>
        
<h2>Update Department RECORDS</h2>

<table class="table">
  <thead class="dark">
    <tr>
     
      <th>Suppliers Name</th>
       <th>City</th>
      <<!-- th>Department ID</th> -->
      
      
    </tr>
  </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
      <tr><!-- 
      <td><?php echo escape($row["id"]); ?></td> -->
      <td><?Php echo escape($row["supplier_name"]); ?> </td>
       
       <td><?php echo escape($row["city"]); ?> </td> 
       
     <td><a href="update-single.php?supplier_name=<?php echo escape($row["supplier_name"]); ?>">Edit</a></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="update.php">Back to update page</a>

<?php require "templates/footer.php"; ?>
