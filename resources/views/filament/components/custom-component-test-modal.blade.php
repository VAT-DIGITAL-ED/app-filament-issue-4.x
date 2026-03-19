<div>
    @foreach ([0, 1, 2] as $arr)
        @livewire('custom-component-test', key($arr))
    @endforeach
</div>
