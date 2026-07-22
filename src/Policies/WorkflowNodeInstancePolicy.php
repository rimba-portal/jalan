<?php

declare(strict_types=1);

namespace Rimba\Flow\Policies;

use App\Models\User;
use Rimba\Flow\Models\WorkflowNodeInstance;

final class WorkflowNodeInstancePolicy
{
    /**
     * Node instances are system managed.
     */
    public function view(
        User $user,
        WorkflowNodeInstance $nodeInstance,
    ): bool {
        return $user->can('workflow-node-instance.view');
    }

    public function update(
        User $user,
        WorkflowNodeInstance $nodeInstance,
    ): bool {
        return false;
    }

    public function delete(
        User $user,
        WorkflowNodeInstance $nodeInstance,
    ): bool {
        return false;
    }
}
