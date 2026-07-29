<?php

declare(strict_types=1);

namespace Rimba\Flow\Policies;

use App\Models\User;

final class WorkflowInstancePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('workflow-instance.view-any');
    }

    public function view(
        User $user,
    ): bool {
        return $user->can('workflow-instance.view');
    }

    public function create(User $user): bool
    {
        return $user->can('workflow-instance.create');
    }

    public function cancel(
        User $user,
    ): bool {
        return $user->can('workflow-instance.cancel');
    }
}
