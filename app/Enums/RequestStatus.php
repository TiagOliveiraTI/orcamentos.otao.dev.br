<?php

declare(strict_types=1);

namespace App\Enums;

enum RequestStatus: string
{
    case STATUS_PENDING = 'pending';
    case STATUS_APPROVED = 'approved';
    case STATUS_REJECTED = 'rejected';
}
