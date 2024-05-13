<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "cr_";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize user input
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Initialize variables
$error_message = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $username = sanitize_input($_POST["username"]);
    $password = sanitize_input($_POST["password"]);

    // SQL query to check user credentials
    $sql = "SELECT * FROM student WHERE username = '$username'";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result->num_rows > 0) {
        // User found, verify password
        $row = $result->fetch_assoc();
        $hashed_password = $row["hashed_password"];

        if (password_verify($password, $hashed_password)) {
            // Password is correct, user authenticated
            session_start();
            $_SESSION['username'] = $username;
            header("Location: nomination.php");
            exit();
        } else {
            $error_message = "Invalid username or password";
        }
    } else {
        $error_message = "Invalid username or password";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student_login</title>
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

.container {
    display: flex;
}

.card {
    background-color: white;
            border: 2px solid #00008b;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 5px 5px 7px 0px #0000003f ;
    width: 350px;
    
    text-align: center;
    margin: 0 10px;
}
.container::before{
    transform: scaleX(0);
}
.container::after{
    transform: scaleX(1);
}

h2 {
    color: #4285F4;
}

label {
    display: block;
    margin-top: 10px;
    color: #333;
}

input {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: white;
    color: black;
    padding: 10px;
    border: none;
    width: 100%;
    cursor: pointer;
    border-radius: 10%;
    border: 2px solid #00008b;
}
input:hover[type="submit"]
{
    background:#00008b;
    color:white;

}


    </style>
</head>
<body>
<div class="container">
        <div class="card">


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<h2 style="color:#00008b;"> 🔒Proposer Login</h2>
<hr style="height:2px;border-width:0;color:#00008b;background-color:#00008b"><br>
                <label for="username" style="color:#00008b;text-align: left;">Username:</label>
                <input type="text" name="username" placeholder="username" required class="raja">
                <label for="password" style="color:#00008b; text-align: left;">Password:</label>
                <input type="password" name="password" placeholder="password" required>
                <input type="submit" value="Login" style="height:35px; width:70px; ">
</form>
        </div>
</div>
<?php
// Display error message if authentication failed
if (!empty($error_message)) {
    echo "<p style='color: red;'>$error_message</p>";
}
?>

</body>
</html>