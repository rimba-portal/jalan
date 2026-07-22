<?php

declare(strict_types=1);

namespace Rimba\Flow\Actions;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Rimba\Flow\Events\WorkflowCompleted;
use Rimba\Flow\Events\WorkflowNodeActivated;
use Rimba\Flow\Events\WorkflowNodeCompleted;
use Rimba\Flow\Events\WorkflowStarted;
use Rimba\Flow\Events\WorkflowTransitionExecuted;
use Rimba\Flow\Models\WorkflowBlueprint;
use Rimba\Flow\Models\WorkflowInstance;
use Rimba\Flow\Models\WorkflowNode;
use Rimba\Flow\Models\WorkflowNodeInstance;
use Rimba\Flow\Models\WorkflowTransition;
use Rimba\Flow\Models\WorkflowTransitionInstance;

final class ActivateNode
{
    public function execute(
        WorkflowInstance $workflowInstance,
        WorkflowNode $node,
    ): WorkflowNodeInstance {
        $instance = WorkflowNodeInstance::create([
            'workflow_instance_id' => $workflowInstance->id,
            'workflow_node_id' => $node->id,
            'activated_at' => now(),
        ]);

        event(new WorkflowNodeActivated($instance));

        return $instance;
    }
}

