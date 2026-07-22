<?php

declare(strict_types=1);

namespace Rimba\Flow\Actions;

use Rimba\Flow\Models\WorkflowBlueprint;

final class CreateWorkflowBlueprint
{
    public function execute(
        string $name,
        ?int $ownerId = null,
        bool $active = true,
    ): WorkflowBlueprint {
        return WorkflowBlueprint::create([
            'name' => $name,
            'owner_id' => $ownerId,
            'active' => $active,
        ]);
    }
}
