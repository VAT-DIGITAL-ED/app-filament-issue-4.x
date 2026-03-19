<?php

namespace App\Filament\Resources\Customers\Tables;

use App\Filament\Resources\Customers\Actions\ViewCustomerAction;
use App\Filament\Resources\Customers\CustomerResource;
use App\Models\Customer;
use Dom\Text;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CustomersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Name'),
                TextColumn::make('email')->label('Email'),
            ])
            ->filters([
                //
            ])
            ->recordUrl(null)
            ->recordActions([
                ViewCustomerAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
