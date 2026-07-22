<?php

declare(strict_types=1);

namespace Rimba\Flow\Observers;

use Illuminate\Support\Facades\Validator;
use Rimba\Flow\Models\WorkflowBlueprint;

final class WorkflowBlueprintObserver
{
    /**
     * Ensure blueprint names are unique per owner.
     */
    public function creating(
        WorkflowBlueprint $workflowBlueprint,
    ): void {
        Validator::validate([
            'name' => $workflowBlueprint->name,
        ], [
            'name' => 'required|string|max:255',
        ]);
    }

    /**
     * Prevent deactivation when active instances exist.
     */
    public function updating(
        WorkflowBlueprint $workflowBlueprint,
    ): void {
        if (
            $workflowBlueprint->isDirty('active')
            && ! $workflowBlueprint->active
            && $workflowBlueprint->workflowInstances()
                ->where('status', 'active')
                ->exists()
        ) {
            throw new \RuntimeException(
                'Cannot deactivate blueprint with active workflow instances.'
            );
        }
    }
}
