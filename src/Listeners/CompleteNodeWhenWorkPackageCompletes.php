<?php

namespace Rimba\Flow\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Rimba\Trail\Models\AuditLog;
use Rimba\Flow\Actions\ActivateNode;
use Rimba\Flow\Actions\CompleteWorkflow;
use Rimba\Flow\Actions\ExecuteTransition;
use Rimba\Flow\Events\WorkflowCompleted;
use Rimba\Flow\Events\WorkflowNodeActivated;
use Rimba\Flow\Events\WorkflowNodeCompleted;
use Rimba\Flow\Events\WorkflowStarted;
use Rimba\Flow\Events\WorkflowTransitionExecuted;
use Rimba\Flow\Models\WorkflowNode;
use Rimba\Work\Actions\StartWorkPackage;
use Rimba\Work\Events\WorkPackageCompleted;


final class CompleteNodeWhenWorkPackageCompletes
{
    public function handle(
        WorkPackageCompleted $event,
    ): void {
        $workPackageInstance = $event->workPackageInstance;

        $nodeInstance = $workPackageInstance
            ->workflowNodeInstance;

        if (! $nodeInstance) {
            return;
        }

        $nodeInstance->update([
            'completed_at' => now(),
        ]);

        event(new WorkflowNodeCompleted(
            $nodeInstance
        ));
    }
}

