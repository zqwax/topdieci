<?php defined('APP'); include "views/template.php"; ?>

<style>
  .standings-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    margin-top: 2rem;
  }

  .team-card {
    background: var(--card-bg);
    border-radius: var(--border-radius);
    overflow: hidden;
    transition: transform 0.3s ease;
  }

  .team-card:hover {
    transform: translateY(-2px);
  }

  .team-content {
    padding: 1.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .team-info {
    display: flex;
    align-items: center;
    gap: 1.5rem;
  }

  .position {
    font-size: 2rem;
    font-weight: 700;
    color: var(--primary-orange);
    min-width: 2.5rem;
  }

  .team-details {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
  }

  .team-name {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--text-primary);
  }

  .points {
    font-size: 1.125rem;
    color: var(--primary-orange);
    font-weight: 500;
  }

  .vote-button {
    background-color: var(--primary-orange);
    color: var(--text-primary);
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: var(--border-radius);
    font-weight: 500;
    text-decoration: none;
    transition: opacity 0.3s ease;
  }

  .vote-button:hover {
    opacity: 0.9;
  }

  .car-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
  }

  @media (max-width: 768px) {
    .team-content {
      flex-direction: column;
      gap: 1rem;
      text-align: center;
    }

    .team-info {
      flex-direction: column;
      gap: 0.5rem;
    }

    .position {
      font-size: 1.5rem;
    }
  }
</style>

<div class="container">
  <div class="standings-list">
    <?php foreach ($top_items as $index => $item): ?>
      <div class="team-card">
        <div class="team-content">
          <div class="team-info">
            <div class="position"><?= $index + 1 ?></div>
            <div class="team-details">
              <h3 class="team-name"><?= htmlspecialchars($item['name']) ?></h3>
              <div class="points"><?= $item['votes'] ?> PTS</div>
            </div>
          </div>
          <div>
            <?php if (isset($_SESSION['userdata'])): ?>
              <a href="?option=home&task=vote&id=<?= $item['id_item'] ?>" class="vote-button">Vote</a>
            <?php else: ?>
              <a href="?option=login" class="vote-button">Login to Vote</a>
            <?php endif; ?>
          </div>
        </div>
        <img src="https://images.pexels.com/photos/2394555/pexels-photo-2394555.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" 
             alt="<?= htmlspecialchars($item['name']) ?>" 
             class="car-image">
      </div>
    <?php endforeach; ?>
  </div>
</div>