<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>F1 Teams Ranking</title>
  <style>
    :root {
      --primary-red: #e10600;
      --dark-gray: #15151e;
      --light-gray: #f8f9fa;
      --border-radius: 8px;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Titillium Web', sans-serif;
      background-color: var(--dark-gray);
      color: #fff;
      line-height: 1.6;
    }

    .header {
      background-color: #000;
      padding: 1rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 2px solid var(--primary-red);
    }

    .header h1 {
      color: #fff;
      font-size: 1.8rem;
      font-weight: 700;
    }

    .header .right a, 
    .header .right span {
      color: #fff;
      text-decoration: none;
      margin-left: 1.5rem;
      font-weight: 500;
    }

    .header .right a {
      background-color: var(--primary-red);
      padding: 0.5rem 1rem;
      border-radius: var(--border-radius);
      transition: opacity 0.3s;
    }

    .header .right a:hover {
      opacity: 0.9;
    }

    .container {
      max-width: 1200px;
      margin: 2rem auto;
      padding: 0 1rem;
    }

    h2 {
      text-align: center;
      margin-bottom: 3rem;
      font-size: 2.5rem;
      font-weight: 700;
      color: #fff;
    }

    .standings-list {
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
    }

    .team-card {
      background: #fff;
      border-radius: var(--border-radius);
      overflow: hidden;
      position: relative;
      display: flex;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .position-marker {
      background: var(--primary-red);
      color: #fff;
      width: 60px;
      font-size: 2rem;
      font-weight: 700;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .team-content {
      flex: 1;
      padding: 1.5rem;
      background: #fff;
      color: var(--dark-gray);
    }

    .team-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1rem;
    }

    .team-name-section {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .team-name {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--dark-gray);
    }

    .points {
      font-size: 1.2rem;
      font-weight: 700;
      color: var(--primary-red);
    }

    .car-image-container {
      width: 100%;
      height: 200px;
      overflow: hidden;
      border-radius: var(--border-radius);
    }

    .car-image {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.3s;
    }

    .car-image:hover {
      transform: scale(1.05);
    }

    .vote-button {
      background-color: var(--primary-red);
      color: #fff;
      border: none;
      padding: 0.6rem 1.2rem;
      border-radius: var(--border-radius);
      cursor: pointer;
      text-decoration: none;
      font-weight: 500;
      transition: opacity 0.3s;
    }

    .vote-button:hover {
      opacity: 0.9;
    }

    .msg {
      padding: 1rem;
      border-radius: var(--border-radius);
      margin-bottom: 1rem;
      font-weight: bold;
      text-align: center;
    }

    .msg.success {
      background-color: #28a745;
      color: #fff;
    }

    .msg.danger {
      background-color: var(--primary-red);
      color: #fff;
    }

    @media (max-width: 768px) {
      .team-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
      }

      .position-marker {
        width: 40px;
        font-size: 1.5rem;
      }

      .team-content {
        padding: 1rem;
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
        <a href="?option=login&task=logout">Logout</a>
      <?php else: ?>
        <a href="?option=login">Login</a>
        <a href="?option=register">Register</a>
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