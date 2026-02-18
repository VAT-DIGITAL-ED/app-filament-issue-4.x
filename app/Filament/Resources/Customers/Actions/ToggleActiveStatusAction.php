<?php

namespace App\Filament\Resources\Customers\Actions;

use App\Models\Customer;
use Filament\Actions\Action;

class ToggleActiveStatusAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->label('Set Active Status')
            ->modalSubmitActionLabel('Toggle')
            ->modalHeading('Toggle Active Status')
            ->action(function (Customer $record) {
                $record->is_active = ! $record->is_active;
                $record->save();
            });
    }

    public static function getDefaultName(): ?string
    {
        return 'toggle_active_status_action';
    }
}