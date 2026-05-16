<?php
// forgot_password.php — Smart Campus Hub
// Simple stub. Replace with real email-reset logic when ready.
$sent = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim(filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL));
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } else {
        // TODO: generate token, store in DB, send email
        $sent = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Forgot Password — Smart Campus Hub</title>
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;600;700&display=swap" rel="stylesheet"/>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}
:root{--navy:#0b1120;--card:#141d2e;--border:rgba(99,179,237,0.15);--blue:#3b82f6;--cyan:#06b6d4;--accent:#38bdf8;--text:#e2e8f0;--muted:#64748b;--error:#f87171;--success:#34d399;}
body{background:var(--navy);font-family:'Sora',sans-serif;color:var(--text);min-height:100vh;display:flex;align-items:center;justify-content:center;padding:24px;}
.card{background:var(--card);border:1px solid var(--border);border-radius:20px;padding:44px 40px;width:100%;max-width:420px;box-shadow:0 24px 64px rgba(0,0,0,.4);}
h1{font-size:22px;font-weight:700;margin-bottom:8px;}
p{font-size:13px;color:var(--muted);margin-bottom:28px;line-height:1.6;}
label{display:block;font-size:12px;font-weight:600;color:var(--muted);letter-spacing:.06em;text-transform:uppercase;margin-bottom:8px;}
input[type=email]{width:100%;padding:12px 14px;background:rgba(255,255,255,.05);border:1px solid var(--border);border-radius:10px;color:var(--text);font-family:'Sora',sans-serif;font-size:14px;outline:none;}
input:focus{border-color:var(--blue);box-shadow:0 0 0 3px rgba(59,130,246,.15);}
.btn{margin-top:20px;width:100%;padding:13px;background:linear-gradient(135deg,var(--blue),var(--cyan));border:none;border-radius:10px;color:#fff;font-family:'Sora',sans-serif;font-size:15px;font-weight:600;cursor:pointer;}
.btn:hover{opacity:.9;}
.msg{padding:10px 14px;border-radius:8px;font-size:13px;margin-bottom:16px;}
.msg.error{background:rgba(248,113,113,.1);border:1px solid rgba(248,113,113,.3);color:var(--error);}
.msg.success{background:rgba(52,211,153,.1);border:1px solid rgba(52,211,153,.3);color:var(--success);}
.back{display:block;text-align:center;margin-top:20px;font-size:13px;color:var(--muted);text-decoration:none;}
.back:hover{color:var(--accent);}
</style>
</head>
<body>
<div class="card">
  <h1>Reset Password 🔑</h1>
  <p>Enter your campus email and we'll send you a reset link.</p>
  <?php if ($error): ?>
    <div class="msg error"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>
  <?php if ($sent): ?>
    <div class="msg success">✅ If that email exists in our system, a reset link has been sent. Check your inbox.</div>
    <a href="login.html" class="back">← Back to Login</a>
  <?php else: ?>
  <form method="POST">
    <label for="email">Email Address</label>
    <input type="email" name="email" id="email" placeholder="you@campus.edu" required/>
    <button type="submit" class="btn">Send Reset Link →</button>
  </form>
  <a href="login.html" class="back">← Back to Login</a>
  <?php endif; ?>
</div>
</body>
</html>
