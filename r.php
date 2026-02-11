<?php
// ---------- SUBMIT হলে ডাটা সেভ ----------
$msg = "";
$class = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email    = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $name     = trim($_POST['name'] ?? 'User');

    if (!$email || !$password) {
        $msg = "Email and Password required";
        $class = "err";
    } else {

        $file = __DIR__ . '/users.json';

        // ফাইল না থাকলে তৈরি
        if (!file_exists($file)) {
            file_put_contents($file, json_encode([]));
        }

        $users = json_decode(file_get_contents($file), true);

        // duplicate check
        foreach ($users as $u) {
            if ($u['email'] === $email) {
                $msg = "User already exists";
                $class = "err";
                goto end;
            }
        }

        // নতুন ইউজার
        $newUser = [
            "email" => $email,
            "password" => $password,
            "name" => $name,
            "role" => "Partner",
            "approved" => false,
            "created_at" => date("Y-m-d H:i:s")
        ];

        $users[] = $newUser;

        file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        $msg = "User registered successfully";
        $class = "ok";
    }
}
end:
?>

<!DOCTYPE html>
<html lang="bn">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Register User</title>

<style>
body{
    font-family:Arial;
    background:#eef2f7;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}
.card{
    background:#fff;
    padding:25px;
    border-radius:14px;
    width:320px;
    box-shadow:0 10px 25px rgba(0,0,0,.1);
}
input{
    width:100%;
    padding:10px;
    margin:8px 0;
    border:1px solid #ddd;
    border-radius:8px;
}
button{
    background:#2563eb;
    color:white;
    border:none;
    padding:12px;
    width:100%;
    border-radius:10px;
    font-size:16px;
    cursor:pointer;
}
.msg{margin-top:10px;text-align:center;font-weight:bold}
.ok{color:green}
.err{color:red}
</style>
</head>

<body>

<div class="card">
<h3>নতুন ইউজার রেজিস্টার</h3>

<form method="POST">
    <input type="text" name="name" placeholder="নাম" required>
    <input type="email" name="email" placeholder="ইমেইল" required>
    <input type="password" name="password" placeholder="পাসওয়ার্ড" required>
    <button type="submit">রেজিস্টার</button>
</form>

<?php if($msg): ?>
<div class="msg <?= $class ?>"><?= $msg ?></div>
<?php endif; ?>

</div>

</body>
</html>