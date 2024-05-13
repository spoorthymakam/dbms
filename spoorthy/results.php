<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Election Results</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background-color: #f2f2f2;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
      align-items: center;
      gap: 20px; /* Added gap between cards */
    }

    .card {
      border: 2px solid #00008b; /* Instagram color */
      border-radius: 8px;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 300px;
      max-width: 80%;
    }

    h2 {
      color: #00008b; /* Instagram color */
      margin-bottom: 10px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: center;
    }
  </style>
<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<script src="script.js"></script>
</head>
<body>
    <div id=invoice>
<?php
    // Replace these with your actual database connection parameters
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



  echo '<div class="container">';
   echo' <div class="card">
      <h2>CS Branch</h2>
      <table>
        <tr>
          <th>Year</th>
          <th>CR Winner</th>
        </tr>';
      
        $department = 1;
$year = 1;

// Fetch the voting session end time for the current department
$sql_voting_end = "SELECT voting_end FROM voting_session WHERE dept_id = '$department'";
$result_voting_end = $conn->query($sql_voting_end);

if ($result_voting_end->num_rows > 0)
 {
    $row_voting_end = $result_voting_end->fetch_assoc();
    $voting_end_time = strtotime($row_voting_end['voting_end']);
    $current_time = time();

    // Check if the current time is after the voting session end time
    if ($current_time > $voting_end_time) {
        // Fetch the candidate with the highest number of votes for the current department and year
        $sql_highest_votes = "SELECT candidate_name, MAX(no_of_votes) AS max_votes 
                              FROM verified_nominations 
                              WHERE candidate_department = '$department' AND candidate_year = '$year'";
        $result_highest_votes = $conn->query($sql_highest_votes);
        if ($result_highest_votes->num_rows > 0) 
        {
            $row_highest_votes = $result_highest_votes->fetch_assoc();
            $candidate_name = $row_highest_votes['candidate_name'];
            $max_votes = $row_highest_votes['max_votes'];
            echo'<tr>
          <td>1st</td>
          <td>' .$candidate_name.'</td>
        </tr>';
        }
        else {
        echo'<tr>
        <td>1st</td>
        <td colspan="2">No result Found</td>
      </tr>';
        }
    }
        else{
            echo '<tr><td colspan="2">Voting is ongoing</td></tr>';
        }
    }
    else{
        echo '<tr><td colspan="2">Voting end time not available</td></tr>';
    }

 

  $department = 1;
$year = 2;

// Fetch the voting session end time for the current department
$sql_voting_end = "SELECT voting_end FROM voting_session WHERE dept_id = '$department'";
$result_voting_end = $conn->query($sql_voting_end);

if ($result_voting_end->num_rows > 0) {
$row_voting_end = $result_voting_end->fetch_assoc();
$voting_end_time = strtotime($row_voting_end['voting_end']);
$current_time = time();

// Check if the current time is after the voting session end time
if ($current_time > $voting_end_time) {
  // Fetch the candidate with the highest number of votes for the current department and year
  $sql_highest_votes = "SELECT candidate_name, MAX(no_of_votes) AS max_votes 
                        FROM verified_nominations 
                        WHERE candidate_department = '$department' AND candidate_year = '$year'";
  $result_highest_votes = $conn->query($sql_highest_votes);
  if ($result_highest_votes->num_rows > 0) {
      $row_highest_votes = $result_highest_votes->fetch_assoc();
      $candidate_name = $row_highest_votes['candidate_name'];
      $max_votes = $row_highest_votes['max_votes'];
      echo'<tr>
    <td>2nd</td>
    <td>' .$candidate_name.'</td>
  </tr>';
  }
  else {
  echo'<tr>
  <td colspan="2">No result Found</td>
</tr>';
  }
}
  else{
      echo '<tr><td colspan="2">Voting is ongoing</td></tr>';
  }
}
else{
  echo '<tr><td colspan="2">Voting end time not available</td></tr>';
}

$department = 1;
$year = 3;

// Fetch the voting session end time for the current department
$sql_voting_end = "SELECT voting_end FROM voting_session WHERE dept_id = '$department'";
$result_voting_end = $conn->query($sql_voting_end);

