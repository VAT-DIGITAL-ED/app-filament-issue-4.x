<div>
    <x-filament::button wire:click="displayComponent">
        Display Component
    </x-filament::button>

    @if($showComponent)
        <x-filament::card>
            {{ $this->form }}
        </x-filament::card>

        <x-filament::button wire:click="cancelComponent">
            Cancel
        </x-filament::button>
    @endif
</div>
