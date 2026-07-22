<?php

namespace Rimba\Flow\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Rimba\Trail\Models\AuditLog;
use Rimba\Flow\Actions\ActivateNode;
use Rimba\Flow\Actions\CompleteWorkflow;
use Rimba\Flow\Actions\ExecuteTransition;
use Rimba\Flow\Events\WorkflowCompleted;
use Rimba\Flow\Events\WorkflowNodeActivated;
use Rimba\Flow\Events\WorkflowNodeCompleted;
use Rimba\Flow\Events\WorkflowStarted;
use Rimba\Flow\Events\WorkflowTransitionExecuted;
use Rimba\Flow\Models\WorkflowNode;
use Rimba\Work\Actions\StartWorkPackage;
use Rimba\Work\Events\WorkPackageCompleted;


final class WriteAuditLog implements ShouldQueue
{
    public function handle(
        object $event,
    ): void {

        $model =
            $event->workflowInstance
            ?? $event->nodeInstance
            ?? $event->transitionInstance
            ?? null;

        if (! $model) {
            return;
        }

        AuditLog::create([
            'ref_type' => $model::class,
            'ref_id' => $model->id,
            'actor' => 'system',
            'action' => class_basename($event),
            'result' => 'success',
            'reason' => null,
            'metadata' => [],
        ]);
    }
}

