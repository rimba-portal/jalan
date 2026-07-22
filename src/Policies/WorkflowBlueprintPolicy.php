<?php

declare(strict_types=1);

namespace Rimba\Flow\Policies;

use App\Models\User;
use Rimba\Flow\Models\WorkflowBlueprint;
use Rimba\Flow\Models\WorkflowInstance;
use Rimba\Flow\Models\WorkflowNode;
use Rimba\Flow\Models\WorkflowNodeInstance;
use Rimba\Flow\Models\WorkflowTransition;
use Rimba\Flow\Models\WorkflowTransitionInstance;

final class WorkflowBlueprintPolicy
{
    /**
     * Workflow administrators can manage workflow definitions.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('workflow-blueprint.view-any');
    }

    public function view(
        User $user,
        WorkflowBlueprint $workflowBlueprint,
    ): bool {
        return $user->can('workflow-blueprint.view');
    }

    public function create(User $user): bool
    {
        return $user->can('workflow-blueprint.create');
    }

    public function update(
        User $user,
        WorkflowBlueprint $workflowBlueprint,
    ): bool {
        return $user->can('workflow-blueprint.update');
    }

    public function delete(
        User $user,
        WorkflowBlueprint $workflowBlueprint,
    ): bool {
        return $user->can('workflow-blueprint.delete');
    }

    /**
     * User can start workflow if they have
     * one of the configured requester roles.
     */
    public function start(
        User $user,
        WorkflowBlueprint $workflowBlueprint,
    ): bool {

        $roleIds = $user
            ->staff
            ?->roles
            ->pluck('id')
            ->all() ?? [];

        return $workflowBlueprint
            ->requesterRoles()
            ->whereIn('roles.id', $roleIds)
            ->exists();
    }
}

