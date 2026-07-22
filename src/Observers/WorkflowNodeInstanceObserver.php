<?php

declare(strict_types=1);

namespace Rimba\Flow\Observers;

use Rimba\Flow\Models\WorkflowNodeInstance;

final class WorkflowNodeInstanceObserver
{
    /**
     * Activated timestamp is set automatically.
     */
    public function creating(
        WorkflowNodeInstance $nodeInstance,
    ): void {
        $nodeInstance->activated_at ??= now();
    }
}
