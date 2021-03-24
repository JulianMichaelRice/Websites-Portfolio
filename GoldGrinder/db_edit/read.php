<?php
// Include config file
require_once "../../config_db_edit.php";

if(!$auth) {
    echo 'not authorized to access page';
    exit;
}

$table = $_GET['table'];
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Prepare a select statement
    $sql = "SELECT id, timestamp, trophy, profile, name, mob, value, area, time FROM $table WHERE id = :id";
    
    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":id", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            if($stmt->rowCount() == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                // Retrieve individual field value
                $id = $row['id'];
                $timestamp = $row['timestamp'];
                $trophy = $row['trophy'];
                $profile = $row['profile'];
                $name = $row['name'];
                $mob = $row['mob'];
                $value = $row['value'];
                $area = $row['area'];
                $time = $row['time'];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php?table=$table");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    unset($stmt);
    
    // Close connection
    unset($pdo);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php?table=$table");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Entry</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Entry</h1>
                    </div>
                    <div class="form-group">
                        <label>ID</label>
                        <p class="form-control-static"><?php echo $row["id"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Trophy</label>
                        <p class="form-control-static"><?php echo $row["trophy"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Profile</label>
                        <p class="form-control-static"><?php echo $row["profile"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <p class="form-control-static"><?php echo $row["name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Mob</label>
                        <p class="form-control-static"><?php echo $row["mob"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Value</label>
                        <p class="form-control-static"><?php echo $row["value"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Area</label>
                        <p class="form-control-static"><?php echo $row["area"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Time</label>
                        <p class="form-control-static"><?php echo $row["time"]; ?></p>
                    </div>

                    <p><a href="index.php?table=<?= $table?>&key=<?=$_GET["key"]?>" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>