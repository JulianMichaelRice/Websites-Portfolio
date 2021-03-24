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
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $table = trim($_POST["table"]);
    
    // Validate trophy
    $input_trophy = trim($_POST["trophy"]);
    if(empty($input_trophy) && $input_trophy != '0'){
        $trophy_err = "Please enter a trophy. (0 = False, 1 = True)";
    } elseif(!filter_var($input_trophy, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[01]$/"))) && $input_trophy != '0'){ // not sure why the regex won't except 0...
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
        $sql = "INSERT INTO " . $table . " (trophy,profile,name,mob,value,area,time) VALUES (:trophy, :profile, :name, :mob, :value, :area, :time)";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":trophy", $param_trophy);
            $stmt->bindParam(":profile", $param_profile);
            $stmt->bindParam(":name", $param_name);
            $stmt->bindParam(":mob", $param_mob);
            $stmt->bindParam(":value", $param_value);
            $stmt->bindParam(":area", $param_area);
            $stmt->bindParam(":time", $param_time);
            
            // Set parameters
            $param_trophy = $trophy;
            $param_profile = $profile;
            $param_name = $name;
            $param_mob = $mob;
            $param_value = $value;
            $param_area = $area;
            $param_time = $time;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: index.php?table=$table");
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
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Entry</title>
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
                        <h2>Create Entry</h2>
                    </div>
                    <p>Please fill this form and submit to add global entry to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                            <label>Time (YYYY-MM-DD HH:MM)</label>
                            <input type="text" name="time" class="form-control" value="<?php echo $time; ?>">
                            <span class="help-block"><?php echo $time_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php?table=<?= $table?>" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>