<?php

namespace App\Livewire;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Schema;
use Livewire\Component;

class CustomComponentTest extends Component implements HasForms
{
    use InteractsWithForms;

    public bool $showComponent = false;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('file')
                    ->label('File')
                    ->required(),
            ]);
    }

    public function displayComponent()
    {
        $this->showComponent = true;
    }

    public function cancelComponent()
    {
        $this->showComponent = false;
    }

    public function render()
    {
        return view('livewire.custom-component-test');
    }
}
