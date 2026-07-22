<?php

declare(strict_types=1);

namespace Rimba\Flow\Services;

use Illuminate\Database\Eloquent\Collection;
use Rimba\Flow\Actions\ActivateNode;
use Rimba\Flow\Actions\CompleteWorkflow;
use Rimba\Flow\Actions\ExecuteTransition;
use Rimba\Flow\Models\WorkflowBlueprint;
use Rimba\Flow\Models\WorkflowInstance;
use Rimba\Flow\Models\WorkflowNode;
use Rimba\Flow\Models\WorkflowNodeInstance;
use Rimba\Flow\Models\WorkflowTransition;

final class WorkflowEngine
{
    public function __construct(
        protected TransitionEvaluator $transitionEvaluator,
        protected NodeActivationService $nodeActivationService,
    ) {}

    public function processNodeCompletion(
        WorkflowNodeInstance $nodeInstance,
    ): void {

        $transitions = $nodeInstance
            ->workflowNode
            ->outgoingTransitions;

        $matchedTransitions = collect();

        foreach ($transitions as $transition) {

            if (
                $this->transitionEvaluator->passes(
                    $transition,
                    $nodeInstance->workflowInstance,
                )
            ) {
                $matchedTransitions->push($transition);
            }
        }

        if ($matchedTransitions->isEmpty()) {

            app(CompleteWorkflow::class)
                ->execute($nodeInstance->workflowInstance);

            return;
        }

        foreach ($matchedTransitions as $transition) {

            app(ExecuteTransition::class)
                ->execute(
                    $nodeInstance->workflowInstance,
                    $transition,
                );

            $this->nodeActivationService
                ->activate(
                    $nodeInstance->workflowInstance,
                    $transition->toNode,
                );
        }
    }
}

