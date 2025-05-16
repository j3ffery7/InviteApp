<?php

namespace OCA\InviteApp\Controller;

use OCP\AppFramework\Http\JSONResponse;
use OCP\AppFramework\Http\RedirectResponse;
use OCP\AppFramework\Controller;
use OCP\IRequest;
use OCP\IUserManager;
use OCP\ILogger;

class TokenController extends Controller {

    private IUserManager $userManager;
    private ILogger $logger;

    public function __construct(
        string $appName,
        IRequest $request,
        IUserManager $userManager,
        ILogger $logger
    ) {
        parent::__construct($appName, $request);
        $this->userManager = $userManager;
        $this->logger = $logger;
    }

    /**
     * @NoAdminRequired
     * @NoCSRFRequired
     */
    public function generate(string $email, string $group, int $expires_days): JSONResponse {
        // TODO: implement logic to generate and store invite token
        $this->logger->info("Generating invite for $email in group $group");

        return new JSONResponse([
            'status' => 'success',
            'message' => 'Token generated (placeholder).',
        ]);
    }

    /**
     * @NoAdminRequired
     * @NoCSRFRequired
     */
    public function accept(string $token): RedirectResponse {
        // TODO: implement logic to accept the token, allow account creation
        $this->logger->info("Token accepted: $token");

        return new RedirectResponse('/apps/inviteapp/register'); // Adjust as needed
    }

    /**
     * @NoAdminRequired
     * @NoCSRFRequired
     */
    public function register(string $token, string $username, string $password): JSONResponse {
        // TODO: implement logic to create user and add to group
        if ($this->userManager->userExists($username)) {
            return new JSONResponse(['status' => 'error', 'message' => 'Username already exists'], 400);
        }

        $user = $this->userManager->createUser($username, $password);
        if ($user === null) {
            return new JSONResponse(['status' => 'error', 'message' => 'User creation failed'], 500);
        }

        return new JSONResponse(['status' => 'success', 'username' => $username]);
    }
}

