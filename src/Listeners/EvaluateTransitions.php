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


final class EvaluateTransitions
{
    public function handle(
        WorkflowNodeCompleted $event,
    ): void {
        $node = $event->nodeInstance->workflowNode;

        foreach ($node->outgoingTransitions as $transition) {

            // Future:
            // evaluate expression stored in condition.

            event(new WorkflowTransitionExecuted(
                app(ExecuteTransition::class)->execute(
                    $event->nodeInstance->workflowInstance,
                    $transition,
                )
            ));
        }
    }
}

