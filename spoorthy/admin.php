<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .card {
            background-color: white;
            border: 2px solid #00008b;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
            text-align: center;
         
        }

        h2 {
            color: #FFC000;
        }

        form {
            width: 100%;
        }

        .select-container {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: white;
        }

        select,
        input {
            width: calc(100% - 16px);
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }
        
        button {
            background-color: white;
            color: black;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            border: 2px solid #00008b;
        }
        
        button:hover {
            background-color:#00008b;
            color:white;
        }

        .error-message {
            color: #FF0000;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="card">
<h2 style="color:#00008b">🔗Admin Panel</h2>
<hr style="height:2px;border-width:0;color:#00008b;background-color:#00008b">
<br>
<form action="admin.php" method="post" onsubmit="return validateForm()">
    <label for="dept" style="color:#00008b;text-align: left;">Select Department:</label>
    <select name="dept" id="dept" required>
        <option value="CSE">CSE</option>
        <option value="ISE">ISE</option>
        <option value="EC">EC</option>
        <option value="MECH">MECH</option>
        <!-- Add options for other departments -->
    </select>
    <br>
    


    <label for="startDateTime" style="color:#00008b;text-align: left;">Voting Start Date and Time:</label>
    <input type="datetime-local" name="startDateTime" id="startDateTime" required>

    <label for="endDateTime" style="color:#00008b;text-align: left;">Voting End Date and Time:</label>
    <input type="datetime-local" name="endDateTime" id="endDateTime" required>

    <button type="submit">Set Voting Window</button>
</form>
    </div>

</body>
</html>
<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have obtained the selected department from the form submission
    $selectedDepartment = isset($_POST['dept']) ? $_POST['dept'] : '';
    $startDateTime = isset($_POST['startDateTime']) ? $_POST['startDateTime'] : '';
    $endDateTime = isset($_POST['endDateTime']) ? $_POST['endDateTime'] : '';

    // Department mapping
    $deptMapping = [
        'CSE' => 1,
        'ISE' => 2,
        'EC' => 3,
        'MECH' => 4,
        // Add mappings for other departments.
    ];

    // Perform database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "cr_";

    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (!array_key_exists($selectedDepartment, $deptMapping)) {
        echo "<div class='card'>
                <p class='error-message'>Invalid department: " . htmlspecialchars($selectedDepartment) . "</p>
              </div>";
    } else {
        // Convert selected department to its corresponding ID
        $selectedDeptID = $deptMapping[$selectedDepartment];

        // Check if both startDateTime and endDateTime are not empty
        if (!empty($startDateTime) && !empty($endDateTime)) {
            // Update the voting window details in the candidates table for the selected department
            $sql = "UPDATE voting_session SET voting_start = '$startDateTime', voting_end = '$endDateTime' 
                    WHERE dept_id = '$selectedDeptID'";

            if ($conn->query($sql) === TRUE) {
                $_SESSION['success_message'] = "Voting window set successfully!";
                header("Location: success.php"); // Redirect to success.php
                exit();
            } else {
                echo 
                        "<p class='error-message'>Error updating voting window: " . $conn->error . "</p>";
                      
            }
        }
    }

    // Close the database connection
    $conn->close();
}
?>
<script>
        function validateForm() {
            var startDateTime = new Date(document.getElementById("startDateTime").value);
            var endDateTime = new Date(document.getElementById("endDateTime").value);

            if (startDateTime >= endDateTime) {
                alert("Voting start time should be less than voting end time.");
                return false;
            }

            return true;
        }
    </script>