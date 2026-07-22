<?php

declare(strict_types=1);

namespace Rimba\Flow\Policies;

use App\Models\User;
use Rimba\Flow\Models\WorkflowNode;

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
