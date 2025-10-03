<?php

namespace Modules\Work\Observers;

use App\Models\User;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Modules\User\Filament\Resources\Users\RelationManagers\WorksRelationManager;
use Modules\User\Filament\Resources\Users\UserResource;
use Modules\Work\Enums\Status;
use Modules\Work\Filament\Resources\Works\WorkResource;
use Modules\Work\Models\Work;

class WorkObserver
{
    /**
     * Handle the Work "created" event.
     */
    public function created(Work $work): void
    {
        //
    }

    /**
     * Handle the Work "updated" event.
     */
    public function updated(Work $work): void
    {
        if (!$work->wasChanged() || $work->status !== Status::Unsuccessful) {
            return;
        }
        $url = UserResource::getUrl('edit', ['record' => $work->user]) . '?relation=0';

        $notify = Notification::make()
            ->title('Work has been updated')
            ->body($work->getRecordTitle())
            ->actions([
                Action::make('Open carrier works')
                    ->button()
                    ->url($url, shouldOpenInNewTab: true)
                    ->markAsRead(),
            ])
            ->toDatabase();
        User::role('admin')->get()
            ->each(fn (User $admin) => $admin->notify($notify));
    }

    /**
     * Handle the Work "deleted" event.
     */
    public function deleted(Work $work): void
    {
        //
    }

    /**
     * Handle the Work "restored" event.
     */
    public function restored(Work $work): void
    {
        //
    }

    /**
     * Handle the Work "force deleted" event.
     */
    public function forceDeleted(Work $work): void
    {
        //
    }
}
