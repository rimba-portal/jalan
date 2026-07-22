<?php

declare(strict_types=1);

namespace Rimba\Flow\Enums;

enum WorkflowStatus: string
{
    case Active = 'active';
    case Completed = 'completed';
    case Cancelled = 'cancelled';
}

