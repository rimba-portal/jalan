<?php

declare(strict_types=1);

namespace Rimba\Flow\Actions;

use Rimba\Flow\Events\WorkflowCompleted;
use Rimba\Flow\Models\WorkflowInstance;

final class CompleteWorkflow
{
    public function execute(
        WorkflowInstance $workflowInstance,
    ): WorkflowInstance {
        $workflowInstance->update([
            'status' => 'completed',
        ]);

        event(new WorkflowCompleted($workflowInstance));

        return $workflowInstance;
    }
}
