{% extends "base.html" %}
{% block head %}
  <link rel="stylesheet" href="/apps/inviteapp/css/style.css">
{% endblock %}
{% block content %}
<div class="themed-header" style="background-color: {{ group.theme_color }}; padding: 1rem; color: white;">
  <img src="{{ group.logo }}" alt="{{ group.title }} logo" style="height: 2rem; vertical-align: middle; margin-right: 1rem;">
  <span style="font-size: 1.5rem; font-weight: bold;">{{ 'account_created_for' | translate }} {{ username }}</span>
</div>

<div class="body-wrapper">
  <p>{{ 'user_has_been_added_to' | translate }} <strong>{{ group.title }}</strong>.</p>
  <p>{{ 'access_your_files_now' | translate }}</p>
  <a class="button" href="https://next.thomaslabs.me/apps/files/files" target="_blank">{{ 'go_to_files' | translate }}</a>
</div>
{% endblock %}
