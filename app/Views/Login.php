<?php include_once("partials/head.php"); ?>
<div class="container">
    <div class="login-form">
      <h2 class="text-center">Login</h2>
      <form>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Sign in</button>
      </form>
    </div>
  </div>
<?php include_once("partials/footer.php"); ?>