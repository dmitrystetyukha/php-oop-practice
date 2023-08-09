<?php

use Controller\UserController;
use Entity\Role;
use Repository\UserTableRepository;

$repository = UserTableRepository::getInstance();

$userController = new UserController($repository);

$adminIvan    = $userController->create("001", "Ivan", "ivan@webpractik.ru", Role::Administrator);
$customerOleg = $userController->create("002", "Oleg", "oleg@webpractik.ru", Role::Customer);

foreach ($userController->getButtonSet($adminIvan) as $button) {
    echo $button . PHP_EOL;
}

try {
    $adminIvan->banUser($customerOleg->getId());
} catch (Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/footer.html';
