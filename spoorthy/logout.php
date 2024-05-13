<!-- logout.php -->

<?php
// Start or resume the session
session_start();

// Set a session message for successful logout
$_SESSION['logout_message'] = "Logout successful.";

// Destroy the session
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .message {
            background-color: #483d8b;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 5px 5px 7px 0px #0000003f;
            width: 300px;
            text-align: center;
            margin: 0 10px;
            color: white;
        }
    </style>
    <script>
        // Display logout message with a delay
        document.addEventListener('DOMContentLoaded', function() {
            var logoutMessage = "<?php echo $_SESSION['logout_message']; ?>";
            var messageElement = document.createElement('div');
            messageElement.classList.add('message');
            messageElement.textContent = logoutMessage;
            document.body.appendChild(messageElement);
            
            setTimeout(function() {
                messageElement.style.display = 'none';
                window.location.href = "index.php";
            }, 3000);
        });
    </script>
</head>
<body>
</body>
</html>