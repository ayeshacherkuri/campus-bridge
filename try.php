<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="try.css">
    <title>Login-Register landing page</title>
    <script>
        function validateForm() {
      const formFields = ['username', 'course', 'date', 'email', 'password_1', 'password_2'];
      for (let field of formFields) {
        let input = document.forms["registrationForm"][field].value;
        if (input === "") {
          alert("Please fill in all fields.");
          return false; 
        }
      }
      return true; 
    }   
        </script>
</head>
<body>
    <div class="back-image">
       <img src="blue.jpeg" alt="background image" style="border-radius: 20%;">
    </div>
    <section class="left">
        <section class="side login">
            <p class="title">Not an account?</p>
            <p class="message" style="font-size: 10px;">ClassSync is the EdTech Partner of Choice to enhance student learning experience and enables access to Academic Content, Records.</p>
            <button>Register</button>
            <img src="reg_back.svg" alt="">
        </section>

        <section class="main register">
            <div class="container">
                <p class="title">Register</p>
                <form method="post"  action="c.php" onsubmit="return vadildateForm()">
                <?php
           // session_start(); 
          if (isset($_SESSION['success'])) {
           echo "<p style='color:green;'>".$_SESSION['success']."</p>";
           unset($_SESSION['success']); 
            }
               ?>
                    <div class="form-control">
                    <input type="text" placeholder="Username" name="username" required value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="form-control">
                    <input type="text" placeholder="Course" name="course" required value="<?php echo isset($course) ? htmlspecialchars($course) : ''; ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </div>
                    <div class="form-control">
                        <input type="date" placeholder="DOB" name="date" required value="<?php echo $date; ?>">
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>
                    <div class="form-control">
                    <input type="email" placeholder="E-mail" name="email" required value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="form-control">
                        <input type="password" placeholder="Password" name="password_1" required>
                        <i class="fas fa-unlock"></i>
                    </div>
                    <div class="form-control">
                        <input type="password" placeholder="Confirm password" name="password_2" required>
                        <i class="fas fa-lock"></i>
                    </div>

                    <button class="submit" name="reg_user" onclick="showToast(successMsg)">Register</button>
                    <div id="toastBox"></div>
                </form>
            </div>
        </section>
    </section>

    <section class="right">

        <section class="side register">
            <p class="title">Already registered?</p>
            <p class="message"  style="font-size: 10px;">ClassSync is the EdTech Partner of Choice to enhance student learning experience and enables access to Academic Content, Records.</p>
            <button>Login</button>
            <img src="log_back.svg" alt="">
        </section>

        <section class="main login">
            <div class="container">
                <p class="title">Login</p>
                <form method="post" action="log.php">
                    <div class="form-control">
                        <input type="text" placeholder="Username" name="username" required>
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="form-control">
                        <input type="password" placeholder="Password" name="password_2" required>
                        <i class="fas fa-unlock"></i>
                    </div>

                    <button class="submit" name="login_user" value="login" onclick="showToast(successMsg)">Login</button>
                   
                    <div id="toastBox"></div>
                </form>
            </div>
        </section>

    </section>

    <script>
        var sideButtons = document.querySelectorAll('.side button');
        sideButtons.forEach(btn => btn.addEventListener('click', () => {
            document.body.classList.toggle('signup');
        }))

      let toastBox = document.getElementById('toastBox');
      let successMsg = '<i class="fa-solid fa-circle-check"></i> Successfully submitted';
      function showToast(msg){
      let toast =   document.createElement('div');
      toast.classList.add('toast');
      toast.innerHTML = msg;
      toastBox.appendChild(toast);
      setTimeout(() => {
                toast.remove(); // Remove the toast after the duration
            }, 5000);
      }  
    </script>
    
</body>
</html>