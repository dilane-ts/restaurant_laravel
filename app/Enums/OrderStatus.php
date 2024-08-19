<?php

namespace App\Enums;

enum OrderStatus: string
{
    case PENDING  = 'pending';

    case DELIVERED = 'delivered';
    case CANCELED  = 'canceled';
    case FAILED = 'failed';
    case COMPLETED = 'completed';
}
