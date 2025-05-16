{% extends "base.html" %}
{% block head %}
  <link rel="stylesheet" href="/apps/inviteapp/css/style.css">
{% endblock %}
{% block content %}
<div class="themed-header" style="background-color: {{ group.theme_color }}; padding: 1rem; color: white;">
  <img src="{{ group.logo }}" alt="{{ group.title }} logo" style="height: 2rem; vertical-align: middle; margin-right: 1rem;">
  <span style="font-size: 1.5rem; font-weight: bold;">{{ 'accept_invite_to' | translate }} {{ group.title }} on {{ instance_name }}</span>
</div>

<div class="body-wrapper">
  <p>{{ group.description }}</p>
  <form method="post">
    <label>{{ 'choose_username' | translate }}</label><br>
    <input type="text" name="username" required><br><br>

    <label>{{ 'choose_password' | translate }}</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">{{ 'create_account' | translate }}</button>
  </form>
</div>
{% endblock %}
