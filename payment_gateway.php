

<?php
include('includes/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['BookingId'])) {
        $bookingId = $_POST['BookingId'];

        $sql = "SELECT PackagePrice FROM tbltourpackages WHERE PackageId IN (SELECT PackageId FROM tblbooking WHERE BookingId = :bookingId)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':bookingId', $bookingId, PDO::PARAM_INT);
        $query->execute();

  
        if ($query->rowCount() > 0) {
           
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $paymentAmount = $row['PackagePrice'];


        } else {
         
            echo "Error: No payment amount found for the provided booking ID.";
        }
    } else {
        
        echo "Error: Booking ID not provided.";
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['bookingId'])) {
    $bookingId = $_POST['bookingId'];
    $sql = "UPDATE tblbooking SET paymentstatus = 1 WHERE BookingId = :bookingId";
    $query = $dbh->prepare($sql);
    $query->bindParam(':bookingId', $bookingId, PDO::PARAM_STR);
    $query->execute();
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 10px;
            color: #555;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        input[type="text"]:focus,
        input[type="number"]:focus,
        select {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s ease-in-out;
        }
        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus {
            outline: none;
            border-color: #4caf50;
        }
        button {
            background-color: #4caf50;
            color: #fff;
            padding: 15px 0;
            border: none;
            border-radius: 4px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }
        button:hover {
            background-color: #45a049;
        }
        .card-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .card-info input {
            flex: 1;
           
        }
        .accepted-cards {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .accepted-cards img {
            width: 50px;
            margin: 0 10px;
        }
        .thank-you-message {
            display: none;
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container" id="payment-container">
        <h1>Payment Gateway</h1>
        <form id="payment-form">
       
            <label for="card-holder">Card Details:</label>
            <input type="text" id="card-holder" placeholder="Enter card holder name" required>
            <input type="text" id="card-number" placeholder="Card Number" required>
            <div class="card-info">
                
                <input type="text" style="margin-right:10px;" id="expiry-date" placeholder="MM/YY" required>
                <input type="text" style="margin-left:10px;" id="cvv" placeholder="CVV" required>
            </div>
            <label for="payment-amount">Payment Amount: <?php echo htmlentities($paymentAmount); ?> rs</label>
            <button type="submit">Pay Now</button>
        </form>
        <div class="accepted-cards">
            <img src="https://upload.wikimedia.org/wikipedia/commons/a/ac/Old_Visa_Logo.svg" alt="Visa">
            <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" alt="Mastercard">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Paypal_2014_logo.png/250px-Paypal_2014_logo.png" alt="PayPal">
        </div>
    </div>

    <div class="thank-you-message" id="thank-you-message">
        <h1>Thank You For Your Payment!</h1>
        <p>Your transaction has been processed successfully.</p>
    </div>

    <script>
    document.getElementById('payment-form').addEventListener('submit', function(event) {
        event.preventDefault();
        
        // Validate card details
        var cardNumber = document.getElementById('card-number').value;
        var expiryDate = document.getElementById('expiry-date').value;
        var cvv = document.getElementById('cvv').value;
        var cardHolder = document.getElementById('card-holder').value;
        
        if (cardNumber.trim() === '' || !(/^\d{16}$/.test(cardNumber))) {
            alert('Please enter a valid 16-digit card number.');
            return;
        }

        if (expiryDate.trim() === '' || !(/^\d{2}\/\d{2}$/.test(expiryDate))) {
            alert('Please enter a valid expiry date in MM/YY format.');
            return;
        }

        if (cvv.trim() === '' || !(/^\d{3}$/.test(cvv))) {
            alert('Please enter a valid 3-digit CVV.');
            return;
        }

        if (cardHolder.trim() === '') {
            alert('Please enter the card holder\'s name.');
            return;
        }

        setTimeout(function() {
           
            document.getElementById('payment-container').style.display = 'none';
            document.getElementById('thank-you-message').style.display = 'block';
            
            
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'payment_gateway.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                }
            };
            xhr.send('bookingId=<?php echo $bookingId; ?>');
        }, 2000); 
    });
</script>


</body>
</html>
