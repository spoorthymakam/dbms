<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two Cards Page</title>
    <link rel="stylesheet" type="text/css" href="admin_dash.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .page {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            width: 300px;
            height: 150px;
            background-color: #F0F8FF;
            border: 2px solid #00008b; /* Blue border */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 40px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            
        }

        .card:hover {
            background-color: #F0F8FF;
        }

        .left, .right {
            font-size: 24px; /* Large text size */
        }

        .left {
            background-color: #fff; /* White background */
            color: #034694; /* Blue text color */
        }

        .right {
            background-color: #fff; /* White background */
             /* Green text color */
             color: #034694;
        }

        .logout-btn {
            margin-top:100px;
           
            background-color: #004792;
            color: #fff;
            text-decoration: none;
            border: 3px solid white;
            border-radius: 5px;
            cursor: pointer;
   
            font-size: 16px;
        }
        
    </style>
</head>
<body>


<a href="logout.php"><button class="logout-btn">Logout</button></a>
    <div class="page">
       
        <a href="admin.php" style="text-decoration: none;">
            <div class="card left">
                Set date and time
            </div>
        </a>
        <a href="dept.php" style="text-decoration: none;">
            <div class="card right">
                View Votes
            </div>
        </a>
        <a href="verification.php" style="text-decoration: none;">
            <div class="card right">
                Verification of candidates
            </div>
        </a>
    </div>
</body>
</html>