<?php

namespace Rimba\Flow\Listeners;

use Rimba\Flow\Actions\ActivateNode;
use Rimba\Flow\Events\WorkflowStarted;

final class CreateFirstNode
{
    public function handle(
        WorkflowStarted $event,
    ): void {
        $workflow = $event->workflowInstance;

        $startNode = $workflow
            ->workflowBlueprint
            ->workflowNodes()
            ->where('type', 'start')
            ->first();

        if (! $startNode) {
            return;
        }

        app(ActivateNode::class)->execute(
            $workflow,
            $startNode,
        );
    }
}
