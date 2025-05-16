<?php
// File: apps/inviteapp/lib/Controller/PageController.php

namespace OCA\InviteApp\Controller;

use OCP\AppFramework\Controller;
use OCP\IRequest;
use OCP\IUserSession;
use OCP\Template\ITemplateResponse;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Http\RedirectResponse;

class PageController extends Controller {
  private $userSession;

  public function __construct($AppName, IRequest $request, IUserSession $userSession) {
    parent::__construct($AppName, $request);
    $this->userSession = $userSession;
  }

  public function index(): ITemplateResponse {
    if (!$this->userSession->isLoggedIn()) {
      return new RedirectResponse('/login');
    }

    return new TemplateResponse('inviteapp', 'index', []);
  }

  public function generateInvite(): ITemplateResponse {
    // Placeholder logic for generating invites
    return new TemplateResponse('inviteapp', 'link', ['inviteUrl' => 'https://nextcloud.example.com/invite/XYZ']);
  }

  public function accept(string $token): ITemplateResponse {
    return new TemplateResponse('inviteapp', 'invite', [
      'token' => $token
    ]);
  }

  public function acceptSubmit(string $token): ITemplateResponse {
    // Placeholder logic for accepting invite
    return new TemplateResponse('inviteapp', 'success', []);
  }
}
?>
