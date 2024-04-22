<?php
session_start();
error_reporting(0);
include('includes/config.php');

// Check if the booking ID is provided in the URL
if (isset($_GET['bkid'])) {
    // Get the booking ID from the URL
    $bookingId = intval($_GET['bkid']);

    // Fetch booking details from the database based on the provided booking ID
    $sql = "SELECT * FROM tblbooking WHERE BookingId = :bookingId";
    $query = $dbh->prepare($sql);
    $query->bindParam(':bookingId', $bookingId, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    // Check if the booking exists
    if ($result) {
        // Extract booking details
        $pkgid = $result['PackageId'];
        $email = $result['UserEmail'];
        $fromDate = $result['FromDate'];
        $toDate = $result['ToDate'];
        $comment = $result['Comment'];
        $status = $result['status'];

        // Calculate total price (if applicable)
        // Assuming you have a price stored in the database
       

         // Fetch tour package details based on PackageId
        $packageSql = "SELECT * FROM tbltourpackages WHERE PackageId = :pkgid";
        $packageQuery = $dbh->prepare($packageSql);
        $packageQuery->bindParam(':pkgid', $pkgid, PDO::PARAM_INT); // Corrected binding
        $packageQuery->execute();
        $packageResult = $packageQuery->fetch(PDO::FETCH_ASSOC);

        // Check if the package exists
        if ($packageResult) {
            // Extract tour package details
            $packageName = $packageResult['PackageName'];
            $packageType = $packageResult['PackageType'];
            $packageLocation = $packageResult['PackageLocation'];
            $packageDur = $packageResult['days'];
         
            $totalPrice = $packageResult['PackagePrice'];

        
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Booking Receipt</title>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
}
.container {
    width: 210mm; /* A4 width */
    max-width: 100%;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    box-sizing: border-box;
    page-break-inside: avoid; /* Avoid breaking container across pages */
}
.logo {
    display: block;
    margin: 0 auto;
    width: 120px;
    margin-bottom: 20px;
}
.receipt-header {
    text-align: center;
    margin-bottom: 20px;
}
.receipt-header h1 {
    color: #333;
    font-weight: 700;
    text-transform: uppercase;
    margin: 0;
}
.receipt-info table {
    width: 100%;
    border-collapse: collapse;
}
.receipt-info th,
.receipt-info td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
}
.receipt-info th {
    background-color: #f2f2f2;
}
.total p {
    font-size: 18px;
    font-weight: 700;
    color: #333;
    margin: 0;
}
.thank-you {
    text-align: center;
    margin-top: 20px;
    font-style: italic;
    color: #666;
}
</style>

</head>
<body>

<div class="container">
    <img src="assets/img/favicon.png" alt="Company Logo" class="logo">
    <div class="receipt-header">
        <h1>Booking Receipt</h1>
    </div>
    <div class="receipt-info">
        <table>
            <tr>
                <th>Booking ID</th>
                <td>#BK-<?php echo htmlentities($bookingId); ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo htmlentities($email); ?></td>
            </tr>
            <tr>
                <th>Package Name</th>
                <td><?php echo htmlentities($packageName); ?></td>
            </tr>
            <tr>
                <th>Package Type</th>
                <td><?php echo htmlentities($packageType); ?></td>
            </tr>
            <tr>
                <th>Package Location</th>
                <td><?php echo htmlentities($packageLocation); ?></td>
            </tr>
            <tr>
                <th>Package Duration</th>
                <td><?php echo htmlentities($packageDur); ?> Days</td>
            </tr>
            <tr>
                <th>From Date</th>
                <td><?php echo htmlentities($fromDate); ?></td>
            </tr>
            <tr>
                <th>To Date</th>
                <td><?php echo htmlentities($toDate); ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td><?php echo ($status == 0) ? "Pending" : (($status == 1) ? "Confirmed" : "Cancelled"); ?></td>
            </tr>
        </table>
    </div>
    <br>
    <div class="total">
        <?php if (isset($totalPrice)) { ?>
            <p><strong>Total Price:</strong> <?php echo htmlentities($totalPrice); ?> Rs</p>
        <?php } ?>
    </div>
    <p class="thank-you">Thank you for your booking!</p>
</div>

<script>
// Automatically trigger printing when the page is loaded
window.onload = function() {
    window.print();
};
</script>

</body>
</html>



<?php
} else {
            // Tour package not found
            echo "Tour package not found.";
        }  
    } else {
        // Booking not found
        echo "Booking not found.";
    }
} else {
    // Booking ID not provided in the URL
    echo "Booking ID not provided.";
}
?>
