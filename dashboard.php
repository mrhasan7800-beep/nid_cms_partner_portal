<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="bn">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard</title>

<style>
*{box-sizing:border-box}
body{
    margin:0;
    font-family:system-ui, Arial;
    background:#eef2f7;
    color:#111;
}

/* Header */
.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:15px;
}
.session{
    background:#fff;
    padding:8px 14px;
    border-radius:20px;
    font-size:14px;
    box-shadow:0 4px 12px rgba(0,0,0,.08);
}
.logout{
    background:#e11d2e;
    color:#fff;
    padding:10px 16px;
    border-radius:12px;
    text-decoration:none;
    font-weight:600;
}

/* Container */
.container{
    padding:15px;
}
.cardbox{
    background:#fff;
    border-radius:20px;
    padding:18px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

/* Service Card */
.service{
    background:#f8fafc;
    border-radius:18px;
    padding:18px;
    margin-top:15px;
    position:relative;
}
.service-title{
    font-weight:700;
    font-size:18px;
}
.service-sub{
    font-size:14px;
    color:#6b7280;
    margin-top:4px;
}
.badge{
    position:absolute;
    right:15px;
    top:15px;
    background:#e5efff;
    color:#2563eb;
    font-weight:700;
    padding:6px 10px;
    border-radius:14px;
    font-size:13px;
}
.openbtn{
    display:block;
    margin-top:15px;
    background:#fff;
    border-radius:12px;
    padding:12px;
    text-decoration:none;
    color:#111;
    border:1px solid #e5e7eb;
    font-weight:600;
}
.openbtn:active{transform:scale(.98)}
</style>
</head>

<body>

<div class="header">
    <div class="session">Session: <?=htmlspecialchars($user['name'])?> • Partner</div>
    <a href="logout.php" class="logout">Logout</a>
</div>

<div class="container">
    <h2>Dashboard</h2>

    <div class="cardbox">

        <!-- NID -->
        <div class="service">
            <div class="badge">01</div>
            <div class="service-title">NID Server CMS Portal</div>
            <div class="service-sub">এনআইডি সার্ভিস</div>
            <a href="service_nid.php" class="openbtn">Open</a>
        </div>

        <!-- Mobile -->
        <div class="service">
            <div class="badge">02</div>
            <div class="service-title">Mobile Database Portal</div>
            <div class="service-sub">মোবাইল ডাটাবেস</div>
            <a href="#" onclick="noConn()" class="openbtn">Open</a>
        </div>

        <!-- Birth -->
        <div class="service">
            <div class="badge">03</div>
            <div class="service-title">Birth & Death Registration (BDRC)</div>
            <div class="service-sub">জন্ম/মৃত্যু নিবন্ধন</div>
            <a href="#" onclick="noConn()" class="openbtn">Open</a>
        </div>

    </div>
</div>

<script>
function noConn(){
    alert("আপনার সাথে কানেকশন নাই দয়া করে দ্রুত কানেক্ট করুন এই সার্ভিস নেওয়ার জন্য");
}
</script>

</body>
</html>