<?php
    // remove user by id
    require 'database.php';
    $id = 0;
     
    if (!empty($_GET['id'])) {
      $id = $_REQUEST['id'];
    }
     
    if (!empty($_POST)) {
      $id = $_POST['id'];              
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "DELETE FROM users  WHERE UserID = ?";
      $q = $pdo->prepare($sql);
      $q->execute([$id]);
      Database::disconnect();
      header("Location: index.php"); 
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
  <div class="container">   
    <div class="span10 offset1">
      <div class="row">
        <h3>Delete data</h3>
      </div>                    
      <form class="form-horizontal" action="delete.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id;?>"/>
        <p class="alert alert-error">Are you sure to delete ?</p>
          <div class="form-actions">
            <button type="submit" class="btn btn-danger">Yes</button>
            <a class="btn" href="index.php">No</a>
          </div>
      </form>
    </div>               
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</body>
</html>