<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>F1 Teams Ranking</title>
  <style>
    :root {
      --primary-orange: #FF6B00;
      --dark-bg: #121212;
      --card-bg: #1E1E1E;
      --text-primary: #FFFFFF;
      --text-secondary: #B3B3B3;
      --border-radius: 12px;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'SF Pro Display', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      background-color: var(--dark-bg);
      color: var(--text-primary);
      line-height: 1.6;
      min-height: 100vh;
    }

    .header {
      background-color: var(--card-bg);
      padding: 1.5rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .header h1 {
      color: var(--text-primary);
      font-size: 1.5rem;
      font-weight: 600;
    }

    .header .right a {
      color: var(--text-primary);
      text-decoration: none;
      margin-left: 1.5rem;
      font-weight: 500;
      padding: 0.5rem 1rem;
      border-radius: var(--border-radius);
      transition: all 0.3s ease;
    }

    .header .right a:hover {
      background-color: rgba(255, 107, 0, 0.1);
      color: var(--primary-orange);
    }

    .header .right a.primary {
      background-color: var(--primary-orange);
      color: var(--text-primary);
    }

    .header .right a.primary:hover {
      opacity: 0.9;
    }

    .header .right span {
      color: var(--text-secondary);
      margin-left: 1.5rem;
    }

    .container {
      max-width: 1200px;
      margin: 2rem auto;
      padding: 0 1.5rem;
    }

    .msg {
      padding: 1rem;
      border-radius: var(--border-radius);
      margin: 1rem auto;
      max-width: 1200px;
      text-align: center;
      font-weight: 500;
    }

    .msg.success {
      background-color: rgba(46, 213, 115, 0.1);
      color: #2ed573;
    }

    .msg.danger {
      background-color: rgba(255, 71, 87, 0.1);
      color: #ff4757;
    }

    @media (max-width: 768px) {
      .header {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
      }

      .header .right {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 0.5rem;
      }

      .header .right a,
      .header .right span {
        margin: 0;
      }
    }
  </style>
</head>
<body>
  <div class="header">
    <div class="left"><h1>F1 Teams Ranking</h1></div>
    <div class="right">
      <a href="?option=home">Home</a>
      <?php if (isset($_SESSION['userdata'])): ?>
        <span>Welcome, <?= htmlspecialchars($_SESSION['userdata']['name']) ?></span>
        <a href="?option=login&task=logout" class="primary">Logout</a>
      <?php else: ?>
        <a href="?option=login">Login</a>
        <a href="?option=register" class="primary">Register</a>
      <?php endif; ?>
    </div>
  </div>

  <?php if (isset($_SESSION['msg'])): ?>
    <div class="msg <?= htmlspecialchars($_SESSION['status']) ?>">
      <?= htmlspecialchars($_SESSION['msg']) ?>
      <?php unset($_SESSION['msg'], $_SESSION['status']); ?>
    </div>
  <?php endif; ?>
</body>
</html>