<?php

namespace OCA\InviteApp\Controller;

use OCP\AppFramework\Http\JSONResponse;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Controller;
use OCP\IRequest;
use OCA\InviteApp\Service\TokenService;
use OCP\AppFramework\Http; 

class TokenController extends Controller {

	private TokenService $tokenService;

	public function __construct(string $AppName,
									IRequest $request,
									TokenService $tokenService) {
		parent::__construct($AppName, $request);
		$this->tokenService = $tokenService;
	}

	/**
	 * @NoAdminRequired
	 */
	public function listTokens(): DataResponse {
		return new DataResponse($this->tokenService->getAll());
	}

	/**
	 * @NoAdminRequired
	 */
	public function getToken(string $token): DataResponse {
		return new DataResponse($this->tokenService->getByToken($token));
	}

	/**
	 * @NoAdminRequired
	 * @CORS
	 */
	public function create(string $email, string $group, int $expiresDays): DataResponse {
		$token = $this->tokenService->create($email, $group, $expiresDays);
		return new DataResponse($token);
	}
}
