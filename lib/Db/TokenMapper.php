<?php

namespace OCA\InviteApp\Db;

use OCP\AppFramework\Db\QBMapper;
use OCP\IDBConnection;

class TokenMapper extends QBMapper {
    public function __construct(IDBConnection $db) {
        parent::__construct($db, 'inviteapp_tokens', Token::class);
    }

    /**
     * Find a token by its string value.
     */
    public function findByToken(string $token): ?Token {
        $qb = $this->db->getQueryBuilder();

        $qb->select('*')
            ->from($this->getTableName())
            ->where($qb->expr()->eq('token', $qb->createNamedParameter($token)))
            ->setMaxResults(1);

        $cursor = $qb->executeQuery();
        $data = $cursor->fetchAssociative();

        return $data ? $this->mapRowToEntity($data) : null;
    }

    /**
     * Delete all expired tokens.
     */
    public function deleteExpiredTokens(): void {
        $qb = $this->db->getQueryBuilder();

        $qb->delete($this->getTableName())
            ->where($qb->expr()->lt('expires_at', $qb->createNamedParameter(time())));

        $qb->executeStatement();
    }
}
