<?php

namespace App\Filament\Resources\Customers\Actions;

use App\Models\Customer;
use Filament\Actions\Action;
use Filament\Infolists\Components\TextEntry;

class ViewCustomerAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->label('View')
            ->icon('heroicon-o-eye')
            ->modalSubmitAction(false)
            ->modalHeading(fn(Customer $record) => $record->name)
            ->slideOver()
            ->schema([
                TextEntry::make('name')
                    ->label('Name'),
                TextEntry::make('email')
                    ->label('Email'),
                TextEntry::make('is_active')
                    ->label('Active Status')
                    ->formatStateUsing(fn($state) => $state ? 'Active' : 'Inactive'),
                TextEntry::make('is_email_verified')
                    ->label('Email Verified')
                    ->formatStateUsing(fn($state) => $state ? 'Verified' : 'Not Verified'),
            ])
            ->modalFooterActions([
                VerifyEmailAction::make(),
                ToggleActiveStatusAction::make(),
            ]);
    }

    public static function getDefaultName(): ?string
    {
        return 'view_customer_action';
    }
}
