<?php

namespace App\Filament\Resources\Customers\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use App\Filament\Resources\Customers\CustomerResource;

class CustomersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Name'),
                TextColumn::make('email')->label('Email'),
                TextColumn::make('phone')->label('Phone'),
                TextColumn::make('is_active')->label('Active')
                    ->badge()
                    ->formatStateUsing(fn($state) => $state ? 'Active' : 'Inactive')->colors([
                        'success' => fn($state) => $state === true,
                        'danger' => fn($state) => $state === false,
                    ]),
                TextColumn::make('is_email_verified')->label('Email Verified')
                    ->badge()
                    ->formatStateUsing(fn($state) => $state ? 'Verified' : 'Unverified')->colors([
                        'success' => fn($state) => $state === true,
                        'danger' => fn($state) => $state === false,
                    ]),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                // EditAction::make(),
                Action::make('test_send_notification')
                    ->label('Send Notification Test')
                    ->action(function ($record) {
                        $user = auth()->user();

                        // Works correctly
                        Notification::make()
                            ->title('Works correctly')
                            ->success()
                            ->actions([
                                Action::make('view')
                                    ->label('View')
                                    ->url('https://filamentphp.com')
                                    ->button()
                                    ->markAsRead()
                                    ->close(),
                            ])
                            ->sendToDatabase($user);

                        // Does not work correctly
                        Notification::make()
                            ->title('Does not work correctly')
                            ->success()
                            ->actions([
                                Action::make('view')
                                    ->url(CustomerResource::getUrl('edit', [
                                        'record' => $record,
                                    ]))
                                    ->button()
                                    ->markAsRead()
                                    ->close(),
                            ])
                            ->sendToDatabase($user);
                    }),


            ]);
    }
}
