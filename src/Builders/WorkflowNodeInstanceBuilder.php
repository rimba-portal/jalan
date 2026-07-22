<?php

declare(strict_types=1);

namespace Rimba\Flow\Builders;

use Illuminate\Database\Eloquent\Builder;

final class WorkflowNodeInstanceBuilder extends Builder
{
    public function active(): static
    {
        return $this->whereNull('completed_at');
    }

    public function completed(): static
    {
        return $this->whereNotNull('completed_at');
    }
}
