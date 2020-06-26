
<?php
	$plans = array( 
    '1' => array( 
        'name' => 'The Beauty Lounge', 
        'price' => 14.99, 
        'interval' => 'month' 
    )
); 
$currency = "usd";  
 
// Stripe API configuration  
define('STRIPE_API_KEY', 'sk_test_51GxCF8AJIvuLye2bv3xZWWKZMXkg7maugs2afcolW9qbattq2Z6o1cPswqiAUigeP0c6zraWeKB3XQyJ8NN0yQOY00VxA05dzW');
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51GxCF8AJIvuLye2bhVlNaDesbRKBN4HFndCuywAgEKATxz8GmyK95DsfNhWFJt5vEsbioAUO68vcAtvFDngv1Ray00K9EiFNar'); 

    $host = 'localhost';
    $dbname = 'nherbeauty';
    $username = 'root';
    $password = '';
?>