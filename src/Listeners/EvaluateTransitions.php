<?php

namespace Rimba\Flow\Listeners;

use Rimba\Flow\Actions\ExecuteTransition;
use Rimba\Flow\Events\WorkflowNodeCompleted;
use Rimba\Flow\Events\WorkflowTransitionExecuted;

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
