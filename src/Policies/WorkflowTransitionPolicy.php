<?php

declare(strict_types=1);

namespace Rimba\Flow\Policies;

use App\Models\User;

final class WorkflowTransitionPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('workflow-transition.view-any');
    }

    public function view(
        User $user,
    ): bool {
        return $user->can('workflow-transition.view');
    }

    public function create(User $user): bool
    {
        return $user->can('workflow-transition.create');
    }

    public function update(
        User $user,
    ): bool {
        return $user->can('workflow-transition.update');
    }

    public function delete(
        User $user,
    ): bool {
        return $user->can('workflow-transition.delete');
    }
}
