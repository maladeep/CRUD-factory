
<?php

/**
 * List all users with a link to edit
 */

try {
  require "config.php";
  require "common.php";

  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM EMPLOYEE";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo  $error->getMessage();
}
?>
<?php require "templates/header.php"; ?>
        
<h2>Update EMPLOYEE RECORDS</h2>

<table class="table" >
  <thead class="dark">
    <tr>
      <th>#</th>
      <th>Employee Name</th>
        <th>Title</th>
      <!-- <th>Department</th> -->
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
            <td><?php echo escape($row["title"]); ?></td>
    <!--   <td><?php echo escape($row["department_name"]); ?></td> -->
       <td><?php echo escape($row["sex"]); ?> </td>
       <td><?php echo escape($row["bdate"]); ?></td>

      <td><?php echo escape($row["street"]); ?></td>
      <td><?php echo escape($row["email"]); ?></td>
      <td><?php echo escape($row["city"]); ?></td>
     <td><a href="update-single.php?id=<?php echo escape($row["id"]); ?>">Edit</a></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="update.php">Back to update page</a>

<?php require "templates/footer.php"; ?>
