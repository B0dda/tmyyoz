<?php
include("./includes/head.php");
if (isset($_POST['signin']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $date = date('Y-m-d H:i:s');
    if (DB::query('SELECT username FROM admins WHERE username=:username', array(':username'=>$email)))
    {
        $pass = DB::query('SELECT password FROM admins WHERE username=:username', array(':username'=>$email))[0]['password'];
        if ($password == $pass)
        {
            echo '<script>alert("تم تسجيل الدخول")</script>';
            echo '<script>window.location="index.php"</script>';
            $cstrong = True;
            $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
            $user_id = DB::query('SELECT id FROM admins WHERE username=:username', array(':username'=>$email))[0]['id'];

            DB::query('INSERT INTO login_tokens VALUES (\'\', :token, :user_id, :date)', array(':token'=>sha1($token), ':user_id'=>$user_id,':date'=>$date));

            setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
            setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
        } else {
                echo '<script>alert("خطأ في كلمة المرور")</script>';
                echo '<script>window.location="signin.php"</script>';
        }
    } else {
            echo '<script>alert( غير مسجل !")</script>';
            echo '<script>window.location="signin.php"</script>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b1361fb5d5.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/master.css">
    <title>تسجيل الدخول </title>
</head>
<body>
    <div class="signup-container">
    <div class="inputs">
            <form action="signin.php" method="POST">
                <div class="heading" style="text-align: center;">
                    <h1>تسجيل الدخول</h1>
                </div>
                <label for="email">إسم المستخدم
                    <i id="i1" class="fas fa-envelope icon"></i>
                    <input class="input" type="text" name="email" placeholder="إسم المستخدم .." />
                </label>
                <label for="password">كلمة المرور
                    <i id="i2" class="fas fa-key icon"></i>
                    <input class="input" type="password" name="password" placeholder="كلمة المرور .." />
                </label>
                <div class="button"><input type="submit" class="sub" name="signin" id="signin" value="تسجيل الدخول"> </div>
            </form>
        </div>
    </div>
</body>
</html>
