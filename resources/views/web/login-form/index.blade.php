<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>Login Form</title>
</head>

<body>
    <div class="container mb-5">
        <a href="/" class="close-btn">
            <svg viewbox="0 0 40 40">
                <path class="close-x" d="M 10,10 L 30,30 M 30,10 L 10,30" />
            </svg>
        </a>
        <div class="toggle-button" onclick="toggle()">
            <p id="button-text">Sign Up<br>Sign In</p>
        </div>
        <form action="{{URL::to('RegistrationProcess')}}" id="formAction" class="checkPassword" method="post">
            <div class="title">
                <h1 id="title-text">Welcome Back<br>Create an Account</h1>
            </div>
            @if(Session::has('danger'))
            @php $message = Session::get('danger'); @endphp
            <div class="alert alert-danger">{{$message}}</div>
            @php Session::pull('danger'); @endphp
            @endif
            @if(Session::has('success'))
            @php $message = Session::get('success'); @endphp
            <div class="alert alert-success">{{$message}}</div>
            @php Session::pull('success'); @endphp
            @endif
            <div class="double-field show-field" id="signUp-only">
                <div class="input-div">
                    <p>First Name:</p><input type="text" name="firstName" maxlength="30">
                </div>
                <span class="spacing"></span>
                <div class="input-div">
                    <p>Last Name:</p><input type="text" name="lastName" maxlength="30">
                </div>
            </div>
            <div class="input-div">
                <p>Email:</p><input type="email" name="email" required>
            </div>
            <div class="input-div">
                <p>Password:</p><input type="password" name="password" class="password" required>
            </div>
            <div class="input-div show-field" id="signUp-only">
                <p>Confirm Password:</p>
                <input type="password" name="password_confirmation" class="confirmPassword">
            </div>
            <button id="button">Sign In</button>
            <p class="error text-danger"></p>
        </form>
        <div class="login-box">
            <a href="#" class="social-button" id="facebook-connect"> <span>Facebook</span></a>
            <a href="#" class="social-button" id="google-connect"> <span>Google</span></a>
            <a href="#" class="social-button" id="twitter-connect"> <span>Twitter</span></a>
        </div>
    </div>
