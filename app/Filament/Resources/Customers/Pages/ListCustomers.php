<?php

namespace App\Filament\Resources\Customers\Pages;

use App\Filament\Resources\Customers\CustomerResource;
use App\Models\Customer;
use Filament\Actions\CreateAction;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListCustomers extends ListRecords
{
    protected static string $resource = CustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'active' => Tab::make('Active')
            ->modifyQueryUsing(function (Builder $query) {
                return $query->where('is_active', true);
            })
            ->badge(fn(): int => Customer::where('is_active', true)->count()),
            'inactive' => Tab::make('Inactive')
            ->modifyQueryUsing(function (Builder $query) {
                return $query->where('is_active', false);
            })
            ->badge(fn(): int => Customer::where('is_active', false)->count())
        ];
    }
}
