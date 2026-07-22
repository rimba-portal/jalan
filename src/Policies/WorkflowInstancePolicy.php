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

final class WorkflowInstancePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('workflow-instance.view-any');
    }

    public function view(
        User $user,
        WorkflowInstance $workflowInstance,
    ): bool {
        return $user->can('workflow-instance.view');
    }

    public function create(User $user): bool
    {
        return $user->can('workflow-instance.create');
    }

    public function cancel(
        User $user,
        WorkflowInstance $workflowInstance,
    ): bool {
        return $user->can('workflow-instance.cancel');
    }
}

