<?php defined('APP'); include "views/template.php"; ?>

<div class="container">
  <div class="row mb-4">
    <div class="col-12">
      <h1 class="text-center fw-bold mb-3">Top 10 Items</h1>
      <p class="text-center text-muted">Vote for your favorite items!</p>
    </div>
  </div>

  <div class="row">
    <?php foreach ($top_items as $index => $item): ?>
      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="d-flex align-items-center mb-3">
              <div class="bg-primary text-white rounded-circle p-3 me-3" style="width: 45px; height: 45px; display: flex; align-items: center; justify-content: center;">
                <span class="fw-bold">#<?= $index + 1 ?></span>
              </div>
              <h5 class="card-title mb-0"><?= htmlspecialchars($item['name']) ?></h5>
            </div>
            
            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <i class="bi bi-star-fill text-warning me-2"></i>
                <span class="fw-bold"><?= $item['votes'] ?> votes</span>
              </div>
              
              <?php if (isset($_SESSION['userdata'])): ?>
                <a href="?option=home&task=vote&id=<?= $item['id_item'] ?>" 
                   class="btn btn-outline-primary">
                  <i class="bi bi-hand-thumbs-up me-1"></i>
                  Vote
                </a>
              <?php else: ?>
                <a href="?option=login" class="btn btn-outline-secondary">
                  <i class="bi bi-box-arrow-in-right me-1"></i>
                  Login to Vote
                </a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <?php if (!isset($_SESSION['userdata'])): ?>
    <div class="row mt-4">
      <div class="col-12">
        <div class="card bg-light border-0">
          <div class="card-body text-center p-4">
            <h3 class="mb-3">Join Our Community!</h3>
            <p class="mb-4">Create an account to vote for your favorite items and participate in our rankings.</p>
            <a href="?option=register" class="btn btn-primary btn-lg">
              <i class="bi bi-person-plus me-2"></i>
              Register Now
            </a>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>