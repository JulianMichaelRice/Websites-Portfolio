<?php 
session_start();
require_once 'pdoconfig.php'; 
 
$payment_id = $statusMsg = $api_error = ''; 
$ordStatus = 'error'; 
 
// Check whether stripe token is not empty 
if(!empty($_POST['subscr_plan']) && !empty($_POST['stripeToken'])){ 
     
    // Retrieve stripe token, card and user info from the submitted form data 
    $token  = $_POST['stripeToken']; 
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $card_number = preg_replace('/\s+/', '', $_POST['card_number']); 
    $card_exp_month = $_POST['card_exp_month']; 
    $card_exp_year = $_POST['card_exp_year']; 
    $card_cvc = $_POST['card_cvc']; 
     
    // Plan info 
    $planID = $_POST['subscr_plan']; 
    $planInfo = $plans[$planID]; 
    $planName = $planInfo['name']; 
    $planPrice = $planInfo['price']; 
    $planInterval = $planInfo['interval']; 
     
    // Include Stripe PHP library 
    require_once 'stripe-php/init.php'; 
     
    // Set API key 
    \Stripe\Stripe::setApiKey(STRIPE_API_KEY); 
     
    // Add customer to stripe 
    $customer = \Stripe\Customer::create(array( 
        'email' => $email, 
        'source'  => $token 
    )); 
     
    // Convert price to cents 
    $priceCents = round($planPrice*100); 
     
    // Create a plan 
    try { 
        $plan = \Stripe\Plan::create(array( 
            "product" => [ 
                "name" => $planName 
            ], 
            "amount" => $priceCents, 
            "currency" => $currency, 
            "interval" => $planInterval, 
            "interval_count" => 1 
        )); 
    }catch(Exception $e) { 
        $api_error = $e->getMessage(); 
    } 
     
    if(empty($api_error) && $plan){ 
        // Creates a new subscription 
        try { 
            $subscription = \Stripe\Subscription::create(array( 
                "customer" => $customer->id, 
                "items" => array( 
                    array( 
                        "plan" => $plan->id, 
                    ), 
                ), 
            )); 
        }catch(Exception $e) { 
            $api_error = $e->getMessage(); 
        } 
         
        if(empty($api_error) && $subscription){ 
            // Retrieve subscription data 
            $subsData = $subscription->jsonSerialize(); 
     
            // Check whether the subscription activation is successful 
            if($subsData['status'] == 'active'){ 
                // Subscription info 
                $subscrID = $subsData['id']; 
                $custID = $subsData['customer']; 
                $planID = $subsData['plan']['id']; 
                $planAmount = ($subsData['plan']['amount']/100); 
                $planCurrency = $subsData['plan']['currency']; 
                $planinterval = $subsData['plan']['interval']; 
                $planIntervalCount = $subsData['plan']['interval_count']; 
                $created = date("Y-m-d H:i:s", $subsData['created']); 
                $current_period_start = date("Y-m-d H:i:s", $subsData['current_period_start']); 
                $current_period_end = date("Y-m-d H:i:s", $subsData['current_period_end']); 
                $status = $subsData['status']; 

                //General Info
                $firstname = $_POST['name'];
                $pw = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $email = $_POST['email'];
                 
                // Include database connection file  
                // include_once 'dbConnect.php'; 

                $db = new mysqli($host, $username, $password, $dbname);  
  
                // Display error if failed to connect  
                if ($db->connect_errno) {  
                    printf("Connect failed: %s\n", $db->connect_error);  
                    exit();  
                }

                $newQuery = " select * from users where email = '$email'";
                $newQueryResult = mysqli_query($db, $newQuery);
                if (mysqli_num_rows($newQueryResult) == 1) {
                    echo "ERROR: Email exists in the database...";
                    header('location:beauty-lounge'); 
                    exit();
                }

                $sqlA = " INSERT INTO users(first_name,email,password) VALUES('$firstname','$email','$pw')"; 
                mysqli_query($db, $sqlA);

                $newQuery = " select * from users where email = '$email'";
                $newQueryResult = mysqli_query($db, $newQuery);
                $row = mysqli_fetch_assoc($newQueryResult);
                $userID = $row['id'];

                // Insert transaction data into the database 
                $sqlB = "INSERT INTO user_subscriptions(user_id,stripe_subscription_id,stripe_customer_id,stripe_plan_id,plan_amount,plan_amount_currency,plan_interval,plan_interval_count,payer_email,created,plan_period_start,plan_period_end,status) VALUES('".$userID."','".$subscrID."','".$custID."','".$planID."','".$planAmount."','".$planCurrency."','".$planinterval."','".$planIntervalCount."','".$email."','".$created."','".$current_period_start."','".$current_period_end."','".$status."')"; 
                mysqli_query($db, $sqlB);

                $subscription_id = $db->insert_id;
                $sqlC = "UPDATE users SET subscription_id = {$subscription_id} WHERE id = {$userID}";
                mysqli_query($db, $sqlC);
                 
                $ordStatus = 'success'; 
                $statusMsg = 'Welcome to the Beauty Lounge!'; 

                $_SESSION['Username'] = $firstname;
            }else{ 
                $statusMsg = "Subscription activation failed!"; 
            } 
        }else{ 
            $statusMsg = "Subscription creation failed! ".$api_error; 
        } 
    }else{ 
        $statusMsg = "Plan creation failed! ".$api_error; 
    } 
}else{ 
    $statusMsg = "Error on form submission, please try again."; 
} 
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Assistant -->
        <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Martel:wght@200;700&family=Nothing+You+Could+Do&display=swap" rel="stylesheet">
        <link rel="icon" href="img/nav.png">
        <!-- This following line is only necessary in the case of using the option `scrollOverflow:true` -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css">
        <link rel="stylesheet" href="styles.css">
        <title>NHerBeauty | Official Website</title>
    </head>
    <body style="background-color: black;">
        <div class="container text-center">
            <div class="status spacer-x">
                <h1 class="<?php echo $ordStatus; ?>"><?php echo $statusMsg; ?></h1>
                <?php if(!empty($subscrID)){ ?>
                    <h4>Payment Information</h4>
                    <p>We recommend saving this ID somewhere so that we can identify your order if you ever submit inquiries to us!</p>
                    <p><b>Transaction ID:</b> <?php echo $subscrID; ?></p>
                    <p><b>Amount:</b> <?php echo $planAmount.' '.$planCurrency; ?></p>
                <?php } ?>
            </div>
            <a href="home" class="btn btn-gold">Return to Home</a>
            <div class="spacer-xl"></div>
        </div>
    </body>
</html>