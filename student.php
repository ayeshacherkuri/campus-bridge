<?php
$attendance = [
    'web_tech' => 80,
    'machine_learning' => 77,
    'discrete_math' => 50,
    'drafting_graphics' => 56
];

function getPercentageClass($percentage) {
    if ($percentage <= 50) {
        return 'low';
    } elseif ($percentage <= 75) {
        return 'medium';
    } else {
        return 'high';
    }
}
?>
<?php
require_once('db.php');
$query = "select * from registerform";
$result = mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student-Dashboard</title>
    <link rel="stylesheet" href="student.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
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
        <div class="profile_info">
            <h3>Profile</h3>
              <ul>
              <?php
                  while($row = mysqli_fetch_assoc($result)){
              ?>
             <p>Name: <?php echo $row['username'];?></p>
            <p> Course: <?php echo $row['course'];?></p>
            <p>DOB: <?php echo $row['date'];?></p>
            <p>Email: <?php echo $row['email'];?></p>
            </ul>   
            <?php
          }
         ?>
        </div>
    </div>
     <div class="attendance">
        <h2>Attendance</h2>
        <div class="boxes">
            <div class="box">
                <div class="box-p1">
                    <div class="icon" id="icon1"><i class="fa-solid fa-code"></i></div>
                    <p>Web <br>Technology</p>
                    <div class="percent" data-percentage="<?php echo getPercentageClass($attendance['web_tech']); ?>">
                    <svg>
                        <circle cx="40" cy="40" r="40"></circle>
                        <circle cx="40" cy="40" r="40" style="stroke: #4caf50;stroke-dashoffset: calc(251.2 - (<?php echo $attendance['web_tech']; ?> / 100 * 251.2"></circle>
                    </svg>
                    <div class="number">
                    <h2><?php echo $attendance['web_tech']; ?><span>%</span></h2>
                    </div>
                   </div>
                </div>
            </div>
            <div class="box">
                <div class="box-p1">
                    <div class="icon" id="icon2"><i class="fa-solid fa-robot"></i></div>
                    <p>Machine <br>Learning</p>
                    <div class="percent" data-percentage="<?php echo getPercentageClass($attendance['machine_learning']); ?>">
                        <svg>
                            <circle cx="40" cy="40" r="40"></circle>
                            <circle cx="40" cy="40" r="40" style="stroke: #ff9800;stroke-dashoffset: calc(251.2 - (<?php echo $attendance['machine_learning']; ?> / 100 * 251.2"></circle>
                        </svg>
                        <div class="number">
                        <h2><?php echo $attendance['machine_learning']; ?><span>%</span></h2>
                        </div>
                </div>
            </div>
            </div>
            <div class="box">
                <div class="box-p1">
                    <div class="icon" id="icon3"><i class="fa-solid fa-square-root-variable"></i></div>
                    <p>Discrete <br> Mathematics</p>
                    <div class="percent" data-percentage="<?php echo getPercentageClass($attendance['discrete_math']); ?>">
                        <svg>
                            <circle cx="40" cy="40" r="40"></circle>
                            <circle cx="40" cy="40" r="40" style=" stroke: #f44336; stroke-dashoffset: calc(251.2 - (<?php echo $attendance['discrete_math']; ?> / 100 * 251.2"></circle>
                        </svg>
                        <div class="number">
                        <h2><?php echo $attendance['discrete_math']; ?><span>%</span></h2>
                        </div>
                </div>
            </div>
        </div>
            <div class="box">
                <div class="box-p1">
                    <div class="icon" id="icon4"><i class="fa-solid fa-compass-drafting"></i></div>
                    <p>Drafting<br>Graphics</p>
                    <div class="percent" data-percentage="<?php echo getPercentageClass($attendance['drafting_graphics']); ?>">
                        <svg>
                            <circle cx="40" cy="40" r="40"></circle>
                            <circle cx="40" cy="40" r="40" style="stroke: #f44336; stroke-dashoffset: calc(251.2 - (<?php echo $attendance['drafting_graphics']; ?> / 100 * 251.2"></circle>
                        </svg>
                        <div class="number">
                        <h2><?php echo $attendance['drafting_graphics']; ?><span>%</span></h2>
                        </div>
                </div>
            </div>
        </div>
        </div>
        <br>
        <div class="overview">
            <div class="rect">
                <h2>Overview</h2>
            <div class="programming-stats">
                <div class="chart-container">
                    <canvas class="my-chart">

                    </canvas>
                </div>
                <div class="details">
                    <ul></ul>
                </div>
            </div>
            </div>
        </div>
         </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="main1.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>