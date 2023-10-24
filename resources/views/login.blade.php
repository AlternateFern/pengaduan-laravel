<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Pengaduan Masyarakat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <h3>Selamat datang kembali!</h3>

        @if(session("error"))
        <h5 class="alert alert-danger text-center">{{session("error")}}</h5>
        @endif

        <form class="p-3 mt-3" action="{{url('login')}}" method="post">
            @method("POST")
            @CSRF
            <div class="form-group">

                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                <div class="bar"></div>
                <div class="form-inline">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" style="width:90%;">
                    <div class="togglepassword"><img src="storage/image/eye.png" width="33px" height="33px" id="togglePassword"></div>
                </div>
                <div class="bar" style="width:90%;"></div>
                <input type="checkbox" name="rememberme" id="rememberme">
                <label for="rememberme">Remember Me</label>
                <button type="submit" name="" class="btn mt-3 btn-block btn-grad" style="color:white;font-weight:bold;">Login</button>
            </div>
        </form>
        <div class="text-center">
            <a href="#">Lupa kata sandi?</a> atau <a href="{{url('register')}}">Daftar</a>
        </div>
    </div>
    </div>

    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
        });

        // // prevent form submit
        // const form = document.querySelector("form");
        // form.addEventListener('submit', function (e) {
        //     e.preventDefault();
        // });
    </script>
</body>
</html>