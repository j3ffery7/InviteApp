<?php
namespace OCA\InviteApp\Controller;

use OCP\AppFramework\Controller;
use OCP\IRequest;
use OCP\IUserSession;

abstract class BaseController extends Controller {
    protected IUserSession $userSession;

    public function __construct(string $appName, IRequest $request, IUserSession $userSession) {
        parent::__construct($appName, $request);
        $this->userSession = $userSession;
    }

    protected function requireLogin() {
        if (!$this->userSession->isLoggedIn()) {
            throw new \Exception('Authentication required');
        }
    }
}