</body>
<style>
    body {
        color: white;
        font-family: Arial, Helvetica, sans-serif;
        background-color: #0095FB;
    }

    .container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100vw;
        height: 100vh;
    }

    .spacing {
        width: 10%;
    }

    .close-x {
        stroke: black;
        fill: transparent;
        stroke-linecap: round;
        stroke-width: 5;
    }



    .close-btn {
        position: absolute;
        top: 20px;
        left: 20px;
        width: 50px;
        height: 50px;
        padding: 0;
        background: none;
        border: none;
    }

    form {
        width: 50vw;
        min-width: 500px;
        height: 100vh;
        min-height: 500px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    input {
        color: white;
        background-color: rgba(0, 0, 0, 0.4);
        border: none;
        border-radius: 8px;
        height: 40px;
        font-size: 1.2em;
        outline: none;
        margin: 4px 10px 10px 10px;
        padding: 2px 12px;
        width: 90%;
    }

    .double-field {
        width: 95%;
        display: flex;
    }

    .double-field>div>p {
        padding-left: 0;
    }

    .input-div {
        width: 97%;
        display: flex;
        margin: 10px;
        margin-top: 0;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .input-div>p {
        width: 96%;
        margin: 0;
        padding-left: 2%;
    }

    .toggle-button {
        position: absolute;
        top: 30px;
        right: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100px;
        height: 40px;
        border-radius: 25px;
        background-color: rgba(0, 0, 0, 0.4);
        overflow: hidden;
        cursor: pointer;
    }

    #button-text {
        font-weight: bold;
        line-height: 40px;
        text-align: center;
        transition-duration: 0.4s;
        margin: 0;
        user-select: none;
        transform: translateY(-20px);
    }

    .title {
        width: 100%;
        overflow: hidden;
        height: 50px;
        margin-bottom: 24px
    }

    #title-text {
        font-size: 3rem;
        line-height: 80px;
        text-align: center;
        transition-duration: 0.4s;
        margin: 0;
        user-select: none;
        transform: translateY(-94px);
    }

    #button {
        cursor: pointer;
        color: #0095FB;
        font-weight: bold;
        border-radius: 50px;
        border: none;
        outline: none;
        font-size: 1.5em;
        margin: 10px;
        padding: 10px 80px;
        transition-duration: 0.2s;
        width: 251px;
    }

    #button:hover {
        transform: scale(1.05);
    }

    #signUp-only {
        transition-duration: 0.3s;
    }

    .show-field {
        height: 90px;
        opacity: 1;
    }

    .hide-field {
        height: 0px;
        opacity: 0;
    }

    .login-box {
        padding: 20px;
        margin: 10vh auto;
        text-align: center;
        letter-spacing: 1px;
        display: flex;
        justify-content: space-around;
    }

    .login-box:hover {
        /* box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); */
    }

    .login-box h2 {
        padding: 0px;
        margin: 20px 10 20px;
        text-transform: uppercase;
        color: #4688F1;
    }

    .login-box a {
        text-decoration: none;
    }

    .social-button {
        background-position: 25px 0px;
        box-sizing: border-box;
        color: rgb(255, 255, 255);
        cursor: pointer;
        display: inline-block;
        height: 50px;
        line-height: 50px;
        text-align: left;
        text-decoration: none;
        text-transform: uppercase;
        vertical-align: middle;
        width: 100%;
        border-radius: 3px;
        margin: 10px auto;
        outline: rgb(255, 255, 255) none 0px;
        padding-left: 20%;
        padding-right: 20%;
        transition: all 0.2s cubic-bezier(0.72, 0.01, 0.56, 1) 0s;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }

    #facebook-connect {
        background: rgb(255, 255, 255) url('https://raw.githubusercontent.com/eswarasai/social-login/master/img/facebook.svg?sanitize=true') no-repeat scroll 5px 0px / 30px 50px padding-box border-box;
        border: 1px solid rgb(60, 90, 154);
    }

    #facebook-connect:hover {
        border-color: rgb(60, 90, 154);
        background: rgb(60, 90, 154) url('https://raw.githubusercontent.com/eswarasai/social-login/master/img/facebook-white.svg?sanitize=true') no-repeat scroll 5px 0px / 30px 50px padding-box border-box;
        -webkit-transition: all .8s ease-out;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease-out;
    }

    #facebook-connect span {
        box-sizing: border-box;
        color: rgb(60, 90, 154);
        cursor: pointer;
        text-align: center;
        text-transform: uppercase;
        border: 0px none rgb(255, 255, 255);
        outline: rgb(255, 255, 255) none 0px;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }

    #facebook-connect:hover span {
        color: #FFF;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }

    #google-connect {
        background: rgb(255, 255, 255) url('https://raw.githubusercontent.com/eswarasai/social-login/master/img/google-plus.png') no-repeat scroll 5px 0px / 50px 50px padding-box border-box;
        border: 1px solid rgb(220, 74, 61);
    }

    #google-connect:hover {
        border-color: rgb(220, 74, 61);
        background: rgb(220, 74, 61) url('https://raw.githubusercontent.com/eswarasai/social-login/master/img/google-plus-white.png') no-repeat scroll 5px 0px / 50px 50px padding-box border-box;
        -webkit-transition: all .8s ease-out;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease-out;
    }

    #google-connect span {
        box-sizing: border-box;
        color: rgb(220, 74, 61);
        cursor: pointer;
        text-align: center;
        text-transform: uppercase;
        border: 0px none rgb(220, 74, 61);
        outline: rgb(255, 255, 255) none 0px;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }

    #google-connect:hover span {
        color: #FFF;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }

    #twitter-connect {
        background: rgb(255, 255, 255) url('https://raw.githubusercontent.com/eswarasai/social-login/master/img/twitter.png') no-repeat scroll 5px 1px / 45px 45px padding-box border-box;
        border: 1px solid rgb(85, 172, 238);
    }

    #twitter-connect:hover {
        border-color: rgb(85, 172, 238);
        background: rgb(85, 172, 238) url('https://raw.githubusercontent.com/eswarasai/social-login/master/img/twitter-white.png') no-repeat scroll 5px 1px / 45px 45px padding-box border-box;
        -webkit-transition: all .8s ease-out;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease-out;
    }

    #twitter-connect span {
        box-sizing: border-box;
        color: rgb(85, 172, 238);
        cursor: pointer;
        text-align: center;
        text-transform: uppercase;
        border: 0px none rgb(220, 74, 61);
        outline: rgb(255, 255, 255) none 0px;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }

    #twitter-connect:hover span {
        color: #FFF;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }

    #linkedin-connect {
        background: rgb(255, 255, 255) url('https://raw.githubusercontent.com/eswarasai/social-login/master/img/linkedin.svg?sanitize=true') no-repeat scroll 13px 0px / 28px 45px padding-box border-box;
        border: 1px solid rgb(0, 119, 181);
    }

    #linkedin-connect:hover {
        border-color: rgb(0, 119, 181);
        background: rgb(0, 119, 181) url('https://raw.githubusercontent.com/eswarasai/social-login/master/img/linkedin-white.svg?sanitize=true') no-repeat scroll 13px 0px / 28px 45px padding-box border-box;
        -webkit-transition: all .8s ease-out;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease-out;
    }

    #linkedin-connect span {
        box-sizing: border-box;
        color: rgb(0, 119, 181);
        cursor: pointer;
        text-align: center;
        text-transform: uppercase;
        border: 0px none rgb(0, 119, 181);
        outline: rgb(255, 255, 255) none 0px;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }

    #linkedin-connect:hover span {
        color: #FFF;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }
</style>

<!-- jquery Cdn -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<script>
    let clicked = true
    const toggle = () => {
        clicked = !clicked
        document.getElementById('button-text').style.transform = (clicked ? 'translateY(-20px)' : 'translateY(20px)')
        document.getElementById('title-text').style.transform = (clicked ? 'translateY(-94px)' : 'translateY(-12px)')
        document.getElementById('button').innerText = (clicked ? 'Sign Up' : 'Sign In')
        document.getElementById('formAction').action = (clicked ? "{{URL::to('RegistrationProcess')}}" : "{{URL::to('loginProcess')}}")
        $(".error").html("");
        if(clicked == true){
            $('#formAction').attr('class','checkPassword');
        }else{
            $('#formAction').attr('class','');
        }
        const hiddenItems = document.querySelectorAll('#signUp-only')
        for (var i = 0; i < hiddenItems.length; i++) {
            var item = hiddenItems[i]
            item.classList.add(clicked ? 'show-field' : 'hide-field')
            item.classList.remove(!clicked ? 'show-field' : 'hide-field')
        }
    }

    $(".checkPassword").on('submit',function (e) {
        var class123 = $(this).attr('class');
        console.log(class123);
        if(class123 == "checkPassword"){
            var password = $(".password").val();
            var confirmPassword = $(".confirmPassword").val();
            if(password != confirmPassword){
                $(".error").html("Your password and confirm password is not match.")
                e.preventDefault();
            }
        }
    })
</script>

</html>
