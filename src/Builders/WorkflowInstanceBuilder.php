<?php

declare(strict_types=1);

namespace Rimba\Flow\Builders;

use Illuminate\Database\Eloquent\Builder;

final class WorkflowInstanceBuilder extends Builder
{
    public function active(): static
    {
        return $this->where('status', 'active');
    }

    public function completed(): static
    {
        return $this->where('status', 'completed');
    }

    public function cancelled(): static
    {
        return $this->where('status', 'cancelled');
    }
}
