<?php

declare(strict_types=1);

namespace Rimba\Flow\Policies;

use App\Models\User;

final class WorkflowNodeInstancePolicy
{
    /**
     * Node instances are system managed.
     */
    public function view(
        User $user,
    ): bool {
        return $user->can('workflow-node-instance.view');
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
