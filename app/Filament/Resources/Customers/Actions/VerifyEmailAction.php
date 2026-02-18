<?php

namespace App\Filament\Resources\Customers\Actions;

use App\Models\Customer;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class VerifyEmailAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->label('Verify Email')
            ->modalSubmitActionLabel('Verify')
            ->modalHeading('Verify Email Address')
            ->mountUsing(function (Customer $record, Action $action) {
                if (! $record->is_active) {
                    Notification::make()
                        ->title('Customer is inactive')
                        ->danger()
                        ->send();

                    $action->halt();
                }
            })
            ->action(function (Customer $record) {
                $record->is_email_verified = true;
                $record->save();
            });
    }

    public static function getDefaultName(): ?string
    {
        return 'verify_email_action';
    }
}
