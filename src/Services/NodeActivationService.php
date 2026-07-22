<?php

declare(strict_types=1);

namespace Rimba\Flow\Services;

use Rimba\Flow\Actions\ActivateNode;
use Rimba\Flow\Models\WorkflowInstance;
use Rimba\Flow\Models\WorkflowNode;
use Rimba\Flow\Models\WorkflowNodeInstance;

final class NodeActivationService
{
    public function activate(
        WorkflowInstance $workflowInstance,
        WorkflowNode $node,
    ): WorkflowNodeInstance {

        return app(ActivateNode::class)
            ->execute(
                $workflowInstance,
                $node,
            );
    }
}
