<?php

namespace RoleManager;

use ReflectionClass;
use ReflectionMethod;
use UseCase\BaseUserUseCase;

class ButtonSetCreator
{
    /**
     * @throws \ReflectionException
     */
    public static function createButtonSet(BaseUserUseCase $useCase): array
    {
        $class   = new ReflectionClass($useCase::class);
        $methods = $class->getMethods(ReflectionMethod::IS_PUBLIC);
        $buttons = [];

        foreach ($methods as $method) {
            if ($method->name !== '__construct') {
                $buttons[] = sprintf("<button>%s-button</button>", ucfirst($method->name));
            }
        }

        return $buttons;
    }
}
