<?php

namespace Tests\Feature\Models;

use App\Models\Category;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->category = Category::create(['user_id' => 1, 'item_id' => 1, 'name' => 'hoge1', 'comment' => 'hoge2']);
    }

    /**
     * Test Model
     */
    public function testModel()
    {
        // Insert
        $this->assertNotNull($this->category);
        $this->assertIsInt($this->category->id);

        // Update
        $this->category->name = 'test';
        $result               = $this->category->save();

        $this->assertTrue($result);

        // Select
        $fetchedCategory = Category::where('name', $this->category->name)->first();

        $this->assertSame($this->category->name, $fetchedCategory->name);
    }

    /**
     * Test SoftDeletes
     */
    public function testSoftDeletes()
    {
        $this->category->delete();

        // soft deleted
        $foundCategory = Category::find($this->category->id);
        $this->assertNull($foundCategory);

        // trashed object
        $trashedCategory = Category::withTrashed()->find($this->category->id);
        $this->assertSame($this->category->id, $trashedCategory->id);

        // soft delete flags
        $this->assertNotNull($trashedCategory->deleted_at);

        // restore Category
        $this->category->restore();
        $this->assertFalse($this->category->trashed());

        // force delete Category
        $this->category->forceDelete();
        $remainingCategorys = Category::all();
        $this->assertEmpty($remainingCategorys);
    }
}