if ($result_voting_end->num_rows > 0) {
$row_voting_end = $result_voting_end->fetch_assoc();
$voting_end_time = strtotime($row_voting_end['voting_end']);
$current_time = time();

// Check if the current time is after the voting session end time
if ($current_time > $voting_end_time) {
  // Fetch the candidate with the highest number of votes for the current department and year
  $sql_highest_votes = "SELECT candidate_name, MAX(no_of_votes) AS max_votes 
                        FROM verified_nominations 
                        WHERE candidate_department = '$department' AND candidate_year = '$year'";
  $result_highest_votes = $conn->query($sql_highest_votes);
  if ($result_highest_votes->num_rows > 0) {
      $row_highest_votes = $result_highest_votes->fetch_assoc();
      $candidate_name = $row_highest_votes['candidate_name'];
      $max_votes = $row_highest_votes['max_votes'];
      echo'<tr>
    <td>3rd</td>
    <td>' .$candidate_name.'</td>
  </tr>';
  }
  else {
  echo'<tr>
  <td colspan="2">No result Found</td>
</tr>';
  }
}
  else{
      echo '<tr><td colspan="2">Voting is ongoing</td></tr>';
  }
}
else{
  echo '<tr><td colspan="2">Voting end time not available</td></tr>';
}

          
$department = 1;
$year = 4;

// Fetch the voting session end time for the current department
$sql_voting_end = "SELECT voting_end FROM voting_session WHERE dept_id = '$department'";
$result_voting_end = $conn->query($sql_voting_end);

if ($result_voting_end->num_rows > 0) {
$row_voting_end = $result_voting_end->fetch_assoc();
$voting_end_time = strtotime($row_voting_end['voting_end']);
$current_time = time();

// Check if the current time is after the voting session end time
if ($current_time > $voting_end_time) {
  // Fetch the candidate with the highest number of votes for the current department and year
  $sql_highest_votes = "SELECT candidate_name, MAX(no_of_votes) AS max_votes 
                        FROM verified_nominations 
                        WHERE candidate_department = '$department' AND candidate_year = '$year'";
  $result_highest_votes = $conn->query($sql_highest_votes);
  if ($result_highest_votes->num_rows > 0) {
      $row_highest_votes = $result_highest_votes->fetch_assoc();
      $candidate_name = $row_highest_votes['candidate_name'];
      $max_votes = $row_highest_votes['max_votes'];
      echo'<tr>
    <td>4th</td>
    <td>' .$candidate_name.'</td>
  </tr>';
  }
  else {
  echo'<tr>
  <td colspan="2">No result Found</td>
</tr>';
  }
}
  else{
      echo '<tr><td colspan="2">Voting is ongoing</td></tr>';
  }
}
else{
  echo '<tr><td colspan="2">Voting end time not available</td></tr>';
}

      echo   '</table>';
   echo' </div>';



   echo' <div class="card">
      <h2>IS Branch</h2>
      <table>
        <tr>
          <th>Year</th>
          <th>CR Winner</th>
        </tr>';
      
        $department = 2;
$year = 1;

// Fetch the voting session end time for the current department
$sql_voting_end = "SELECT voting_end FROM voting_session WHERE dept_id = '$department'";
$result_voting_end = $conn->query($sql_voting_end);

if ($result_voting_end->num_rows > 0) {
    $row_voting_end = $result_voting_end->fetch_assoc();
    $voting_end_time = strtotime($row_voting_end['voting_end']);
    $current_time = time();

    // Check if the current time is after the voting session end time
    if ($current_time > $voting_end_time) {
        // Fetch the candidate with the highest number of votes for the current department and year
        $sql_highest_votes = "SELECT candidate_name, MAX(no_of_votes) AS max_votes 
                              FROM verified_nominations 
                              WHERE candidate_department = '$department' AND candidate_year = '$year'";
        $result_highest_votes = $conn->query($sql_highest_votes);
        if ($result_highest_votes->num_rows > 0) {
            $row_highest_votes = $result_highest_votes->fetch_assoc();
            $candidate_name = $row_highest_votes['candidate_name'];
            $max_votes = $row_highest_votes['max_votes'];
            echo'<tr>
          <td>1st</td>
          <td>' .$candidate_name.'</td>
        </tr>';
        }
        else {
        echo'<tr>
        <td>1st</td>
        <td colspan="2">No result Found</td>
      </tr>';
        }
    }
        else{
            echo '<tr><td colspan="2">Voting is ongoing</td></tr>';
        }
    }
    else{
        echo '<tr><td colspan="2">Voting end time not available</td></tr>';
    }

 

  $department = 2;
$year = 2;

