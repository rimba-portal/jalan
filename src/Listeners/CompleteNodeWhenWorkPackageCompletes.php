<?php

namespace Rimba\Flow\Listeners;

use Rimba\Flow\Events\WorkflowNodeCompleted;
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
