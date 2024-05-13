<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Choose Departments</title>
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
      color: #00008b; /* Dark blue color */
      font-size: 35px;
      font-family: 'Roboto', sans-serif;
      margin-top:100px; /* Clean and modern sans-serif font */
    }
    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 50px;
    }

    .bubble {
      text-decoration: none; 
      border: 2px solid #00008b;/* Remove underline from rectangles */
      color:#00008b; /* Inherit text color from parent */
      width: 200px;
      height: 220px;
      border-radius: 10px; /* Rectangle border-radius */
      background: white; /* Instagram-like gradient */
      display: flex;
      justify-content: center;
      align-items: center;
      cursor: pointer;
      font-size: 30px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      box-shadow: 5px 5px 7px 0px #0000003f;
      margin-bottom: 20px;
    }

    .bubble:hover {
      transform: scale(1.1);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    /* Additional Style: Remove underline for anchor */
    .bubble a {
      text-decoration: none;
    }
  </style>
</head>
<body>
<br>
<h1 style="color:#00008b;">Select Department</h1>
<br>

<div class="container">
    <?php
    // Sample department data (replace with dynamic data from the database)
    $departments = ['CSE', 'ISE', 'EC', 'MECH'];

    // Loop through departments and generate bubbles
    foreach ($departments as $dept) {
        echo "<a href='year.php?dept=$dept' style='text-decoration: none;'>
                <div class='bubble'>$dept</div>
              </a>";
    }
    ?>
</div>
</body>
</html>