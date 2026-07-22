<?php

declare(strict_types=1);

namespace Rimba\Flow\Actions;

use Rimba\Flow\Models\WorkflowInstance;

final class CancelWorkflow
{
    public function execute(
        WorkflowInstance $workflowInstance,
    ): WorkflowInstance {
        $workflowInstance->update([
            'status' => 'cancelled',
        ]);

        return $workflowInstance;
    }
}
