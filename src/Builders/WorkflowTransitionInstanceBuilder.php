<?php

declare(strict_types=1);

namespace Rimba\Flow\Builders;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

final class WorkflowTransitionInstanceBuilder extends Builder
{
    public function executedBy(int $userId): static
    {
        return $this->where('executed_by_id', $userId);
    }

    public function executedBetween(
        Carbon $from,
        Carbon $to,
    ): static {
        return $this->whereBetween('executed_at', [
            $from,
            $to,
        ]);
    }
}
