<?php

declare(strict_types=1);

namespace Rimba\Flow\Observers;

use Rimba\Flow\Models\WorkflowTransition;

final class WorkflowTransitionObserver
{
    /**
     * Prevent self-referencing transitions.
     */
    public function creating(
        WorkflowTransition $transition,
    ): void {
        if (
            $transition->from_node_id ===
            $transition->to_node_id
        ) {
            throw new \RuntimeException(
                'A workflow node cannot transition to itself.'
            );
        }
    }
}
