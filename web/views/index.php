<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TuAnalytics</title>
    <link rel="stylesheet" href="extras/bootstrap.min.css">
    <script src="extras/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="extras/style.css">
</head>

<body>
    <nav class="navbar">
        <div class="container-fluid">
            <a href="./">TuAnalytics</a>
        </div>
    </nav>
    <form method="post" action="login.php">
    <div class="container content">
        <h1 class="hood">TuAnalytics</h1>
        <div class="loginBox">
            <input type="text" placeholder="kullanıcı adı" name="admin_login_name" class="login_input">
            <input type="password" placeholder="şifre" name="admin_login_password" class="login_input">
            <button class="login_button">Giriş Yap</button>
        </div>
    </div>
</form>
</body>

</html>