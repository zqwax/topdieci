<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>F1 Top Teams</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <style>
    :root {
      --f1-red: #e10600;
      --f1-dark: #15151e;
      --f1-grey: #38383f;
      --f1-light: #f8f9fa;
    }

    body {
      font-family: 'Titillium Web', sans-serif;
      background-color: var(--f1-dark);
      color: var(--f1-light);
    }

    .navbar {
      background-color: var(--f1-grey);
      padding: 1rem 2rem;
      border-bottom: 3px solid var(--f1-red);
    }

    .navbar-brand {
      font-size: 1.8rem;
      font-weight: 700;
      color: white !important;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .nav-link {
      color: rgba(255,255,255,0.9) !important;
      font-weight: 500;
      transition: all 0.3s ease;
      margin: 0 0.5rem;
      padding: 0.5rem 1rem !important;
      border-radius: 4px;
    }

    .nav-link:hover {
      background: var(--f1-red);
      color: white !important;
    }

    .btn-auth {
      background: var(--f1-red);
      border: none;
      color: white !important;
      padding: 0.5rem 1.25rem;
      border-radius: 4px;
      transition: all 0.3s ease;
      text-decoration: none;
    }

    .btn-auth:hover {
      background: #ff1a1a;
      transform: translateY(-2px);
    }

    .container {
      max-width: 1200px;
      margin: 2rem auto;
      padding: 2rem;
    }

    .card {
      background: var(--f1-grey);
      border: none;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
      transition: transform 0.3s ease;
      margin-bottom: 2rem;
      overflow: hidden;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .alert {
      border: none;
      border-radius: 6px;
      padding: 1rem 1.5rem;
      margin-bottom: 2rem;
    }

    .alert-success {
      background: #155724;
      color: white;
    }

    .alert-danger {
      background: var(--f1-red);
      color: white;
    }

    .user-welcome {
      color: rgba(255,255,255,0.9);
      margin-right: 1rem;
      font-weight: 500;
    }

    .team-image {
      width: 100%;
      height: 300px;
      object-fit: cover;
    }

    .vote-count {
      color: var(--f1-red);
      font-weight: bold;
      font-size: 1.2rem;
    }

    .btn-vote {
      background: var(--f1-red);
      color: white;
      border: none;
      transition: all 0.3s ease;
    }

    .btn-vote:hover {
      background: #ff1a1a;
      transform: scale(1.05);
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="?option=home">F1 Teams</a>
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