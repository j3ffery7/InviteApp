<?php
namespace OCA\InviteApp;

use OCP\AppFramework\App;
use OCP\IContainer;

class Application extends App {
    public function __construct(array $urlParams = []) {
        parent::__construct('inviteapp', $urlParams);
        $container = $this->getContainer();
    }
}