// Fetch the voting session end time for the current department
$sql_voting_end = "SELECT voting_end FROM voting_session WHERE dept_id = '$department'";
$result_voting_end = $conn->query($sql_voting_end);

if ($result_voting_end->num_rows > 0) {
$row_voting_end = $result_voting_end->fetch_assoc();
$voting_end_time = strtotime($row_voting_end['voting_end']);
$current_time = time();

// Check if the current time is after the voting session end time
if ($current_time > $voting_end_time) {
  // Fetch the candidate with the highest number of votes for the current department and year
  $sql_highest_votes = "SELECT candidate_name, MAX(no_of_votes) AS max_votes 
                        FROM verified_nominations 
                        WHERE candidate_department = '$department' AND candidate_year = '$year'";
  $result_highest_votes = $conn->query($sql_highest_votes);
  if ($result_highest_votes->num_rows > 0) {
      $row_highest_votes = $result_highest_votes->fetch_assoc();
      $candidate_name = $row_highest_votes['candidate_name'];
      $max_votes = $row_highest_votes['max_votes'];
      echo'<tr>
    <td>2nd</td>
    <td>' .$candidate_name.'</td>
  </tr>';
  }
  else {
  echo'<tr>
  <td colspan="2">No result Found</td>
</tr>';
  }
}
  else{
      echo '<tr><td colspan="2">Voting is ongoing</td></tr>';
  }
}
else{
  echo '<tr><td colspan="2">Voting end time not available</td></tr>';
}

$department = 2;
$year = 3;

// Fetch the voting session end time for the current department
$sql_voting_end = "SELECT voting_end FROM voting_session WHERE dept_id = '$department'";
$result_voting_end = $conn->query($sql_voting_end);

if ($result_voting_end->num_rows > 0) {
$row_voting_end = $result_voting_end->fetch_assoc();
$voting_end_time = strtotime($row_voting_end['voting_end']);
$current_time = time();

// Check if the current time is after the voting session end time
if ($current_time > $voting_end_time) {
  // Fetch the candidate with the highest number of votes for the current department and year
  $sql_highest_votes = "SELECT candidate_name, MAX(no_of_votes) AS max_votes 
                        FROM verified_nominations 
                        WHERE candidate_department = '$department' AND candidate_year = '$year'";
  $result_highest_votes = $conn->query($sql_highest_votes);
  if ($result_highest_votes->num_rows > 0) {
      $row_highest_votes = $result_highest_votes->fetch_assoc();
      $candidate_name = $row_highest_votes['candidate_name'];
      $max_votes = $row_highest_votes['max_votes'];
      echo'<tr>
    <td>3rd</td>
    <td>' .$candidate_name.'</td>
  </tr>';
  }
  else {
  echo'<tr>
  <td colspan="2">No result Found</td>
</tr>';
  }
}
  else{
      echo '<tr><td colspan="2">Voting is ongoing</td></tr>';
  }
}
else{
  echo '<tr><td colspan="2">Voting end time not available</td></tr>';
}

          
$department = 2;
$year = 4;

// Fetch the voting session end time for the current department
$sql_voting_end = "SELECT voting_end FROM voting_session WHERE dept_id = '$department'";
$result_voting_end = $conn->query($sql_voting_end);

if ($result_voting_end->num_rows > 0) {
$row_voting_end = $result_voting_end->fetch_assoc();
$voting_end_time = strtotime($row_voting_end['voting_end']);
$current_time = time();

// Check if the current time is after the voting session end time
if ($current_time > $voting_end_time) {
  // Fetch the candidate with the highest number of votes for the current department and year
  $sql_highest_votes = "SELECT candidate_name, MAX(no_of_votes) AS max_votes 
                        FROM verified_nominations 
                        WHERE candidate_department = '$department' AND candidate_year = '$year'";
  $result_highest_votes = $conn->query($sql_highest_votes);
  if ($result_highest_votes->num_rows > 0) {
      $row_highest_votes = $result_highest_votes->fetch_assoc();
      $candidate_name = $row_highest_votes['candidate_name'];
      $max_votes = $row_highest_votes['max_votes'];
      echo'<tr>
    <td>4th</td>
    <td>' .$candidate_name.'</td>
  </tr>';
  }
  else {
  echo'<tr>
  <td colspan="2">No result Found</td>
</tr>';
  }
}
  else{
      echo '<tr><td colspan="2">Voting is ongoing</td></tr>';
  }
}
else{
  echo '<tr><td colspan="2">Voting end time not available</td></tr>';
}

      echo   '</table>';
   echo' </div>';

   echo' <div class="card">
      <h2>EC Branch</h2>
      <table>
        <tr>
          <th>Year</th>
          <th>CR Winner</th>
        </tr>';
      
        $department = 3;
