<?php

declare(strict_types=1);

namespace Rimba\Flow\Services;

use Rimba\Flow\Models\WorkflowBlueprint;

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
