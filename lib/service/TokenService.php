<?php

namespace OCA\InviteApp\Service;

use OCA\InviteApp\Db\Token;
use OCA\InviteApp\Db\TokenMapper;
use OCP\AppFramework\Db\DoesNotExistException;

class TokenService {
    private TokenMapper $tokenMapper;

    public function __construct(TokenMapper $tokenMapper) {
        $this->tokenMapper = $tokenMapper;
    }

    /**
     * Create and store a new token
     */
    public function createToken(string $email, string $group, int $expiresInDays): Token {
        $token = new Token();
        $token->setToken(bin2hex(random_bytes(16)));
        $token->setEmail($email);
        $token->setGroup($group);
        $token->setExpiresAt(time() + ($expiresInDays * 86400));

        return $this->tokenMapper->insert($token);
    }

    /**
     * Retrieve a token by its string
     */
    public function getToken(string $tokenStr): ?Token {
        try {
            return $this->tokenMapper->findByToken($tokenStr);
        } catch (DoesNotExistException $e) {
            return null;
        }
    }

    /**
     * Check if a token is valid
     */
    public function isValid(string $tokenStr): bool {
        $token = $this->getToken($tokenStr);
        return $token && $token->getExpiresAt() > time();
    }

    /**
     * Remove all expired tokens from the database
     */
    public function cleanExpiredTokens(): void {
        $this->tokenMapper->deleteExpiredTokens();
    }
}
