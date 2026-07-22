<?php

declare(strict_types=1);

namespace Rimba\Flow\Actions;

use Rimba\Flow\Models\WorkflowBlueprint;
use Rimba\Flow\Models\WorkflowNode;
use Rimba\Flow\Models\WorkflowTransition;

final class AddWorkflowTransition
{
    public function execute(
        WorkflowBlueprint $blueprint,
        WorkflowNode $fromNode,
        WorkflowNode $toNode,
        ?string $name = null,
        ?string $condition = null,
        ?string $action = null,
    ): WorkflowTransition {
        return WorkflowTransition::create([
            'workflow_blueprint_id' => $blueprint->id,
            'from_node_id' => $fromNode->id,
            'to_node_id' => $toNode->id,
            'name' => $name,
            'condition' => $condition,
            'action' => $action,
        ]);
    }
}
