<?php

namespace Tests\Feature\Models;

use App\Models\Brand;
use Tests\TestCase;

class BrandTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->brand = Brand::create(['user_id' => 1, 'item_id' => 1, 'name' => 'hoge1', 'comment' => 'hoge2']);
    }

    /**
     * Test Model
     */
    public function testModel()
    {
        // Insert
        $this->assertNotNull($this->brand);
        $this->assertIsInt($this->brand->id);

        // Update
        $this->brand->name = 'test';
        $result            = $this->brand->save();

        $this->assertTrue($result);

        // Select
        $fetchedBrand = Brand::where('name', $this->brand->name)->first();

        $this->assertSame($this->brand->name, $fetchedBrand->name);
    }

    /**
     * Test SoftDeletes
     */
    public function testSoftDeletes()
    {
        $this->brand->delete();

        // soft deleted
        $foundBrand = Brand::find($this->brand->id);
        $this->assertNull($foundBrand);

        // trashed object
        $trashedBrand = Brand::withTrashed()->find($this->brand->id);
        $this->assertSame($this->brand->id, $trashedBrand->id);

        // soft delete flags
        $this->assertNotNull($trashedBrand->deleted_at);

        // restore Brand
        $this->brand->restore();
        $this->assertFalse($this->brand->trashed());

        // force delete Brand
        $this->brand->forceDelete();
        $remainingBrands = Brand::all();
        $this->assertEmpty($remainingBrands);
    }
}
