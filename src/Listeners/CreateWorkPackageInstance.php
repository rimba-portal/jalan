<?php

namespace Rimba\Flow\Listeners;

use Rimba\Flow\Events\WorkflowNodeActivated;
use Rimba\Work\Actions\StartWorkPackage;

final class CreateWorkPackageInstance
{
    public function handle(
        WorkflowNodeActivated $event,
    ): void {
        $node = $event->nodeInstance->workflowNode;

        if (! $node->workpackage_id) {
            return;
        }

        app(StartWorkPackage::class)->execute(
            $node->workPackage
        );
    }
}
