<?php

namespace App\JDR\Enum;

enum TypeEnum : string
{
    case SUCCESS = 'success';
    case FAILURE = 'failure';
    case CRITICAL_SUCCESS = 'critical_success';
    case FUMBLE = 'fumble';
}