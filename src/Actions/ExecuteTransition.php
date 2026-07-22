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

final class ExecuteTransition
{
    public function execute(
        WorkflowInstance $workflowInstance,
        WorkflowTransition $transition,
        ?int $executedById = null,
    ): WorkflowTransitionInstance {
        $instance = WorkflowTransitionInstance::create([
            'workflow_instance_id' => $workflowInstance->id,
            'workflow_transition_id' => $transition->id,
            'executed_by_id' => $executedById,
            'executed_at' => now(),
        ]);

        event(new WorkflowTransitionExecuted($instance));

        return $instance;
    }
}

