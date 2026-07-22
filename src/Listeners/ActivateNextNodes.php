<?php

namespace Rimba\Flow\Listeners;

use Rimba\Flow\Events\WorkflowTransitionExecuted;

final class ActivateNextNodes
{
    public function handle(
        WorkflowTransitionExecuted $event,
    ): void {
        // Optional listener.
        // Useful when supporting parallel branches later.
    }
}
