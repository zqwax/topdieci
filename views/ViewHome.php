<?php defined('APP'); include "views/template.php"; ?>

<div class="container">
  <h2>Top Dieci</h2>

  <div class="item-list">
    <?php foreach ($top_items as $index => $item): ?>
      <div class="team-card">
        <img src="https://images.pexels.com/photos/12041/pexels-photo-12041.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" 
             alt="<?= htmlspecialchars($item['name']) ?>" 
             class="team-image">
        <div class="team-info">
          <div class="team-name">
            <span class="position">#<?= $index + 1 ?></span>
            <?= htmlspecialchars($item['name']) ?>
          </div>
          <div class="votes-info">
            <span class="votes"><?= $item['votes'] ?> votes</span>
            <?php if (isset($_SESSION['userdata'])): ?>
              <a href="?option=home&task=vote&id=<?= $item['id_item'] ?>" class="vote-button">Vote</a>
            <?php else: ?>
              <a href="?option=login" class="vote-button">Login to Vote</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>