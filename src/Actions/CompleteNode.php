<?php

declare(strict_types=1);

namespace Rimba\Flow\Actions;

use Rimba\Flow\Events\WorkflowNodeCompleted;
use Rimba\Flow\Models\WorkflowNodeInstance;

final class CompleteNode
{
    public function execute(
        WorkflowNodeInstance $nodeInstance,
    ): WorkflowNodeInstance {
        $nodeInstance->update([
            'completed_at' => now(),
        ]);

        event(new WorkflowNodeCompleted($nodeInstance));

        return $nodeInstance;
    }
}