$year = 1;

// Fetch the voting session end time for the current department
$sql_voting_end = "SELECT voting_end FROM voting_session WHERE dept_id = '$department'";
$result_voting_end = $conn->query($sql_voting_end);

if ($result_voting_end->num_rows > 0) {
    $row_voting_end = $result_voting_end->fetch_assoc();
    $voting_end_time = strtotime($row_voting_end['voting_end']);
    $current_time = time();

    // Check if the current time is after the voting session end time
    if ($current_time > $voting_end_time) {
        // Fetch the candidate with the highest number of votes for the current department and year
        $sql_highest_votes = "SELECT candidate_name, MAX(no_of_votes) AS max_votes 
                              FROM verified_nominations 
                              WHERE candidate_department = '$department' AND candidate_year = '$year'";
        $result_highest_votes = $conn->query($sql_highest_votes);
        if ($result_highest_votes->num_rows > 0) {
            $row_highest_votes = $result_highest_votes->fetch_assoc();
            $candidate_name = $row_highest_votes['candidate_name'];
            $max_votes = $row_highest_votes['max_votes'];
            echo'<tr>
          <td>1st</td>
          <td>' .$candidate_name.'</td>
        </tr>';
        }
        else {
        echo'<tr>
        <td>1st</td>
        <td colspan="2">No result Found</td>
      </tr>';
        }
    }
        else{
            echo '<tr><td colspan="2">Voting is ongoing</td></tr>';
        }
    }
    else{
        echo '<tr><td colspan="2">Voting end time not available</td></tr>';
    }

 

  $department = 3;
$year = 2;

// Fetch the voting session end time for the current department
$sql_voting_end = "SELECT voting_end FROM voting_session WHERE dept_id = '$department'";
$result_voting_end = $conn->query($sql_voting_end);

if ($result_voting_end->num_rows > 0) {
$row_voting_end = $result_voting_end->fetch_assoc();
$voting_end_time = strtotime($row_voting_end['voting_end']);
$current_time = time();

// Check if the current time is after the voting session end time
if ($current_time > $voting_end_time) {
  // Fetch the candidate with the highest number of votes for the current department and year
  $sql_highest_votes = "SELECT candidate_name, MAX(no_of_votes) AS max_votes 
                        FROM verified_nominations 
                        WHERE candidate_department = '$department' AND candidate_year = '$year'";
  $result_highest_votes = $conn->query($sql_highest_votes);
  if ($result_highest_votes->num_rows > 0) {
      $row_highest_votes = $result_highest_votes->fetch_assoc();
      $candidate_name = $row_highest_votes['candidate_name'];
      $max_votes = $row_highest_votes['max_votes'];
      echo'<tr>
    <td>2nd</td>
    <td>' .$candidate_name.'</td>
  </tr>';
  }
  else {
  echo'<tr>
  <td colspan="2">No result Found</td>
</tr>';
  }
}
  else{
      echo '<tr><td colspan="2">Voting is ongoing</td></tr>';
  }
}
else{
  echo '<tr><td colspan="2">Voting end time not available</td></tr>';
}

$department = 3;
$year = 3;

// Fetch the voting session end time for the current department
$sql_voting_end = "SELECT voting_end FROM voting_session WHERE dept_id = '$department'";
$result_voting_end = $conn->query($sql_voting_end);

if ($result_voting_end->num_rows > 0) {
$row_voting_end = $result_voting_end->fetch_assoc();
$voting_end_time = strtotime($row_voting_end['voting_end']);
$current_time = time();

// Check if the current time is after the voting session end time
if ($current_time > $voting_end_time) {
  // Fetch the candidate with the highest number of votes for the current department and year
  $sql_highest_votes = "SELECT candidate_name, MAX(no_of_votes) AS max_votes 
                        FROM verified_nominations 
                        WHERE candidate_department = '$department' AND candidate_year = '$year'";
  $result_highest_votes = $conn->query($sql_highest_votes);
  if ($result_highest_votes->num_rows > 0) {
      $row_highest_votes = $result_highest_votes->fetch_assoc();
      $candidate_name = $row_highest_votes['candidate_name'];
      $max_votes = $row_highest_votes['max_votes'];
      echo'<tr>
    <td>3rd</td>
    <td>' .$candidate_name.'</td>
  </tr>';
  }
  else {
  echo'<tr>
  <td colspan="2">No result Found</td>
</tr>';
  }
}
  else{
      echo '<tr><td colspan="2">Voting is ongoing</td></tr>';
  }
}
else{
  echo '<tr><td colspan="2">Voting end time not available</td></tr>';
}

          
$department = 3;
$year = 4;

