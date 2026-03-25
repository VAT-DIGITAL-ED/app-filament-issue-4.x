<?php

namespace Tests\Feature;

use App\Filament\Resources\Customers\Pages\ListCustomers;
use App\Models\Customer;
use Livewire\Livewire;
use Tests\TestCase;

class MountBulkActionTest extends TestCase
{
    /**
     * Demonstrates the bug: calling `mountBulkAction()` — the method the stub
     * says to use instead of the deprecated `mountTableBulkAction()` — throws
     * a BadMethodCallException because the method does not exist.
     */
    public function test_it_fails_with_BadMethodCallException_when_calling_mountBulkAction(): void
    {
        Customer::factory()->count(3)->create();

        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessageMatches('/mountBulkAction does not exist/');

        Livewire::test(ListCustomers::class)
            ->mountBulkAction('delete', Customer::all());
    }

    /**
     * Demonstrates the workaround: the deprecated `mountTableBulkAction()` still
     * works correctly, even though the stub instructs developers to stop using it.
     */
    public function test_it_works_with_the_deprecated_mountTableBulkAction(): void
    {
        Customer::factory()->count(3)->create();

        Livewire::test(ListCustomers::class)
            ->mountTableBulkAction('delete', Customer::all())
            ->assertTableBulkActionMounted('delete');
    }

    /**
     * Demonstrates the correct non-deprecated equivalent:
     * `selectTableRecords()` + `mountAction()` with the bulk action context
     * array `['name' => 'delete', 'context' => ['table' => true, 'bulk' => true]]`.
     *
     * This is exactly what `mountTableBulkAction()` does internally via
     * `parseNestedTableBulkActions()` before delegating to `mountAction()`.
     *
     * @see vendor/filament/tables/src/Testing/TestsBulkActions.php
     * @see vendor/filament/tables/src/Testing/TestsActions.php (parseNestedTableActions)
     */
    public function test_it_works_with_the_correct_non_deprecated_equivalent(): void
    {
        Customer::factory()->count(3)->create();

        Livewire::test(ListCustomers::class)
            ->selectTableRecords(Customer::all())
            ->mountAction([
                'name'    => 'delete',
                'context' => ['table' => true, 'bulk' => true],
            ])
            ->assertTableBulkActionMounted('delete');
    }
}
