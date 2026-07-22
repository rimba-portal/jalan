<?php

namespace Rimba\Flow\Listeners;

use Rimba\Flow\Actions\CompleteWorkflow;
use Rimba\Flow\Events\WorkflowNodeCompleted;

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