// Fetch the voting session end time for the current department
$sql_voting_end = "SELECT voting_end FROM voting_session WHERE dept_id = '$department'";
$result_voting_end = $conn->query($sql_voting_end);

if ($result_voting_end->num_rows > 0) {
$row_voting_end = $result_voting_end->fetch_assoc();
$voting_end_time = strtotime($row_voting_end['voting_end']);
$current_time = time();

// Check if the current time is after the voting session end time
if ($current_time > $voting_end_time) {
  // Fetch the candidate with the highest number of votes for the current department and year
  $sql_highest_votes = "SELECT candidate_name, MAX(no_of_votes) AS max_votes 
                        FROM verified_nominations 
                        WHERE candidate_department = '$department' AND candidate_year = '$year'";
  $result_highest_votes = $conn->query($sql_highest_votes);
  if ($result_highest_votes->num_rows > 0) {
      $row_highest_votes = $result_highest_votes->fetch_assoc();
      $candidate_name = $row_highest_votes['candidate_name'];
      $max_votes = $row_highest_votes['max_votes'];
      echo'<tr>
    <td>4th</td>
    <td>' .$candidate_name.'</td>
  </tr>';
  }
  else {
  echo'<tr>
  <td colspan="2">No result Found</td>
</tr>';
  }
}
  else{
      echo '<tr><td colspan="2">Voting is ongoing</td></tr>';
  }
}
else{
  echo '<tr><td colspan="2">Voting end time not available</td></tr>';
}

      echo   '</table>';
   echo' </div>';

   echo' <div class="card">
      <h2>MECH Branch</h2>
      <table>
        <tr>
          <th>Year</th>
          <th>CR Winner</th>
        </tr>';
      
        $department = 4;
$year = 1;

// Fetch the voting session end time for the current department
$sql_voting_end = "SELECT voting_end FROM voting_session WHERE dept_id = '$department'";
$result_voting_end = $conn->query($sql_voting_end);

if ($result_voting_end->num_rows > 0) {
    $row_voting_end = $result_voting_end->fetch_assoc();
    $voting_end_time = strtotime($row_voting_end['voting_end']);
    $current_time = time();

    // Check if the current time is after the voting session end time
    if ($current_time > $voting_end_time) {
        // Fetch the candidate with the highest number of votes for the current department and year
        $sql_highest_votes = "SELECT candidate_name, MAX(no_of_votes) AS max_votes 
                              FROM verified_nominations 
                              WHERE candidate_department = '$department' AND candidate_year = '$year'";
        $result_highest_votes = $conn->query($sql_highest_votes);
        if ($result_highest_votes->num_rows > 0) {
            $row_highest_votes = $result_highest_votes->fetch_assoc();
            $candidate_name = $row_highest_votes['candidate_name'];
            $max_votes = $row_highest_votes['max_votes'];
            echo'<tr>
          <td>1st</td>
          <td>' .$candidate_name.'</td>
        </tr>';
        }
        else {
        echo'<tr>
        <td>1st</td>
        <td colspan="2">No result Found</td>
      </tr>';
        }
    }
        else{
            echo '<tr><td colspan="2">Voting is ongoing</td></tr>';
        }
    }
    else{
        echo '<tr><td colspan="2">Voting end time not available</td></tr>';
    }

 

  $department = 4;
$year = 2;

// Fetch the voting session end time for the current department
$sql_voting_end = "SELECT voting_end FROM voting_session WHERE dept_id = '$department'";
$result_voting_end = $conn->query($sql_voting_end);

