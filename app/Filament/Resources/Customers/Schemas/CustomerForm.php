<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        $htmlOptions = [
            'tailwind' => '<span style="color:#38bdf8;">Tailwind</span>',
            'alpine' => '<span style="color:#22c55e;">Alpine</span>',
            'laravel' => '<span style="color:#ef4444;">Laravel</span>',
            'livewire' => '<span style="color:#ec4899;">Livewire</span>',
        ];

        return $schema
            ->components([
                // BUG: allowHtml() without searchable()
                Select::make('type_without_searchable')
                    ->label('allowHtml() only')
                    ->options($htmlOptions)
                    ->allowHtml(),

                // WORKS: allowHtml() with searchable() — HTML renders correctly
                Select::make('type_with_searchable')
                    ->label('searchable() + allowHtml()')
                    ->options($htmlOptions)
                    ->searchable()
                    ->allowHtml(),
            ]);
    }
}
