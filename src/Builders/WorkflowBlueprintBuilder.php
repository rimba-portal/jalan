<?php

declare(strict_types=1);

namespace Rimba\Flow\Builders;

use Illuminate\Database\Eloquent\Builder;

final class WorkflowBlueprintBuilder extends Builder
{
    public function active(): static
    {
        return $this->where('active', true);
    }

    public function ownedBy(int $orgTeamId): static
    {
        return $this->where('owner_id', $orgTeamId);
    }
}
