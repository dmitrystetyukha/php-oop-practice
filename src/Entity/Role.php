<?php

namespace Entity;

enum Role: int
{
    case Customer = 0;
    
    case Administrator = 1;
    
    case Organizer = 2;
}
