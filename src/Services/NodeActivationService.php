<?php

declare(strict_types=1);

namespace Rimba\Flow\Services;

use Illuminate\Database\Eloquent\Collection;
use Rimba\Flow\Actions\ActivateNode;
use Rimba\Flow\Actions\CompleteWorkflow;
use Rimba\Flow\Actions\ExecuteTransition;
use Rimba\Flow\Models\WorkflowBlueprint;
use Rimba\Flow\Models\WorkflowInstance;
use Rimba\Flow\Models\WorkflowNode;
use Rimba\Flow\Models\WorkflowNodeInstance;
use Rimba\Flow\Models\WorkflowTransition;

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

