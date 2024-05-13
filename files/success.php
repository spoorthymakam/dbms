<?php
session_start();

// Check if success message is present in the session
if (isset($_SESSION['success_message'])) {
    echo "<div id='successCard' class='card' >
            <p class='success-message'>" . $_SESSION['success_message'] . "</p>
          </div>";

    // Remove the success message from the session
    unset($_SESSION['success_message']);
} else {
    // Redirect to admin.php if the success message is not present
    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 50px;
            color: black;
            font-size: 24px;
        }
      
        
        .card {
            background-color: white;
            border: 2px solid #00008b;
            border-radius: 10px;
            box-shadow: 5px 5px 7px 0px #0000003f;
            padding: 20px;
            margin-top: 280px;
            margin-left:150px;
            text-align: center;
            color:#00008b;
            width:75%;
            justify-content: center;
        }

        .success-message {
            font-weight: bold;
        }
    </style>
</head>
<body>
<script>
    // Function to show the success card and initiate the redirect after 5 seconds
    function showSuccessCard() {
        document.getElementById('successCard').style.display = 'block';

        // Redirect after 5 seconds
        setTimeout(function () {
            // Replace 'other-page.php' with the actual URL you want to redirect to
            window.location.href = 'admin_dash.php';
        }, 5000);
    }

    // Call the showSuccessCard function to trigger the behavior
    showSuccessCard();
</script>

<!-- Your body content remains unchanged -->

</body>
</html>