if ($result_voting_end->num_rows > 0) {
$row_voting_end = $result_voting_end->fetch_assoc();
$voting_end_time = strtotime($row_voting_end['voting_end']);
$current_time = time();

// Check if the current time is after the voting session end time
if ($current_time > $voting_end_time) {
  // Fetch the candidate with the highest number of votes for the current department and year
  $sql_highest_votes = "SELECT candidate_name, MAX(no_of_votes) AS max_votes 
                        FROM verified_nominations 
                        WHERE candidate_department = '$department' AND candidate_year = '$year'";
  $result_highest_votes = $conn->query($sql_highest_votes);
  if ($result_highest_votes->num_rows > 0) {
      $row_highest_votes = $result_highest_votes->fetch_assoc();
      $candidate_name = $row_highest_votes['candidate_name'];
      $max_votes = $row_highest_votes['max_votes'];
      echo'<tr>
    <td>2nd</td>
    <td>' .$candidate_name.'</td>
  </tr>';
  }
  else {
  echo'<tr>
  <td colspan="2">No result Found</td>
</tr>';
  }
}
  else{
      echo '<tr><td colspan="2">Voting is ongoing</td></tr>';
  }
}
else{
  echo '<tr><td colspan="2">Voting end time not available</td></tr>';
}

$department = 4;
$year = 3;

// Fetch the voting session end time for the current department
$sql_voting_end = "SELECT voting_end FROM voting_session WHERE dept_id = '$department'";
$result_voting_end = $conn->query($sql_voting_end);

if ($result_voting_end->num_rows > 0) {
$row_voting_end = $result_voting_end->fetch_assoc();
$voting_end_time = strtotime($row_voting_end['voting_end']);
$current_time = time();

// Check if the current time is after the voting session end time
if ($current_time > $voting_end_time) {
  // Fetch the candidate with the highest number of votes for the current department and year
  $sql_highest_votes = "SELECT candidate_name, MAX(no_of_votes) AS max_votes 
                        FROM verified_nominations 
                        WHERE candidate_department = '$department' AND candidate_year = '$year'";
  $result_highest_votes = $conn->query($sql_highest_votes);
  if ($result_highest_votes->num_rows > 0) {
      $row_highest_votes = $result_highest_votes->fetch_assoc();
      $candidate_name = $row_highest_votes['candidate_name'];
      $max_votes = $row_highest_votes['max_votes'];
      echo'<tr>
    <td>3rd</td>
    <td>' .$candidate_name.'</td>
  </tr>';
  }
  else {
  echo'<tr>
  <td colspan="2">No result Found</td>
</tr>';
  }
}
  else{
      echo '<tr><td colspan="2">Voting is ongoing</td></tr>';
  }
}
else{
  echo '<tr><td colspan="2">Voting end time not available</td></tr>';
}

          
$department = 4;
$year = 4;

// Fetch the voting session end time for the current department
$sql_voting_end = "SELECT voting_end FROM voting_session WHERE dept_id = '$department'";
$result_voting_end = $conn->query($sql_voting_end);

if ($result_voting_end->num_rows > 0) 
{
$row_voting_end = $result_voting_end->fetch_assoc();
$voting_end_time = strtotime($row_voting_end['voting_end']);
$current_time = time();

// Check if the current time is after the voting session end time
if ($current_time > $voting_end_time)
 {
  // Fetch the candidate with the highest number of votes for the current department and year
  $sql_highest_votes = "SELECT candidate_name, MAX(no_of_votes) AS max_votes 
                        FROM verified_nominations 
                        WHERE candidate_department = '$department' AND candidate_year = '$year'";
  $result_highest_votes = $conn->query($sql_highest_votes);
  if ($result_highest_votes->num_rows > 0) 
  {
      $row_highest_votes = $result_highest_votes->fetch_assoc();
      $candidate_name = $row_highest_votes['candidate_name'];
      $max_votes = $row_highest_votes['max_votes'];
      echo'<tr>
    <td>4th</td>
    <td>' .$candidate_name.'</td>
  </tr>';
  }
  else {
  echo'<tr>
  <td colspan="2">No result Found</td>
</tr>';
  }
}
  else{
      echo '<tr><td colspan="2">Voting is ongoing</td></tr>';
  }
}
else{
  echo '<tr><td colspan="2">Voting end time not available</td></tr>';
}

      echo   '</table>';
   echo' </div>';
   echo '<div style="position: fixed; bottom: 50px; right: 50px;">
   <a href="download_results.php" download >
   <button style="padding: 10px; background-color: #00008b; color: #fff; border: none; border-radius: 5px; cursor: pointer;" onclick="generatePDF ()">Download Results</button>
   </a> 
 </div>';

?>
</div>

</body>
</html>