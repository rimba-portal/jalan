<?php

declare(strict_types=1);

namespace Rimba\Flow\Services;

use Rimba\Flow\Models\WorkflowTransition;

final class TransitionEvaluator
{
    public function passes(
        WorkflowTransition $transition,
    ): bool {

        if (blank($transition->condition)) {
            return true;
        }

        /**
         * Future implementation:
         *
         * Examples:
         * amount > 1000
         * priority = urgent
         * requester.department = finance
         */

        return true;
    }
}
