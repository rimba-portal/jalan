<?php

declare(strict_types=1);

namespace Rimba\Flow\Policies;

use App\Models\User;

final class WorkflowTransitionInstancePolicy
{
    /**
     * Transition instances are audit records.
     */
    public function view(
        User $user,
    ): bool {
        return $user->can('workflow-transition-instance.view');
    }

    public function create(): bool
    {
        return false;
    }

    public function update(): bool
    {
        return false;
    }

    public function delete(): bool
    {
        return false;
    }
}
