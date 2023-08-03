<?php

use Entity\Role;
use Repository\UserTableRepository;
use RoleManager\ButtonSetCreator;
use RoleManager\UseCaseCreator;
use RoleManager\UserCreator;

$repository = new UserTableRepository();

$user = UserCreator::createUser(
    0,
    'Ivan',
    'ivan.webpractik.ru',
    Role::Administrator
);

$usecase = UseCaseCreator::createUseCase($user, $repository);

try {
    $buttonset = ButtonSetCreator::createButtonSet($usecase);
    foreach ($buttonset as $button) {
        echo $button . PHP_EOL;
    }
} catch (ReflectionException $e) {
    echo sprintf('<h1>%s<h1>', $e->getMessage()) . PHP_EOL;
}

require_once __DIR__ . '/footer.html';
