<?php

namespace App\Enum;

enum Status: string
{
    case PENDING = 'pending';
    case COMPLETED = 'completed';
    case IN_PROGRESS = 'in_progress';
}
