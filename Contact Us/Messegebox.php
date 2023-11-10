<html>
<head>
<title>Packages From PH77P</title>
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pixcelencedb";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $textarea = $_POST["textarea"];

        $sqlcus = "INSERT INTO messageinbox (FirstName, LastName, Email, Phone, TextArea)
            VALUES ('$fname', '$lname', '$email', '$phone', '$textarea')";

        if ($conn->query($sqlcus) === TRUE) {
            echo "<h2 style='color: blue; text-align: center;'>We have received your message and would like to thank you for writing to us. If your inquiry is urgent, please use the telephone number listed below to talk to one of our pixelence staff members. Otherwise, we will reply by email as soon as possible.</h2>";
        } else {
            echo "<h2 style='color: red; text-align: center;'>Error: Your message was not sent! Try again later. If your inquiry is urgent, please use the telephone number listed below to contact us immediately.</h2>" . $conn->error;
        }
    }

    $conn->close();
    ?>
</body>
</html>
