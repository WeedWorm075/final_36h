<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../assets/login.css">
    </head>
    <body>
        <div class="overlay">
            <form action="888" method="">
                <div class="con">
                    <header class="head-form">
                        <h2>Log In</h2>
                        <p>Login here using your Email and password</p>
                    </header>
                    <br>
                    <div class="field-set">
                        <input class="form-input" id="txt-input" type="text" placeholder="@Email" name="email">
                        <br>
                        <input class="form-input" type="password" placeholder="password" id="txt-input" name="mdp">
                        <br>
                        <input class="log-in" type="submit" value="LOGIN"/>
                    </div>
                    <div class="other">
                        <button class="btn submits sign-up"><a href="<?php echo site_url("welcome/index3"); ?>">Sign Up</a></button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
