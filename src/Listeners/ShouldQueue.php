<?php

namespace Rimba\Flow\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Rimba\Trail\Models\AuditLog;

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
