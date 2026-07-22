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


final class AutoCompleteWorkflow
{
    public function handle(
        WorkflowNodeCompleted $event,
    ): void {

        $workflow = $event
            ->nodeInstance
            ->workflowInstance;

        $remainingTransitions = $event
            ->nodeInstance
            ->workflowNode
            ->outgoingTransitions()
            ->count();

        if ($remainingTransitions > 0) {
            return;
        }

        app(CompleteWorkflow::class)
            ->execute($workflow);
    }
}

