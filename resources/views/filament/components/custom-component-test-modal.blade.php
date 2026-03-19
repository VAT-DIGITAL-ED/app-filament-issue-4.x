<div>
    @foreach ([0, 1, 2] as $arr)
        @livewire('custom-component-test', [
            'filingId' => 123,
            'salesDocumentId' => 456,
            'serviceTypeLabel' => 'Test Service Type',
        ], key($arr))
    @endforeach
</div>
