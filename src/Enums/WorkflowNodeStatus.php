<?php

declare(strict_types=1);

namespace Rimba\Flow\Enums;

enum WorkflowNodeStatus: string
{
    case Active = 'active';
    case Completed = 'completed';
    case Cancelled = 'cancelled';
}
