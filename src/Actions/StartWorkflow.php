<?php

declare(strict_types=1);

namespace Rimba\Flow\Actions;

use Rimba\Flow\Events\WorkflowStarted;
use Rimba\Flow\Models\WorkflowBlueprint;
use Rimba\Flow\Models\WorkflowInstance;

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
