<?php

declare(strict_types=1);

namespace Rimba\Flow\Enums;

enum WorkflowNodeType: string
{
    case Start = 'start';
    case WorkPackage = 'workpackage';
    case Decision = 'decision';
    case Merge = 'merge';
    case End = 'end';
}

