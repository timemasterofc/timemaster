<?php

namespace App\Enums;

enum PersonType: string
{
    case PF = 'Pessoa física';
    case PJ = 'Pessoa jurídica';
}
