<?php

declare(strict_types=1);

namespace Rimba\Flow\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Rimba\Flow\Models\WorkflowTransitionInstance;

final class WorkflowTransitionExecuted
{
    use Dispatchable;
    use SerializesModels;

    public function __construct(
        public WorkflowTransitionInstance $transitionInstance,
    ) {}
}
