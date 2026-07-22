<?php

declare(strict_types=1);

namespace Rimba\Flow\Observers;

use Rimba\Flow\Models\WorkflowInstance;

final class WorkflowInstanceObserver
{
    /**
     * Default workflow status.
     */
    public function creating(
        WorkflowInstance $workflowInstance,
    ): void {
        $workflowInstance->status ??= 'active';
    }
}
