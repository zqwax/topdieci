
<style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #e0eafc, #cfdef3);
      margin: 0;
      padding: 0;
      color: #333;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 2rem;
      background-color: #1f2937;
      color: white;
    }

    .header .right a, .header .right span {
      margin-left: 15px;
      text-decoration: none;
      color: #fff;
      font-weight: 500;
    }

    .header .right a {
      background-color: #3b82f6;
      padding: 0.5rem 1rem;
      border-radius: 8px;
      transition: background 0.3s;
    }

    .header .right a:hover {
      background: #2563eb;
    }

    .container {
      max-width: 800px;
      margin: 2rem auto;
      padding: 2rem;
      background: white;
      border-radius: 16px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 2rem;
      font-size: 2rem;
    }

    ul.item-list {
      list-style: none;
      padding: 0;
    }

    ul.item-list li {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem;
      border-bottom: 1px solid #eee;
    }

    .vote-button {
      background-color: #10b981;
      color: white;
      border: none;
      padding: 0.6rem 1rem;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s;
    }

    .vote-button:hover {
      background-color: #059669;
    }

    .msg {
      padding: 1rem;
      border-radius: 8px;
      margin-bottom: 1rem;
      font-weight: bold;
      text-align: center;
    }

    .msg.success {
      background-color: #d1fae5;
      color: #065f46;
      border: 1px solid #10b981;
    }

    .msg.danger {
      background-color: #fee2e2;
      color: #991b1b;
      border: 1px solid #ef4444;
    }

    form input[type="email"],
    form input[type="password"],
    form input[type="text"] {
      width: 100%;
      padding: 0.75rem;
      margin-top: 1rem;
      border: 1px solid #ccc;
      border-radius: 8px;
    }

    form button[type="submit"] {
      width: 100%;
      margin-top: 1.5rem;
      padding: 0.75rem;
      background: #3b82f6;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      cursor: pointer;
      transition: background 0.3s;
    }

    form button[type="submit"]:hover {
      background: #2563eb;
    }

    .auth-container {
      max-width: 400px;
      margin: 4rem auto;
      background: white;
      padding: 2rem;
      border-radius: 16px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    }
  </style>
  <div class="header">
    <div class="left"><h1>Top Dieci</h1></div>
    <div class="right">
      <a href="?option=home">Home</a>
      <?php if (isset($_SESSION['userdata'])): ?>
        <span>Ciao, <?= htmlspecialchars($_SESSION['userdata']['name']) ?></span>
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
