<?php

namespace App\Filament\Resources\Customers\Actions;

use App\Filament\Resources\Customers\CustomerResource;
use Filament\Actions\Action;
use Filament\Schemas\Components\View;

class ViewCustomerAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->label('View')
            ->modalSubmitAction(false)
            ->modalWidth('2xl')
            ->modalHeading('Customer Details')
            ->schema([
                View::make('custom-component-test')
                    ->view('filament.components.custom-component-test-modal')
                    ->columnSpanFull(),
            ]);
    }

    public static function getDefaultName(): ?string
    {
        return 'view_customer';
    }
}
