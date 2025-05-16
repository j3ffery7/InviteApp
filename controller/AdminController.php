<?php

namespace OCA\InviteApp\Controller;

use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Http\RedirectResponse;
use OCP\AppFramework\Controller;
use OCP\IRequest;
use OCP\IUserSession;
use OCP\ILogger;

class AdminController extends Controller {

    private IUserSession $userSession;
    private ILogger $logger;

    public function __construct(
        string $appName,
        IRequest $request,
        IUserSession $userSession,
        ILogger $logger
    ) {
        parent::__construct($appName, $request);
        $this->userSession = $userSession;
        $this->logger = $logger;
    }

    /**
     * @NoAdminRequired
     * @NoCSRFRequired
     */
    public function index(): TemplateResponse {
        $user = $this->userSession->getUser();

        // Optional: restrict to admin group
        if (!$user || !$user->isAdmin()) {
            return new TemplateResponse('inviteapp', '403', [], 'guest');
        }

        // Load issued tokens (placeholder logic)
        $tokens = [
            ['token' => 'abc123', 'email' => 'test@example.com', 'expires' => '2025-06-01', 'group' => 'thomas_forge'],
            ['token' => 'xyz456', 'email' => 'family@example.com', 'expires' => '2025-06-03', 'group' => 'thomas_clan']
        ];

        return new TemplateResponse('inviteapp', 'admin', [
            'tokens' => $tokens,
            'user' => $user->getUID(),
        ]);
    }
}
