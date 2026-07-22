<?php

declare(strict_types=1);

namespace Rimba\Flow\Builders;

use Illuminate\Database\Eloquent\Builder;

final class WorkflowTransitionBuilder extends Builder
{
    public function fromNode(int $nodeId): static
    {
        return $this->where('from_node_id', $nodeId);
    }

    public function toNode(int $nodeId): static
    {
        return $this->where('to_node_id', $nodeId);
    }
}
