<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login form shake effect</title>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
    {{ Html::style('css/login.css') }}
</head>

<body id="login">
<div class="login-form">
    <h1>Smartlinks</h1>
    <span class="help-block">
                    {{ $errors->first('errors')? $errors->first('errors'):'' }}
    </span>
    <form class="login" role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="form-group ">
            <input type="text" class="form-control" placeholder="Tên Đăng Nhập" id="UserName" name="email">
            <i class="fa fa-user"></i>
        </div>
        <div class="form-group log-status">
            <input type="password" class="form-control" placeholder="Mật Khẩu" id="Passwod" name="password" required>
            <i class="fa fa-lock"></i>
        </div>
        <span class="alert">Invalid Credentials</span>
        <a class="link" href="#">Lost your password?</a>
        <button type="submit" class="log-btn">Đăng Nhập</button>
    </form>

</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
{{ Html::script('js/login.js') }}
</body>
</html>
