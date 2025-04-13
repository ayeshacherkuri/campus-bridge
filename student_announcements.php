<?php

require_once('db3.php');
$query = "select * from notifi";
$result = mysqli_query($conn,$query);
$json_array = array();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
          @import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap");

/* Reset margin and padding */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Ubuntu", sans-serif;
}
        .maindiv {
            height: 500px;
            width: 850px;
            /* background-color: white; */
            margin-top: 50px;
            margin-left: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .clipboard {
            position: relative;
            height: 500px;
            width: 500px;
            background-color: white;
            
            /* margin: 25px; */
            box-shadow: 0 0 10px #4a69bd;
            transition: transform 0.3s; /* Smooth transition */
        }
        .clipboard:hover {
            transform: scale(1.05); /* Scale up on hover */
        }
        .clip-icon {
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #4a69bd;
            color: white;
            height: 60px;
            width: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
        .clip-icon svg {
            width: 30px;
            height: 30px;
            fill: white;
        }
        h2 {
            margin-top: 50px;
            margin-left: 95px;
        }
        body{
    height: 100%;
    margin: 0;
    background-color: aliceblue;
}
a{
    text-decoration: none;
}
.navbar {
    display: flex;
    justify-content: space-between;
    background-color: white;
    padding: 10px;
    height: 60px;
}

.navbar a {
    margin: 0 25px;
    text-decoration: none;
    margin-top: 20px;
    color: #333;
    font-size: 16px;
}

.navbar a:hover {
    color: #007bff;
}
.profile{
    position: relative;
    top: 0;
    margin-top: 0;
    width: 300px;
    background-color:white;
    height: 1000px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px ;
}
.profile_info {
    text-align: left;
    line-height: 3;
    margin-left: 40px;
    margin-top: 70px;
}
.icon{
    height: 35px;
    width: 35px;
    border-radius: 50%;
}
.page{
    display: flex;
}
ul{
    margin-left:60px;
    margin-top:30px;
}
.clipboard-content {
            max-height: 300px; 
            overflow-y: auto;
            padding: 10px;
}
 </style>
</head>
<body>
<head>
        <nav class="navbar">
            <a href="student.php"><i class="fa-solid fa-house"></i>&nbsp;&nbsp;&nbsp;Home</a>
            <a href="studentattendence.php"><i class="fa-solid fa-calendar-day"></i>&nbsp;&nbsp;&nbsp;Time Table</a>
            <a href="student_result.php"><i class="fa-solid fa-print"></i>&nbsp;&nbsp;&nbsp;Examination</a>
            <a href="student_announcements.php"><i class="fa-solid fa-microphone"></i>&nbsp;&nbsp;&nbsp;Announcements</a>
            <a href="chat.php">
                <span class="icon">
                    <ion-icon name="help-outline"></ion-icon>
                </span>
                <span class="title">Doubts</span>
            </a>
            <a href="try.php"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;&nbsp;&nbsp;Logout</a>
        </nav>
    </head>
    <br><br>
    <div class="page">
    <div class="profile">
        <hr color="black">
        <div class="profile_info"> Name :
            <br>
            Register Number:
            <br>
            Course:
            <br>
            DOB:
            <br>
            Conatct:
            <br>
            Email:
            <br>
            Address:
        </div>
    </div>
    <div class="maindiv">
        <div class="clipboard">
            <div class="clip-icon">
                <!-- Clipboard SVG Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                    <path d="M336 64h-72.6c-8.9-37.2-43-64-82.4-64s-73.5 26.8-82.4 64H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zm-144-32c13.2 0 24 10.8 24 24s-10.8 24-24 24-24-10.8-24-24 10.8-24 24-24zm144 432H48V112h48v64h192V112h48v352z"/>
                </svg>
            </div>
            <h2>Announcements</h2>
            <div class="clipboard-content">
            <?php
                // Display each announcement
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<ul>";
                    echo "<li><strong>Date:</strong> " . htmlspecialchars($row['date']) . "</li>";
                    echo "<li><strong>Time:</strong> " . htmlspecialchars($row['time']) . "</li>";
                    echo "<li><strong>Title:</strong> " . htmlspecialchars($row['title']) . "</li>";
                    echo "<li><strong>Message:</strong> " . htmlspecialchars($row['msg']) . "</li>";
                    echo "</ul><br><hr><br>";
                }
                ?>
        </div>
        </div>
    </div>
</body>
</html>
