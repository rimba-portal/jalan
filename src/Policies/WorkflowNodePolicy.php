<?php

declare(strict_types=1);

namespace Rimba\Flow\Policies;

use App\Models\User;

final class WorkflowNodePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('workflow-node.view-any');
    }

    public function view(
        User $user,
    ): bool {
        return $user->can('workflow-node.view');
    }

    public function create(User $user): bool
    {
        return $user->can('workflow-node.create');
    }

    public function update(
        User $user,
    ): bool {
        return $user->can('workflow-node.update');
    }

    public function delete(
        User $user,
    ): bool {
        return $user->can('workflow-node.delete');
    }
}
