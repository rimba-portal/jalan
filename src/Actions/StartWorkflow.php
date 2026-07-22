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

final class StartWorkflow
{
    public function execute(
        WorkflowBlueprint $blueprint,
        ?object $trackable = null,
    ): WorkflowInstance {
        $instance = WorkflowInstance::create([
            'workflow_blueprint_id' => $blueprint->id,
            'trackable_type' => $trackable?->getMorphClass(),
            'trackable_id' => $trackable?->getKey(),
            'status' => 'active',
        ]);

        event(new WorkflowStarted($instance));

        return $instance;
    }
}

