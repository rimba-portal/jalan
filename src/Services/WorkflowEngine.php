<?php

declare(strict_types=1);

namespace Rimba\Flow\Services;

use Rimba\Flow\Actions\CompleteWorkflow;
use Rimba\Flow\Actions\ExecuteTransition;
use Rimba\Flow\Models\WorkflowNodeInstance;

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
