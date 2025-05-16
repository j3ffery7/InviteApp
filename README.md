# 📩 InviteApp for Nextcloud

InviteApp is a custom Nextcloud application that allows administrators to generate **secure, time-limited invitation links** for new users to self-register. Each invite link can automatically assign users to specific groups and display a custom welcome page or terms of service.

## 🚀 Features

- 🔐 Time-limited invite token generation
- 📧 Invite users by email or direct link
- 👤 Self-registration form with password setup
- 👪 Auto-add users to predefined groups
- 📄 Custom welcome or terms pages
- 🛠 Admin dashboard to view and manage tokens
- ⚙️ REST API endpoint for token validation

---

## 📁 Folder Structure

apps/inviteapp/
├── appinfo/
│ ├── app.php
│ ├── info.xml
│ └── routes.php
├── lib/
│ ├── Application.php
│ └── Controller/
│ ├── PageController.php
│ ├── AdminController.php
│ └── TokenController.php
├── templates/
│ ├── index.php
│ ├── invite.php
│ ├── accept.php
│ ├── success.php
│ ├── link.php
│ └── terms.php
├── composer.json
└── README.md


---

## 🧩 Installation

1. Clone or copy `inviteapp` into your Nextcloud `apps/` directory:
   ```bash
   cd /var/www/nextcloud/apps
   git clone https://your.repo.url/inviteapp.git

    Set correct permissions:

chown -R www-data:www-data inviteapp

Enable the app:

sudo -u www-data php /var/www/nextcloud/occ app:enable inviteapp

Rebuild autoload files:

    cd /var/www/nextcloud/apps/inviteapp
    composer install --no-dev

🔗 Usage

    Access the app at:

https://<your-nextcloud>/index.php/apps/inviteapp/

Admin panel:

https://<your-nextcloud>/index.php/apps/inviteapp/admin

Token validation API:

    GET /index.php/apps/inviteapp/api/validate/{token}

🧪 Development Notes

    Controllers use annotations like @NoCSRFRequired and @NoAdminRequired to define accessibility.

    Routing is handled via appinfo/routes.php.

    Dependency injection and routing are wired via lib/Application.php.

🔐 Security Notes

    Make sure your web server enforces HTTPS.

    Invite tokens should be stored and managed securely.

    You can extend token generation logic to integrate with email or audit systems.

📄 License

This project is licensed under the AGPLv3 License.
👨‍💻 Author

Created by Jeffery Thomas – thomaslabs.me


---

Let me know if you’d like a version that includes deployment via Docker, a `.gitignore`, badges (e.g., for releases or license), or example screenshots for the GitHub page.

