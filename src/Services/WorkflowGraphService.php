<?php

declare(strict_types=1);

namespace Rimba\Flow\Services;

use Illuminate\Database\Eloquent\Collection;
use Rimba\Flow\Models\WorkflowBlueprint;
use Rimba\Flow\Models\WorkflowNode;

final class WorkflowGraphService
{
    public function startNode(
        WorkflowBlueprint $workflowBlueprint,
    ): ?WorkflowNode {

        return $workflowBlueprint
            ->workflowNodes()
            ->where('type', 'start')
            ->first();
    }

    public function endNodes(
        WorkflowBlueprint $workflowBlueprint,
    ): Collection {

        return $workflowBlueprint
            ->workflowNodes()
            ->where('type', 'end')
            ->get();
    }

    public function nextNodes(
        WorkflowNode $node,
    ): Collection {

        return $node->outgoingTransitions
            ->map(fn ($transition) => $transition->toNode);
    }

    public function previousNodes(
        WorkflowNode $node,
    ): Collection {

        return $node->incomingTransitions
            ->map(fn ($transition) => $transition->fromNode);
    }

    public function hasIncomingTransitions(
        WorkflowNode $node,
    ): bool {

        return $node
            ->incomingTransitions()
            ->exists();
    }

    public function hasOutgoingTransitions(
        WorkflowNode $node,
    ): bool {

        return $node
            ->outgoingTransitions()
            ->exists();
    }

    public function isStartNode(
        WorkflowNode $node,
    ): bool {

        return ! $this->hasIncomingTransitions($node);
    }

    public function isEndNode(
        WorkflowNode $node,
    ): bool {

        return ! $this->hasOutgoingTransitions($node);
    }
}
