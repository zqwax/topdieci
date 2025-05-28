<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Top Dieci</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <style>
    body {
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
      background: #f8f9fa;
    }

    .navbar {
      background: linear-gradient(135deg, #0d6efd, #0043a8);
      padding: 1rem 2rem;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .navbar-brand {
      font-size: 1.5rem;
      font-weight: 700;
      color: white !important;
    }

    .nav-link {
      color: rgba(255,255,255,0.9) !important;
      font-weight: 500;
      transition: all 0.3s ease;
      margin: 0 0.5rem;
      padding: 0.5rem 1rem !important;
      border-radius: 6px;
    }

    .nav-link:hover {
      background: rgba(255,255,255,0.1);
      color: white !important;
    }

    .btn-auth {
      background: rgba(255,255,255,0.15);
      border: 1px solid rgba(255,255,255,0.3);
      color: white !important;
      padding: 0.5rem 1.25rem;
      border-radius: 6px;
      transition: all 0.3s ease;
    }

    .btn-auth:hover {
      background: rgba(255,255,255,0.25);
      border-color: rgba(255,255,255,0.4);
    }

    .container {
      max-width: 1200px;
      margin: 2rem auto;
      padding: 2rem;
    }

    .card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 24px rgba(0,0,0,0.1);
    }

    .alert {
      border: none;
      border-radius: 10px;
      padding: 1rem 1.5rem;
      margin-bottom: 2rem;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .alert-success {
      background: #d1fae5;
      color: #065f46;
    }

    .alert-danger {
      background: #fee2e2;
      color: #991b1b;
    }

    .user-welcome {
      color: rgba(255,255,255,0.9);
      margin-right: 1rem;
      font-weight: 500;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="?option=home">Top Dieci</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav align-items-center">
          <li class="nav-item">
            <a class="nav-link" href="?option=home">Home</a>
          </li>
          <?php if (isset($_SESSION['userdata'])): ?>
            <li class="nav-item">
              <span class="user-welcome">
                <i class="bi bi-person-circle me-1"></i>
                <?= htmlspecialchars($_SESSION['userdata']['name']) ?>
              </span>
            </li>
            <li class="nav-item">
              <a class="btn-auth" href="?option=login&task=logout">Logout</a>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="btn-auth me-2" href="?option=login">Login</a>
            </li>
            <li class="nav-item">
              <a class="btn-auth" href="?option=register">Register</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  <?php if (isset($_SESSION['msg'])): ?>
    <div class="container">
      <div class="alert alert-<?= htmlspecialchars($_SESSION['status']) ?>" role="alert">
        <?= htmlspecialchars($_SESSION['msg']) ?>
        <?php unset($_SESSION['msg'], $_SESSION['status']); ?>
      </div>
    </div>
  <?php endif; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>