<?php

declare(strict_types=1);

namespace Rimba\Flow\Actions;

use Rimba\Flow\Events\WorkflowNodeActivated;
use Rimba\Flow\Models\WorkflowInstance;
use Rimba\Flow\Models\WorkflowNode;
use Rimba\Flow\Models\WorkflowNodeInstance;

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
