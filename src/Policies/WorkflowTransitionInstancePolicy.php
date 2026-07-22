<?php

declare(strict_types=1);

namespace Rimba\Flow\Policies;

use App\Models\User;
use Rimba\Flow\Models\WorkflowTransitionInstance;

final class WorkflowTransitionInstancePolicy
{
    /**
     * Transition instances are audit records.
     */
    public function view(
        User $user,
        WorkflowTransitionInstance $transitionInstance,
    ): bool {
        return $user->can('workflow-transition-instance.view');
    }

    public function create(
        User $user,
    ): bool {
        return false;
    }

    public function update(
        User $user,
        WorkflowTransitionInstance $transitionInstance,
    ): bool {
        return false;
    }

    public function delete(
        User $user,
        WorkflowTransitionInstance $transitionInstance,
    ): bool {
        return false;
    }
}
