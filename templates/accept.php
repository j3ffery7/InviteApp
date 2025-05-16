<?php /** @var array $_ */ ?>
<h2>Accept Invite</h2>
<p><?php p($_['description']) ?></p>
<form method="POST">
  <label>Choose a Username:</label><br>
  <input type="text" name="username" required><br><br>

  <label>Choose a Password:</label><br>
  <input type="password" name="password" required><br><br>

  <button type="submit">Create Account</button>
</form>
