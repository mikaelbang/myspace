<html>
    <head>
        <title></title>
        <link href="../../myspace/views/css/reset.css" rel="stylesheet" type="text/css"/>
        <link href="../../myspace/views/css/registerlogin.css" rel="stylesheet" type="text/css"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $(".showRegister").click(function(){
                    $("#register").css("display","block");
                    $("#login").css("display","none");
                    $(".hideLogin").css("display","none");
                    $(".hideRegister").css("display","block");
                });

                $(".showLogin").click(function(){
                    $("#register").css("display","none");
                    $("#login").css("display","block");
                    $(".hideLogin").css("display","block");
                    $(".hideRegister").css("display","none");
                });
            });


        </script>
    </head>
    <body>
        <div id="wallpaper">
            <div id="header">
                <div class="logo"><p class="AW">AW</p></div>
            </div>
            <div id="content">
                <div class="hideLogin"><p class="loginHeadline">If you´re not a member then <a href="#" class="showRegister">register here</a></p></div>
                <div class="hideRegister"><p class="registerHeadline">Sign up or go back to <a href="#" class="showLogin">log in</a></p></div>
                <form method="post" action="auth/login">
                    <div id="login">
                        <input name="email" class="loginInput" type="email" placeholder="Email"/>
                        <input name="password" class="loginInput" type="password" placeholder="Password"/>
                        <input name="login_button" class="loginButton" type="submit" value="Log In"/>
                    </div>
                </form>

                <form method="post" action="auth/register">
                    <div id="register">
                        <input name="first_name" class="inputs" type="text" placeholder="First name">
                        <input name="last_name" class="inputs" type="text" placeholder="Last name">
                        <input name="email" class="inputs" type="email" placeholder="Email">
                        <input name="password" class="inputs" type="password" placeholder="Password">
                        <input name="rep_password" class="inputs" type="password" placeholder="Repete password">
                        <select name="gender" class="gender">
                            <option class="genderOption" value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                        <input type="submit" value="Sign up" name="register_button" class="registerButton"/>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>