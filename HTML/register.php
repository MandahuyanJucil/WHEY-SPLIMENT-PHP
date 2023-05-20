
        <?php include 'inc/header.php'; ?>
        <link rel="stylesheet" href="/WHEY SUPPLIMENT/CSS/register.css">
    <main class="main">
         
        <div class="main__firstdiv">
              <div class="main__firstdiv__first">
                <h1 class="main__firstdiv__first__h1">Register</h1>
                    <div class="main__firstdiv__first__container">
                        <form action="#" method="post">
                            <label for="username">Username:</label>
                            <input type="text" id="username" placeholder="Username" required><br>

                            <label for="password">Password:</label>
                            <input type="password" id="password" placeholder="password" required><br>
                            <label for="password">Re-Password:</label>
                            <input type="password" id="password" placeholder="Retype-password" required><br>
                            <label for="password">Email:</label>
                        <input type="email" id="password" placeholder="Email" required>
                        <div class="main__firstdiv__first__container__sub-res">
                                <input class="main__firstdiv__first__container__btn" type="submit">
                                <input class="main__firstdiv__first__container__btn" type="reset">
                        </div>
                        </form>
                        <div class="main__firstdiv__first__reg">
                                
                            <a href="/WHEY SUPPLIMENT/HTML/login.php">LOG IN</a>
                       </div>
                    </div>
              </div>
        </div>
       
    </main>

    <?php include 'inc/footer.php'; ?>
