<?php

namespace View;

use Entity\Role;
use Entity\User\BaseUser;

class ButtonSet
{
    /**
     * @param \Entity\User\BaseUser $user
     * @return string[]
     */
    public static function createButtonSet(BaseUser $user): array
    {
        return self::$buttonCatalog[$user->getRole()->value];
    }

    protected static array $buttonCatalog = [
        Role::Customer->value      => [
            '<button>Send Restore Password Mail</button>',
        ],
        Role::Organizer->value     => [
            '<button>Ban User</button>',
            '<button>Send Restore Password Mail</button>',
        ],
        Role::Administrator->value => [
            '<button>Send Restore Password Mail</button>',
            '<button>Ban User</button>',
            '<button>Add User</button>',
            '<button>Delete User</button>',

        ],
    ];
}
