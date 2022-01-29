<?php

namespace Tests\Feature\Models;

use App\Models\Supplier;
use Tests\TestCase;

class SupplierTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->supplier = Supplier::create(['user_id' => 1, 'item_id' => 1, 'name' => 'hoge1']);
    }

    /**
     * Test Model
     */
    public function testModel()
    {
        // Insert
        $this->assertNotNull($this->supplier);
        $this->assertIsInt($this->supplier->id);

        // Update
        $this->supplier->name = 'test';
        $result               = $this->supplier->save();

        $this->assertTrue($result);

        // Select
        $fetchedSupplier = Supplier::where('name', $this->supplier->name)->first();

        $this->assertSame($this->supplier->name, $fetchedSupplier->name);
    }

    /**
     * Test SoftDeletes
     */
    public function testSoftDeletes()
    {
        $this->supplier->delete();

        // soft deleted
        $foundSupplier = Supplier::find($this->supplier->id);
        $this->assertNull($foundSupplier);

        // trashed object
        $trashedSupplier = Supplier::withTrashed()->find($this->supplier->id);
        $this->assertSame($this->supplier->id, $trashedSupplier->id);

        // soft delete flags
        $this->assertNotNull($trashedSupplier->deleted_at);

        // restore Supplier
        $this->supplier->restore();
        $this->assertFalse($this->supplier->trashed());

        // force delete Supplier
        $this->supplier->forceDelete();
        $remainingSuppliers = Supplier::all();
        $this->assertEmpty($remainingSuppliers);
    }
}
