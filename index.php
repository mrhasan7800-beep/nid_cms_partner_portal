<?php
session_start();
if(isset($_SESSION['user'])){
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="bn">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CMS - NID DATABASE</title>

<style>
body{
    margin:0;
    font-family:system-ui;
    background:#eef2f7;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

/* card */
.card{
    width:340px;
    background:#fff;
    padding:30px 22px;
    border-radius:18px;
    text-align:center;
    box-shadow:0 10px 30px rgba(0,0,0,.1);
}

/* logo */
.logo{
    width:70px;
    margin-bottom:10px;
}

/* title */
.title{
    font-size:22px;
    font-weight:700;
    margin-bottom:20px;
}

/* inputs */
input{
    width:100%;
    padding:14px;
    margin:8px 0;
    border-radius:10px;
    border:1px solid #d6dbe3;
    font-size:15px;
}

/* button */
button{
    background:#1f5fd6;
    color:white;
    border:none;
    padding:14px;
    width:140px;
    border-radius:12px;
    font-size:18px;
    margin-top:10px;
    cursor:pointer;
}

/* error */
.err{
    color:red;
    margin-top:10px;
    font-weight:600;
}
</style>
</head>

<body>

<div class="card">

    <!-- আপনার লোগো লিংক এখানে বসাবেন -->
    <img src="https://i.ibb.co/qFNkf3NT/5441319736-26663.jpg" class="logo">

    <div class="title">
        CMS - NID PARTNER PORTAL 
    </div>

    <form method="POST" action="auth.php">
        <input type="text" name="email" placeholder="ইউজার আইডি" required>
        <input type="password" name="password" placeholder="পাসওয়ার্ড" required>
        <button type="submit">লগইন</button>
    </form>

    <?php if(isset($_GET['error'])): ?>
        <div class="err">ভুল ইউজার আইডি অথবা পাসওয়ার্ড</div>
    <?php endif; ?>

</div>

</body>
</html>