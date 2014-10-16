<?php
/**
 * Admin Login Page
*/

//引用数据库连接文件
require_once '../lib/config.php';

if(!empty($_POST)){

//获取_POST并赋值
$username = $_POST['username'];
$pwd      = md5($_POST['password']); //md5加密

//检测用户名及密码是否正确
$check_query = "SELECT admin_id FROM bd_admin WHERE admin_username='$username' AND admin_pwd='$pwd' limit 1";
$query = $dbc->query($check_query);
    if($result = $query->fetch_array()){
        setcookie("admin_name", $username, time()+3600);
        header("location: index.php ");
        exit;
    }
    else {
    exit('Failed <a href="javascript:history.back(-1);">Back</a> and try again. ');
    }
}
?>
<!DOCTYPE html>
<html class="bg-black">
<head>
    <meta charset="utf-8">
    <title>登录</title>
    <!-- bootstrap 3.0.2 -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>


<body class="bg-black">

<div class="form-box" id="login-box">

    <div class="header">登录</div>
      <form role="form" action="login.php" method="post">
        <div class="body bg-gray">
            <div class="form-group">
                <input type="username"  name="username" class="form-control" placeholder="Username" required autofocus>
            </div>
            <div class="form-group">
                <input type="password"  name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="checkbox" name="remember_me"/> 记住登录
            </div>
        </div>
        <div class="footer">
            <button type="submit" class="btn bg-olive btn-block" type="submit" name="login" >登录</button>

            <p><a href="#">忘记密码</a></p>

        </div>
      </form>

</div>


<!-- jQuery 2.0.2 -->
<script src="../js/jquery-2.0.3.min.js"></script>
<!-- Bootstrap -->
<script src="../js/bootstrap.min.js" type="text/javascript"></script>

</body>

</html>

