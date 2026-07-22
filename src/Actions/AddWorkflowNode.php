<?php

declare(strict_types=1);

namespace Rimba\Flow\Actions;

use Rimba\Flow\Models\WorkflowBlueprint;
use Rimba\Flow\Models\WorkflowNode;

final class AddWorkflowNode
{
    public function execute(
        WorkflowBlueprint $blueprint,
        int $workPackageId,
        string $name,
        string $type,
    ): WorkflowNode {
        return $blueprint->workflowNodes()->create([
            'workpackage_id' => $workPackageId,
            'name' => $name,
            'type' => $type,
        ]);
    }
}
