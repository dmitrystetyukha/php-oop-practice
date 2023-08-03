<?php

namespace Entity;

/**
 * @method static find($value)
 */
enum Role: string
{
    case Customer = 'customer';

    case Administrator = 'administrator';

    case Organizer = 'organizer';
}
