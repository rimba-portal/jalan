<?php

declare(strict_types=1);

namespace Rimba\Flow\Services;

use Illuminate\Database\Eloquent\Collection;
use Rimba\Flow\Actions\ActivateNode;
use Rimba\Flow\Actions\CompleteWorkflow;
use Rimba\Flow\Actions\ExecuteTransition;
use Rimba\Flow\Models\WorkflowBlueprint;
use Rimba\Flow\Models\WorkflowInstance;
use Rimba\Flow\Models\WorkflowNode;
use Rimba\Flow\Models\WorkflowNodeInstance;
use Rimba\Flow\Models\WorkflowTransition;

final class WorkflowMetricsService
{
    public function totalInstances(
        WorkflowBlueprint $workflowBlueprint,
    ): int {

        return $workflowBlueprint
            ->workflowInstances()
            ->count();
    }

    public function activeInstances(
        WorkflowBlueprint $workflowBlueprint,
    ): int {

        return $workflowBlueprint
            ->workflowInstances()
            ->where('status', 'active')
            ->count();
    }

    public function completedInstances(
        WorkflowBlueprint $workflowBlueprint,
    ): int {

        return $workflowBlueprint
            ->workflowInstances()
            ->where('status', 'completed')
            ->count();
    }

    public function cancelledInstances(
        WorkflowBlueprint $workflowBlueprint,
    ): int {

        return $workflowBlueprint
            ->workflowInstances()
            ->where('status', 'cancelled')
            ->count();
    }

    public function averageNodeCount(
        WorkflowBlueprint $workflowBlueprint,
    ): float {

        return (float) $workflowBlueprint
            ->workflowNodes()
            ->count();
    }

    public function completionRate(
        WorkflowBlueprint $workflowBlueprint,
    ): float {

        $total = $this->totalInstances(
            $workflowBlueprint,
        );

        if ($total === 0) {
            return 0;
        }

        return round(
            ($this->completedInstances($workflowBlueprint) / $total) * 100,
            2,
        );
    }
}

