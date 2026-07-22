<?php

declare(strict_types=1);

namespace Rimba\Flow\Builders;

use Illuminate\Database\Eloquent\Builder;

final class WorkflowNodeBuilder extends Builder
{
    public function starts(): static
    {
        return $this->where('type', 'start');
    }

    public function ends(): static
    {
        return $this->where('type', 'end');
    }

    public function type(string $type): static
    {
        return $this->where('type', $type);
    }
}
