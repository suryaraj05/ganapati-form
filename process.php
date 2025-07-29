<?php
    header('Content-Type: application/json');
    
    $to = "ssuryabackup@gmail.com";
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';
    $idol_type = isset($_POST['idol_type']) ? $_POST['idol_type'] : '';
    $size = isset($_POST['size']) ? $_POST['size'] : '';

    $subject = "New Ganesh Chaturthi 2025 Prebooking from $name";
    $headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8";

    $body = "You have received a new Ganesh Chaturthi 2025 prebooking.\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "City: $city\n";
    $body .= "Idol Type: $idol_type\n";
    $body .= "Size: $size\n";

    $send = mail($to, $subject, $body, $headers);
    
    if ($send) {
        echo json_encode(['success' => true, 'message' => 'Prebooking submitted successfully!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error sending email']);
    }
?>