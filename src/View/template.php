<?php

use Entity\Role;
use Repository\UserTableRepository;
use RoleManager\UseCaseCreator;
use RoleManager\UserCreator;
use View\ButtonSetCreator;

$repository = new UserTableRepository();

$admin = UserCreator::createUser(
    0,
    'Ivan',
    'ivan.webpractik.ru',
    Role::Administrator
);

try {
    $buttonset = ButtonSetCreator::createButtonSet($usecase);
    foreach ($buttonset as $button) {
        echo $button . PHP_EOL;
    }
} catch (ReflectionException $e) {
    echo template . phpsprintf('<h1>%s<h1>', $e->getMessage()) . PHP_EOL;
}

require_once __DIR__ . '/footer.html';
