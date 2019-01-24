<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class="">
      <h3 style="text-align: center;">Task for Siteimage</h3>
    </div>
    <div class="row">
      <p>
        <a href="create.php" class="btn btn-secondary">Create new</a>
      </p>              
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            // connect to the database and extract the data          
            include 'database.php';
            $pdo = Database::connect();
            $sql = 'SELECT * FROM users ORDER BY UserID DESC';
            foreach ($pdo->query($sql) as $row) {
              echo '<tr>';
              echo '<td>'. $row['UserID'] . '</td>';
              echo '<td>'. $row['UserName'] . '</td>';
              echo '<td>'. $row['UserEmail'] . '</td>';
              echo '<td width=250>';
              echo '<a class="btn btn-primary" href="update.php?id='.$row['UserID'].'">Edit</a>';
              echo ' ';
              echo '<a class="btn btn-danger" href="delete.php?id='.$row['UserID'].'">Delete</a>';
              echo '</td>';
              echo '</tr>';
            }
            Database::disconnect();
          ?>
        </tbody>
      </table>
    </div>
  </div> 

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>