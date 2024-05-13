<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nomination Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    

    form {
      background-color:white;
      border: 2px solid #00008b;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 5px 5px 7px 0px #0000003f;
      width:400px;
      margin-top:300px;
      margin-bottom:50px;
      color:#00008b;
      
    }

    h1 {
      text-align: center;
      color: #00008b;
   
    }

    label {
      display: block;
      margin-bottom: 8px;
      color: #555;
    }

    input {
      width: 100%;
      padding: 8px;
      margin-bottom: 16px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    input[type="submit"] {
            background-color: white;
            color: black;
            padding: 10px;
            border: none;
            width: 100%;
            cursor: pointer;
            border-radius: 2%;
            border: 2px solid #00008b;
        }

        input:hover[type="submit"] {
            background:#00008b;
            color:white;
        }
  
  </style>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cr_";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $proposer_name = $_POST['proposer_name'];
    $proposer_usn = $_POST['proposer_usn'];

    $candidate_name = $_POST['candidate_name'];
    $candidate_usn = $_POST['candidate_usn'];
    $candidate_year = $_POST['candidate_year'];
    $candidate_department = $_POST['candidate_department'];
    $candidate_college = $_POST['candidate_college'];

    $checkSql = "SELECT * FROM nominations 
                 WHERE proposer_usn = '$proposer_usn' AND candidate_usn = '$candidate_usn'";
    $checkResult = $conn->query($checkSql);
    
    if ($checkResult->num_rows == 0) {
    // SQL to insert data into the database
    $sql = "INSERT INTO nominations (proposer_name, proposer_usn, candidate_name, candidate_usn, candidate_year, candidate_department, candidate_college)
            VALUES ('$proposer_name', '$proposer_usn', '$candidate_name', '$candidate_usn', '$candidate_year', '$candidate_department', '$candidate_college')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Nomination submitted successfully!</p>";
        $conn->close();

        // Redirect to another page using JavaScript
        echo '<script type="text/javascript">
        setTimeout(function() {
            window.location = "index.php";
        }, 5000);
      </script>';
        exit;
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
  }
    else {
      // Combination already exists, show an error message
      echo "<p>Error: This proposer and candidate combination already exists.</p>";
  }

    // Close the connection
    $conn->close();
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <h1 style="font-size: 25px;">Nomination Form</h1>
  <hr style="height:2px;border-width:0;color:#00008b;background-color:#00008b">
  
  <!-- Proposer Information -->
  <h2 style="font-size: 20px;">Proposer Information</h2>
  <label for="proposer_name">Proposer Name:</label>
  <input type="text" id="proposer_name" name="proposer_name" required>

  <label for="proposer_usn">Proposer USN:</label>
  <input type="text" id="proposer_usn" name="proposer_usn" required>

  <!-- Candidate Information -->
  <h2 style="font-size: 20px;">Candidate Information</h2>
  <label for="candidate_name">Candidate Name:</label>
  <input type="text" id="candidate_name" name="candidate_name" required>

  <label for="candidate_usn">Candidate USN:</label>
  <input type="text" id="candidate_usn" name="candidate_usn" required>

  <label for="candidate_year">Candidate Year:</label>
  <input type="text" id="candidate_year" name="candidate_year" required>

  <label for="candidate_department">Candidate Department:</label>
  <select id="candidate_department" name="candidate_department" required>
    <option value="1">CSE</option>
    <option value="2">ISE</option>
    <option value="3">EC</option>
    <option value="4">MECH</option>
   
  </select>

  <label for="candidate_college">Candidate College:</label>
  <input type="text" id="candidate_college" name="candidate_college" required>

  <input type="submit" value="Submit">
</form>

</body>
</html>