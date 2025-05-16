<?php
style('inviteapp', 'style');
script('inviteapp', 'script');
$this->inc('header');
?>

<div class="body-wrapper">
  <h2>Request an Invite</h2>
  <form action="<?php p($urlGenerator->linkToRoute('inviteapp.page.generate')) ?>" method="POST">
    <label>Email Address:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Group:</label><br>
    <select name="group">
      <option value="thomas_forge">Thomas Forge</option>
      <option value="thomas_clan">Thomas Clan</option>
    </select><br><br>

    <label>Expires (days):</label><br>
    <input type="number" name="expires_days" value="3" min="1" max="30"><br><br>

    <button type="submit">Generate Invite</button>
  </form>
</div>
