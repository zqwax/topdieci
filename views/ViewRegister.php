
<?php defined('APP'); require "views/template.php"; ?>

  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f5f5f5;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }
    .container {
      background: white;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      width: 320px;
      box-sizing: border-box;
    }
    input {
      width: 100%;
      padding: 0.6rem;
      margin-top: 1rem;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-sizing: border-box;
      font-size: 1rem;
    }
    button {
      margin-top: 1.5rem;
      width: 100%;
      padding: 0.7rem;
      background: black;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 1rem;
      transition: background-color 0.3s ease;
    }
    button:hover {
      background: #333;
    }
    .msg {
      padding: 0.7rem 1rem;
      border-radius: 8px;
      margin-bottom: 1rem;
      font-weight: 600;
      text-align: center;
    }
    .success {
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }
    .danger {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }
  </style>

  <div class="container">
    <h2>Registrati</h2>

    <?php if (isset($_SESSION['msg'])): ?>
      <div class="msg <?php echo $_SESSION['status'] ?? ''; ?>">
        <?php 
          echo $_SESSION['msg']; 
          unset($_SESSION['msg'], $_SESSION['status']);
        ?>
      </div>
    <?php endif; ?>

    <form action="?option=register&task=registerUser" method="POST">
      <input type="text" name="name" placeholder="Nome completo" required />
      <input type="email" name="email" placeholder="Email" required />
      <input type="password" name="password" placeholder="Password" required />
      <input type="password" name="password_confirm" placeholder="Conferma Password" required />
      <button type="submit">Registrati</button>
    </form>
  </div>