<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Open-Click Tracker</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <style>
        .title {
            font-size: 84px;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>


</head>

<body class="login-img3-body">

<div class="container">

    <div class="title m-b-md">
        <center>Open/Click Tracker</center>
    </div>
    <form class="login-form" method="post" action="/forgotPassword">
        <center><h2>Forgot Password</h2></center>
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_profile"></i></span>
                <input type="text" class="form-control" placeholder="UserID" id="id" name="id" autofocus required>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_profile"></i></span>
                <input type="email" class="form-control" placeholder="Email" id="email" name="email" autofocus required>
            </div>
            <button class="btn btn-info btn-lg btn-block" type="submit">Submit</button>
        </div>
    </form>
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <div class="alert alert-danger text-center"><li><strong>{{$error}}</strong></li></div>
            @endforeach
        </ul>
    </div>
</div>

<script>
    function show() {
        if(document.getElementById("id").value=="") {
            window.alert("Fill in UserID field");
            return;
        }
        if(document.getElementById("email").value==""){
            window.alert("Fill in email field");
            return;
        }
        window.alert("Password reset link sent to your mail.")
        window.location.href="http://localhost:8000/"
    }
</script>

</body>
</html>
