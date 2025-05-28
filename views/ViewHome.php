<?php defined('APP'); include "views/template.php"; ?>

<div class="container">
  <div class="row mb-4">
    <div class="col-12">
      <h1 class="text-center fw-bold mb-3">Formula 1 Teams Ranking</h1>
      <p class="text-center text-muted">Vote for your favorite F1 team!</p>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-8 mx-auto">
      <?php foreach ($top_items as $index => $item): ?>
        <div class="card mb-4">
          <img src="https://images.pexels.com/photos/12041/pexels-photo-12041.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" 
               class="team-image" 
               alt="<?= htmlspecialchars($item['name']) ?>">
          <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h3 class="card-title mb-0">
                <span class="me-2">#<?= $index + 1 ?></span>
                <?= htmlspecialchars($item['name']) ?>
              </h3>
              <span class="vote-count">
                <i class="bi bi-star-fill me-2"></i>
                <?= $item['votes'] ?> votes
              </span>
            </div>
            
            <div class="d-flex justify-content-end">
              <?php if (isset($_SESSION['userdata'])): ?>
                <a href="?option=home&task=vote&id=<?= $item['id_item'] ?>" 
                   class="btn btn-vote">
                  <i class="bi bi-hand-thumbs-up me-2"></i>
                  Vote for Team
                </a>
              <?php else: ?>
                <a href="?option=login" class="btn btn-secondary">
                  <i class="bi bi-box-arrow-in-right me-2"></i>
                  Login to Vote
                </a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <?php if (!isset($_SESSION['userdata'])): ?>
    <div class="row mt-4">
      <div class="col-lg-8 mx-auto">
        <div class="card bg-dark border-0">
          <div class="card-body text-center p-4">
            <h3 class="mb-3">Join the F1 Community!</h3>
            <p class="mb-4">Create an account to vote for your favorite F1 teams and participate in our rankings.</p>
            <a href="?option=register" class="btn btn-vote btn-lg">
              <i class="bi bi-person-plus me-2"></i>
              Register Now
            </a>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>