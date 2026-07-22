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

final class WorkflowTransitionPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('workflow-transition.view-any');
    }

    public function view(
        User $user,
        WorkflowTransition $workflowTransition,
    ): bool {
        return $user->can('workflow-transition.view');
    }

    public function create(User $user): bool
    {
        return $user->can('workflow-transition.create');
    }

    public function update(
        User $user,
        WorkflowTransition $workflowTransition,
    ): bool {
        return $user->can('workflow-transition.update');
    }

    public function delete(
        User $user,
        WorkflowTransition $workflowTransition,
    ): bool {
        return $user->can('workflow-transition.delete');
    }
}

