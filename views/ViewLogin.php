<?php defined('APP'); include "views/template.php"; ?>

  
  
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f5f5f5;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    .container {
      background: white;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      width: 300px;
    }
    input {
      width: 100%;
      padding: 0.6rem;
      margin-top: 1rem;
      border: 1px solid #ccc;
      border-radius: 8px;
    }
    button {
      margin-top: 1.5rem;
      width: 100%;
      padding: 0.6rem;
      background: black;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
    }

  </style>
  <div class="container">
  <?php if (isset($_SESSION['msg'])): ?>
    <div class="msg <?= $_SESSION['status'] ?? '' ?>">
      <?= $_SESSION['msg'] ?>
      <?php unset($_SESSION['msg'], $_SESSION['status']); ?>
    </div>
  <?php endif; ?>

    <h2>Login</h2>
    <form action="?option=Login&task=login" method="POST">
      <input type="email" name="email" placeholder="Email" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">Entra</button>
    </form>
  </div>