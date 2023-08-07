<?php

namespace View;

use Entity\Role;
use Entity\User\BaseUser;

class ButtonSetCreator
{
    
    protected static array $buttonCatalog = [
        Role::Customer->value => [
            '<button>%s-button</button>',
            '<button>%s-button</button>',
            '<button>%s-button</button>',
        ],
        Role::Organizer->value => [],
        Role::Administrator->value => [],
    ];
    
    /**
     * @throws \ReflectionException
     */
    public static function createButtonSet(BaseUser $user): array
    {
        $class   = new \ReflectionClass($user::class);
        $methods = $class->getMethods(\ReflectionMethod::IS_PUBLIC);
        $buttons = [];

        foreach ($methods as $method) {
            if ('__construct' !== $method->name) {
                $buttons[] = sprintf('<button>%s-button</button>', ucfirst($method->name));
            }
        }

        return $buttons;
    }
}
