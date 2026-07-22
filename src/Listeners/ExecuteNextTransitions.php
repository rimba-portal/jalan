<?php

namespace Rimba\Flow\Listeners;

use Rimba\Flow\Actions\ActivateNode;
use Rimba\Flow\Events\WorkflowTransitionExecuted;

final class ExecuteNextTransitions
{
    public function handle(
        WorkflowTransitionExecuted $event,
    ): void {
        $transition = $event
            ->transitionInstance
            ->workflowTransition;

        $workflow = $event
            ->transitionInstance
            ->workflowInstance;

        app(ActivateNode::class)->execute(
            $workflow,
            $transition->toNode,
        );
    }
}
