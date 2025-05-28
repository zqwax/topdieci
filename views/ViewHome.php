<?php defined('APP'); include "views/template.php"; ?>

<div class="container">
  <h2>Constructor Standings</h2>

  <div class="standings-list">
    <?php foreach ($top_items as $index => $item): ?>
      <div class="team-card">
        <div class="position-marker"><?= $index + 1 ?></div>
        <div class="team-content">
          <div class="team-header">
            <div class="team-name-section">
              <h3 class="team-name"><?= htmlspecialchars($item['name']) ?></h3>
              <div class="points"><?= $item['votes'] ?> PTS</div>
            </div>
            <div class="team-actions">
              <?php if (isset($_SESSION['userdata'])): ?>
                <a href="?option=home&task=vote&id=<?= $item['id_item'] ?>" class="vote-button">Vote</a>
              <?php else: ?>
                <a href="?option=login" class="vote-button">Login to Vote</a>
              <?php endif; ?>
            </div>
          </div>
          <div class="car-image-container">
            <img src="https://images.pexels.com/photos/2394555/pexels-photo-2394555.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" 
                 alt="<?= htmlspecialchars($item['name']) ?>" 
                 class="car-image">
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>