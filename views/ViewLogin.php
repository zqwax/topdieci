<?php defined('APP'); include "views/template.php"; ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
      <div class="card p-4">
        <div class="card-body">
          <h2 class="text-center mb-4 fw-bold">Login</h2>
          
          <form action="?option=Login&task=login" method="POST">
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <div class="input-group">
                <span class="input-group-text">
                  <i class="bi bi-envelope"></i>
                </span>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
            </div>
            
            <div class="mb-4">
              <label for="password" class="form-label">Password</label>
              <div class="input-group">
                <span class="input-group-text">
                  <i class="bi bi-lock"></i>
                </span>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
            </div>
            
            <button type="submit" class="btn btn-primary w-100 py-2">
              <i class="bi bi-box-arrow-in-right me-2"></i>
              Login
            </button>
          </form>
          
          <div class="mt-4 text-center">
            <p class="mb-0">Don't have an account? 
              <a href="?option=register" class="text-primary text-decoration-none">Register here</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>