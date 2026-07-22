<?php

declare(strict_types=1);

namespace Rimba\Flow\Observers;

use Rimba\Flow\Models\WorkflowTransitionInstance;

final class WorkflowTransitionInstanceObserver
{
    /**
     * Executed timestamp is set automatically.
     */
    public function creating(
        WorkflowTransitionInstance $transitionInstance,
    ): void {
        $transitionInstance->executed_at ??= now();
    }
}
