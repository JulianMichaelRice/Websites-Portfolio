<?php
// Include config file
require_once "../../config_db_edit.php";

if(!$auth) {
    echo 'not authorized to access page';
    exit;
}

$table = $_GET['table'];

// Define variables and initialize with empty values
$trophy = $profile = $name = $mob = $value = $area = $time = "";
$trophy_err = $profile_err = $name_err = $mob_err = $value_err = $area_err = $time_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    $table = trim($_POST["table"]);
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate trophy
    $input_trophy = trim($_POST["trophy"]);
    if(empty($input_trophy) && $input_trophy != '0'){
        $trophy_err = "Please enter a trophy. (0 = False, 1 = True)";
    } elseif(!filter_var($input_trophy, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[01]{1}$/"))) && $input_trophy != '0'){ // not sure why the regex won't except 0...
        $trophy_err = "Please enter a valid trophy. (0 = False, 1 = True)";
    } else{
        $trophy = $input_trophy;
    }
    
    // Validate profile
    $input_profile = trim($_POST["profile"]);
    if(empty($input_profile)){
        $profile_err = "Please enter a profile.";
    } elseif(!filter_var($input_profile, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]+$/")))){
        $profile_err = "Please enter a valid profile.";
    } else{
        $profile = $input_profile;
    }
    
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate mob
    $input_mob = trim($_POST["mob"]);
    if(empty($input_mob)){
        $input_mob = "Please enter an mob.";     
    } else{
        $mob = $input_mob;
    }
    
    // Validate value
    $input_value = trim($_POST["value"]);
    if(empty($input_value) && $input_value != '0'){
        $value_err = "Please enter a value.";
    } elseif(!filter_var($input_value, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]+$/"))) && $input_value != '0'){ // not sure why the regex won't except 0...
        $value_err = "Please enter a valid value.";
    } else{
        $value = $input_value;
    }
    
    // Validate area
    $input_area = trim($_POST["area"]);
    if(empty($input_area)){
        $input_area = "Please enter an area.";     
    } else{
        $area = $input_area;
    }
    
    // Validate time
    $input_time = trim($_POST["time"]);
    if(empty($input_time)){
        $time_err = "Please enter a time.";
    } elseif(!filter_var($input_time, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1]) (2[0-3]|[01][0-9]):[0-5][0-9]/")))){
        $time_err = "Please enter a valid time. (YYYY-MM-DD HH:MM)";
    } else{
        $time = $input_time;
    }
    
    // Check input errors before inserting in database
    if(empty($trophy_err) && empty($profile_err) && empty($name_err) && empty($mob_err) && empty($value_err) && empty($area_err) && empty($time_err)) {
        // Prepare an insert statement
        $sql = "UPDATE " . $table . " SET trophy=:trophy, profile=:profile, name=:name, mob=:mob, value=:value, area=:area, time=:time WHERE id=:id";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":trophy", $param_trophy);
            $stmt->bindParam(":profile", $param_profile);
            $stmt->bindParam(":name", $param_name);
            $stmt->bindParam(":mob", $param_mob);
            $stmt->bindParam(":value", $param_value);
            $stmt->bindParam(":area", $param_area);
            $stmt->bindParam(":time", $param_time);
            $stmt->bindParam(":id", $param_id);
            
            // Set parameters
            $param_trophy = $trophy;
            $param_profile = $profile;
            $param_name = $name;
            $param_mob = $mob;
            $param_value = $value;
            $param_area = $area;
            $param_time = $time;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records updated successfully. Redirect to landing page
                header("location: index.php?table=$table&key=$_GET["$key"]);
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT id, timestamp, trophy, profile, name, mob, value, area, time FROM $table WHERE id = :id";
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":id", $param_id);
            
            // Set parameters
            $param_id = $id;
            
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
                    // URL doesn't contain valid id. Redirect to error page
                header("location: error.php?table=$table&key=$_GET["key"]");
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
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Entry</title>
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
                        <h2>Update Entry</h2>
                    </div>
                    <p>Please edit the input values and submit to update the entry.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <input type="hidden" name="table" class="form-control" value="<?php echo $table; ?>">
                        <div class="form-group <?php echo (!empty($trophy_err)) ? 'has-error' : ''; ?>">
                            <label>Trophy (0 = False, 1 = True)</label>
                            <input type="text" name="trophy" class="form-control" value="<?php echo $trophy; ?>">
                            <span class="help-block"><?php echo $trophy_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($profile_err)) ? 'has-error' : ''; ?>">
                            <label>Profile</label>
                            <input type="text" name="profile" class="form-control" value="<?php echo $profile; ?>">
                            <span class="help-block"><?php echo $profile_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($mob_err)) ? 'has-error' : ''; ?>">
                            <label>Mob</label>
                            <input type="text" name="mob" class="form-control" value="<?php echo $mob; ?>">
                            <span class="help-block"><?php echo $mob_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($value_err)) ? 'has-error' : ''; ?>">
                            <label>Value</label>
                            <input type="text" name="value" class="form-control" value="<?php echo $value; ?>">
                            <span class="help-block"><?php echo $value_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($area_err)) ? 'has-error' : ''; ?>">
                            <label>Area</label>
                            <input type="text" name="area" class="form-control" value="<?php echo $area; ?>">
                            <span class="help-block"><?php echo $area_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($time_err)) ? 'has-error' : ''; ?>">
                            <label>Time (YYYY-MM-DD HH:MM</label>
                            <input type="text" name="time" class="form-control" value="<?php echo $time; ?>">
                            <span class="help-block"><?php echo $time_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php?table=$table" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>