<?php

namespace OCA\InviteApp\Controller;

use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Http\RedirectResponse;
use OCP\AppFramework\Http\JSONResponse;
use OCP\AppFramework\Controller;
use OCP\IRequest;
use OCP\IUserSession;

class PageController extends Controller {

    private $userSession;

    public function __construct(
        $AppName,
        IRequest $request,
        IUserSession $userSession
    ) {
        parent::__construct($AppName, $request);
        $this->userSession = $userSession;
    }

    /**
     * GET /
     */
    public function index(): TemplateResponse {
        return new TemplateResponse('inviteapp', 'index');
    }

    /**
     * POST /generate
     */
    public function generateToken(): TemplateResponse {
        // TODO: Handle invite token generation
        return new TemplateResponse('inviteapp', 'link');
    }

    /**
     * GET /invite/{token}
     */
    public function showInvite(string $token): TemplateResponse {
        // TODO: Validate token, show invite form
        return new TemplateResponse('inviteapp', 'invite', [ 'token' => $token ]);
    }

    /**
     * POST /invite/{token}
     */
    public function acceptInvite(string $token): TemplateResponse {
        // TODO: Register user, show success
        return new TemplateResponse('inviteapp', 'success');
    }

    /**
     * GET /success
     */
    public function success(): TemplateResponse {
        return new TemplateResponse('inviteapp', 'success');
    }

    /**
     * GET /terms
     */
    public function terms(): TemplateResponse {
        return new TemplateResponse('inviteapp', 'terms');
    }
}
