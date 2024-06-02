<?php

if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["subject"]) && isset($_POST["message"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "contact_form";
    
    // Establishing a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Checking the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Using prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO contact_message (`name`, `email`, `subject`, `message`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    // Executing the statement
    if ($stmt->execute()) {
        echo '<script>alert("Message sent! Response will be sent through your email."); window.location.href = "index.html";</script>';
    } else {
        echo "Error: " . $stmt->error;
    }

    // Closing the statement and connection
    $stmt->close();
    $conn->close();
}
?>