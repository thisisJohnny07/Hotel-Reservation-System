<?php

include("admin/inc/config.php");
include("admin/inc/functions.php");
include("admin/inc/CSRF_Protect.php");
ob_start();
session_start();

if(isset($_REQUEST['pay_booking'])) {

    /** Get all data sent from booking.php */
    $total_charges = $_POST['totalCharges'];
    $totalChargeWithoutDecimal = str_replace('.', '', (string)$total_charges);
    $totalChargeWithoutDecimal = (int)$totalChargeWithoutDecimal;
    $offerName = $_POST['offerName'];
    $memberId = $_POST['userId'];
    $offerId = $_POST['offerId'];
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];
    $accessibility = $_POST['accessibility'];
    $purpose = $_POST['purpose'];
    $arrival = $_POST['arrival'];
    $request = $_POST['request'];
    $numRooms = $_POST['numRooms'];

    /** Create new record to temporary booking table */
    $statement = $pdo->prepare("INSERT INTO temporaryReservations (memberId, offerId, checkIn, checkOut, accessibility, purpose, arrival, specialRequest, numberOfRoom) 
                            VALUES (?, ?, ?, DATE_ADD(?, INTERVAL 1 DAY), ?, ?, ?, ?, ?)");
    $statement->execute(array($memberId, $offerId, $checkIn, $checkIn, $accessibility, $purpose, $arrival, $request, $numRooms));

    // Retrieve the ID of the inserted record
    $lastInsertedId = $pdo->lastInsertId();

    // Append the ID to the success URL
    $successUrl = 'http://localhost/shangrila/successPage.php?id=' . $lastInsertedId;


    /** API post request to paymongo */
    $url = 'https://api.paymongo.com/v1/checkout_sessions';
    // Request data
    $data = array(
        'data' => array(
            'attributes' => array(
                'send_email_receipt' => false,
                'show_description' => true,
                'show_line_items' => true,
                'line_items' => array(
                    array(
                        'currency' => 'PHP',
                        'amount' => $totalChargeWithoutDecimal,
                        'description' => 'Room Deluxe',
                        'name' => $offerName,
                        'quantity' => 1
                    )
                ),
                'success_url' => $successUrl,
                'cancel_url' => 'http://localhost/shangrila/booking.php',
                'payment_method_types' => array(
                    'card',
                    'gcash',
                    'paymaya'
                ),
                'description' => 'Shangri-La The Fort, Manila Hotel '
            )
        )
    );

    // Convert data to JSON format
    $postData = json_encode($data);

    // cURL setup
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Accept: application/json',
        'Content-Type: application/json'
    ));

    // Set Basic Authentication headers
    curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_gQ8pXx5YdhodbJBZVAEV8nn6:Skoj24Skoj24!');

    // Execute the request
    $response = curl_exec($ch);

    // Check for errors
    if ($response === false) {
        echo 'cURL error: ' . curl_error($ch);
    } else {
        // Decode the JSON response
        $responseData = json_decode($response, true);

        // Output the response
        $checkoutUrl = $responseData['data']['attributes']['checkout_url'];

        // Output the checkout URL
        //echo $checkoutUrl;
        header('Location: ' . $checkoutUrl);
    }

    // Close cURL session
    curl_close($ch);
}
?>