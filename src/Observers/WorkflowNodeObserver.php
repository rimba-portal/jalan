<?php

declare(strict_types=1);

namespace Rimba\Flow\Observers;

use Rimba\Flow\Models\WorkflowNode;

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
