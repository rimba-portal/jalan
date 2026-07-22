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

final class WorkflowTransitionObserver
{
    /**
     * Prevent self-referencing transitions.
     */
    public function creating(
        WorkflowTransition $transition,
    ): void {
        if (
            $transition->from_node_id ===
            $transition->to_node_id
        ) {
            throw new \RuntimeException(
                'A workflow node cannot transition to itself.'
            );
        }
    }
}

