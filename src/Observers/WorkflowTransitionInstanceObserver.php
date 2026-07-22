<?php

declare(strict_types=1);

namespace Rimba\Flow\Observers;

use Illuminate\Support\Facades\Validator;
use Rimba\Flow\Models\WorkflowBlueprint;
use Rimba\Flow\Models\WorkflowInstance;
use Rimba\Flow\Models\WorkflowNode;
use Rimba\Flow\Models\WorkflowNodeInstance;
use Rimba\Flow\Models\WorkflowTransition;
use Rimba\Flow\Models\WorkflowTransitionInstance;

final class WorkflowTransitionInstanceObserver
{
    /**
     * Executed timestamp is set automatically.
     */
    public function creating(
        WorkflowTransitionInstance $transitionInstance,
    ): void {
        $transitionInstance->executed_at ??= now();
    }
}

