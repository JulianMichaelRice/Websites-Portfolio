<?php
//https://www.tutorialrepublic.com/php-tutorial/php-mysql-crud-application.php
// Include config file
require_once "../../config_db_edit.php";

if(!$auth) {
    echo 'not authorized to access page';
    exit;
}

$table = $_GET['table'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 1150px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left"><?= ucfirst($table)?> Details</h2>
                        <a href="create.php?table=<?= $table?>" class="btn btn-success pull-right">Add New Entry</a>
                    </div>
                    <?php
                    // Attempt select query execution
                    $sql = "SELECT id, timestamp, trophy, profile, name, mob, value, area, time FROM $table";
                    if($result = $pdo->query($sql)){
                        if($result->rowCount() > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>ID</th>";
                                        echo "<th>Timestamp</th>";
                                        echo "<th>Trophy</th>";
                                        echo "<th>Profile</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Mob</th>";
                                        echo "<th>Value</th>";
                                        echo "<th>Area</th>";
                                        echo "<th>Time</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch()){
                                    echo "<tr>";
                                        echo "<td>".$row['id']."</td>";
                                        echo "<td>".$row['timestamp']."</td>";
                                        echo "<td>".$row['trophy']."</td>";
                                        echo "<td>".$row['profile']."</td>";
                                        echo "<td>".$row['name']."</td>";
                                        echo "<td>".$row['mob']."</td>";
                                        echo "<td>".$row['value']."</td>";
                                        echo "<td>".$row['area']."</td>";
                                        echo "<td>".$row['time']."</td>";
                                        echo "<td>";
                                            echo "<a href='read.php?table=" . $table . "&id=". $row['id'] ."&key=" . $_GET['key'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?table=" . $table . "&id=". $row['id'] ."&key=" . $_GET['key'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?table=" . $table . "&id=". $row['id'] ."&key=" . $_GET['key'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            unset($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                    }
                    
                    // Close connection
                    unset($pdo);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>