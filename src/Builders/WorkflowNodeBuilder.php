<?php

declare(strict_types=1);

namespace Rimba\Flow\Builders;

use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Rimba\Flow\Events\WorkflowCompleted;
use Rimba\Flow\Events\WorkflowNodeActivated;
use Rimba\Flow\Events\WorkflowNodeCompleted;
use Rimba\Flow\Events\WorkflowStarted;
use Rimba\Flow\Events\WorkflowTransitionExecuted;
use Rimba\Flow\Models\WorkflowBlueprint;
use Rimba\Flow\Models\WorkflowInstance;
use Rimba\Flow\Models\WorkflowNode;
use Rimba\Flow\Models\WorkflowNodeInstance;
use Rimba\Flow\Models\WorkflowTransition;
use Rimba\Flow\Models\WorkflowTransitionInstance;

final class WorkflowNodeBuilder extends Builder
{
    public function starts(): static
    {
        return $this->where('type', 'start');
    }

    public function ends(): static
    {
        return $this->where('type', 'end');
    }

    public function type(string $type): static
    {
        return $this->where('type', $type);
    }
}

