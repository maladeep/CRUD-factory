 <?php

/**
 * Delete a user
 */

require "config.php";
require "common.php";

if (isset($_GET["id"])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
  
    $id = $_GET["id"];

    $sql = "DELETE FROM EMPLOYEE WHERE id = :id";

    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $success = "User successfully deleted";
  } catch(PDOException $error) {
    echo  $error->getMessage();
  }
}

try {
  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM EMPLOYEE ";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo  $error->getMessage();
}
?>
<?php require "templates/header.php"; ?>
        
<h2>Delete users</h2>

<?php if ($success) echo $success; ?>

<table class="table">
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
    <?php foreach ($result as $row) : ?>
      <tr>
        <td><?php echo escape($row["id"]); ?></td>
        <td><?php echo escape($row["employee_name"]); ?></td>
       <td><?php echo escape($row["sex"]); ?> </td>
       <td><?php echo escape($row["bdate"]); ?></td>

      <td><?php echo escape($row["street"]); ?></td>
      <td><?php echo escape($row["email"]); ?></td>
      <td><?php echo escape($row["city"]); ?></td>
      <td><a href="deleteEmployee.php?id=<?php echo escape($row["id"]); ?>">Delete</a></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<a href="delete.php"> <-- Back to delete page</a>

<?php require "templates/footer.php"; ?>





