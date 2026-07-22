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

final class WorkflowNodeObserver
{
    /**
     * Ensure node belongs to a blueprint.
     */
    public function creating(
        WorkflowNode $workflowNode,
    ): void {
        if (! $workflowNode->workflow_blueprint_id) {
            throw new \RuntimeException(
                'Workflow node must belong to a workflow blueprint.'
            );
        }
    }
}

