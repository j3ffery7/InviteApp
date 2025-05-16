<?php

namespace OCA\InviteApp\Db;

use JsonSerializable;
use OCP\AppFramework\Db\Entity;

class Token extends Entity implements JsonSerializable {

    /** @var string */
    protected $token;

    /** @var string */
    protected $email;

    /** @var string */
    protected $groupId;

    /** @var int */
    protected $expiresAt;

    public function __construct() {
        $this->addType('expiresAt', 'int');
    }

    public function jsonSerialize(): array {
        return [
            'id' => $this->id,
            'token' => $this->token,
            'email' => $this->email,
            'groupId' => $this->groupId,
            'expiresAt' => $this->expiresAt,
        ];
    }
}
