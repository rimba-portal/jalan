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

final class WorkflowNodePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('workflow-node.view-any');
    }

    public function view(
        User $user,
        WorkflowNode $workflowNode,
    ): bool {
        return $user->can('workflow-node.view');
    }

    public function create(User $user): bool
    {
        return $user->can('workflow-node.create');
    }

    public function update(
        User $user,
        WorkflowNode $workflowNode,
    ): bool {
        return $user->can('workflow-node.update');
    }

    public function delete(
        User $user,
        WorkflowNode $workflowNode,
    ): bool {
        return $user->can('workflow-node.delete');
    }
}

