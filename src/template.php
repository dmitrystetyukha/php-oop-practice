<?php

use Controller\UserController;
use Entity\Role;
use Repository\UserRepository;
use View\ButtonSet;

$repository = UserRepository::getInstance();

$userController = new UserController($repository);

$adminIvan    = $userController->createUser("001", "Ivan", "ivan@webpractik.ru", Role::Administrator);
$customerOleg = $userController->createUser("002", "Oleg", "oleg@webpractik.ru", Role::Customer);

foreach (ButtonSet::createButtonSet($adminIvan) as $button) {
    echo $button . PHP_EOL;
}

try {
    $adminIvan->banUser($customerOleg->getId());
} catch (Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/footer.html';
