<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}
$user=$_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="bn">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>NID CMS</title>

<style>
body{margin:0;font-family:system-ui;background:#eef2f7}

/* header */
.header{display:flex;justify-content:space-between;align-items:center;padding:14px}
.session{background:white;padding:8px 14px;border-radius:20px;box-shadow:0 4px 12px rgba(0,0,0,.08);font-size:14px}
.logout{background:#d92323;color:white;padding:10px 18px;border-radius:12px;text-decoration:none;font-weight:600}

/* card */
.card{background:white;margin:15px;padding:18px;border-radius:18px;box-shadow:0 10px 30px rgba(0,0,0,.08)}

/* menu */
.menu{display:flex;flex-wrap:wrap;gap:10px;margin-top:10px}
.menu button{border:none;background:#e7eef9;padding:10px 16px;border-radius:20px;font-weight:600;cursor:pointer}
.menu button.active{background:#2b6be6;color:white}

/* form */
.formbox{margin-top:18px}
input,select{width:100%;padding:12px;margin-top:10px;border-radius:10px;border:1px solid #dcdfe5}
.submit{margin-top:14px;background:#1e63e9;color:white;padding:14px;border:none;border-radius:12px;font-weight:bold}
.hidden{display:none}
.back{border:1px solid #dcdfe5;padding:8px 14px;border-radius:12px;text-decoration:none;color:#1e63e9;font-weight:600}

.title{font-weight:700;font-size:18px;margin-top:15px}
.subtitle{color:#6b7280;margin-bottom:10px}
</style>
</head>
<body>

<div class="header">
<div class="session">Session: <?=htmlspecialchars($user['name'])?> • Partner</div>
<a class="logout" href="logout.php">Logout</a>
</div>

<div class="card">
    <h3>NID Server CMS Portal</h3>
    <small>Nid CMS</small><br><br>
    <a class="back" href="dashboard.php">Back</a>
</div>

<div class="card">
<h3>Options</h3>
<small>সেবা নির্বাচন করুন</small>

<div class="menu">
<button onclick="showBox('server',this)">সার্ভার কপি</button>
<button onclick="showBox('sign',this)">সাইন কপি</button>
<button onclick="showBox('voter',this)">ভোটার লিস্ট</button>
<button onclick="showBox('approval',this)">এপ্রুভাল</button>
</div>

<!-- SERVER COPY -->
<div id="server" class="formbox hidden">
<input placeholder="NID Number">
<input placeholder="Birth Date (YYYY-MM-DD)">
<button class="submit" onclick="deny()">ডাউনলোড</button>
</div>

<!-- SIGN COPY -->
<div id="sign" class="formbox hidden">
<input placeholder="NID Number">
<button class="submit" onclick="deny()">ডাউনলোড</button>
</div>

<!-- VOTER LIST -->
<div id="voter" class="formbox hidden">
<select>
<option>ঢাকা</option>
<option>চট্টগ্রাম</option>
<option>রাজশাহী</option>
<option>খুলনা</option>
<option>বরিশাল</option>
<option>সিলেট</option>
<option>রংপুর</option>
<option>ময়মনসিংহ</option>
</select>
<button class="submit" onclick="deny()">ডাউনলোড</button>
</div>

<!-- APPROVAL -->
<div id="approval" class="formbox hidden">

<div class="title">Correction Approval</div>
<div class="subtitle">ক ক্যাটাগরি সংশোধন অনুমোদন</div>

<label>আবেদন নাম্বার</label>
<input placeholder="NIDCA-2026-000123">

<label>Decision</label>
<select>
<option>Approve / অনুমোদন</option>
<option>Reject / বাতিল</option>
</select>

<button class="submit" onclick="deny()">অনুমোদন</button>

</div>

</div>

<script>
function deny(){
alert("আপনার একাউন্ট টি এখনো সচিব কর্তৃক অনুমোদিত হয়নি দয়া করে দ্রুত অনুমোদন করুন");
}

function showBox(id,btn){
document.querySelectorAll('.formbox').forEach(b=>b.classList.add('hidden'));
document.getElementById(id).classList.remove('hidden');

document.querySelectorAll('.menu button').forEach(b=>b.classList.remove('active'));
btn.classList.add('active');
}
</script>

</body>
</html>