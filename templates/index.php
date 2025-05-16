{% extends "base.html" %}
{% block head %}
  <link rel="stylesheet" href="/apps/inviteapp/css/style.css">
{% endblock %}
{% block content %}
<div class="themed-header" style="background-color: {{ group.theme_color }}; padding: 1rem; color: white;">
  <img src="{{ group.logo }}" alt="{{ group.title }} logo" style="height: 2rem; vertical-align: middle; margin-right: 1rem;">
  <span style="font-size: 1.5rem; font-weight: bold;">{{ group.title }}</span>
</div>

<div class="body-wrapper">
  {% if not session.user %}
    <p>{{ 'login_required' | translate }}</p>
  {% else %}
    <h2>{{ 'request_invite' | translate }}</h2>
    <form method="post" action="/generate">
      <label>{{ 'email_address' | translate }}</label><br>
      <input type="email" name="email" required><br><br>

      <label>{{ 'group' | translate }}</label><br>
      <select name="group">
        {% for key, g in groups.items() %}
          <option value="{{ key }}">{{ g.title }}</option>
        {% endfor %}
      </select><br><br>

      <label>{{ 'link_expires_days' | translate }}</label><br>
      <input type="number" name="expires_days" value="3" min="1" max="30"><br><br>

      <div class="g-recaptcha" data-sitekey="{{ captcha_site_key }}"></div><br>

      <button type="submit">{{ 'generate_invite' | translate }}</button>
    </form>
  {% endif %}
</div>
{% endblock %}
