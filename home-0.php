<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/home-0.css">
</head>
<body>
    <script type="text/javascript">
        function login() {
        var blur = document.getElementById('blur');
        blur.classList.toggle('active');
        var popup = document.getElementById('login');
        popup.classList.toggle('active');
        }
    </script>
    <section>
    <div class="container" id="blur">
          <div class="content">
        <input type="checkbox" id="check">
        <header>
            <img src="./img/logoo2.png" width="150px" height="90px">
            <div class="navigation">
                <a onclick="login()" href="#loginForm">Login</a></li>
            </div>

            <label for="check">     
                <i class="fas fa-bars menu-btn"></i>
                <i class="fas fa-times close-btn"></i>
            </label>

        </header>
        <div class="content1">
            <div class="info">
                <!-- <h2>WELCOME!!<br><span>AND ENJOY</span></h2> -->
            </div>
        </div>
          </div>
    </div>

        <div id="loginForm">
        <form action="login.php" method="post" autocomplete="off">
          <div id="login">
            <div class="logo">
                <h1>login</h1>
                <hr>
            </div>
        
                <h3 class="user">Username</h3>
                <input type="text" class="input-button" name="username" id="username" required autocomplete="off">
                <h3 class="user">Password</h3>
                <input type="password" class="input-button" name="password" id="password" required>
                <P style="margin-left: 25px;">I Dont Have Account <a href="#signupForm">SignUp</a> </P>
                <button class="submit">Submit </button>
                <button class="close"><a class="text" href="#" onclick="login()">close</a></button>
            </div>  
        </form>


        <div id="signupForm">
            <form action="signup.php" method="post" autocomplete="off">
                <div class="logo">
                    <h2>Sign Up</h2>
                    <hr>
                    <?php if (isset($_GET['error'])) { ?>
                        <?php echo $_GET['error']; ?>
                        <?php if (isset($_GET['success'])) { ?>
                            <div class="alert alert-success" role="alert">
                            <?php echo $_GET['success'];
                        } ?>
                            </div>
                        <?php } ?>
                </div>
                    <h3 class="user">Username</h3>
                    <input type="text" class="input-button" name="username" id="username" required>
                    <h3 class="user">Password</h3>
                    <input type="password" class="input-button" name="password" id="password" required>
                    <h3 class="user">Email</h3>
                    <input type="text" class="input-button" name="email" id="email" required>
                    <P style="margin-left: 55px;">I Have Account <a href="#loginForm">Login</a> </P>
                    <button class="submit">Submit </button>
                    <button class="close"><a class="text" href="#" onclick="login()">close</a></button>
        </div>
        </form>
    </div>

        
    </section>



</body>
</html>