<?php

namespace Tests\Feature\Models;

use App\Models\Lable;
use Tests\TestCase;

class LableTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->lable = Lable::create(['item_id' => 1, 'name' => 'hoge1', 'content' => 'hoge2']);
    }

    /**
     * Test Model
     */
    public function testModel()
    {
        // Insert
        $this->assertNotNull($this->lable);
        $this->assertIsInt($this->lable->id);

        // Update
        $this->lable->name = 'test';
        $result            = $this->lable->save();

        $this->assertTrue($result);

        // Select
        $fetchedLable = Lable::where('name', $this->lable->name)->first();

        $this->assertSame($this->lable->name, $fetchedLable->name);
    }

    /**
     * Test SoftDeletes
     */
    public function testSoftDeletes()
    {
        $this->lable->delete();

        // soft deleted
        $foundLable = Lable::find($this->lable->id);
        $this->assertNull($foundLable);

        // trashed object
        $trashedLable = Lable::withTrashed()->find($this->lable->id);
        $this->assertSame($this->lable->id, $trashedLable->id);

        // soft delete flags
        $this->assertNotNull($trashedLable->deleted_at);

        // restore Lable
        $this->lable->restore();
        $this->assertFalse($this->lable->trashed());

        // force delete Lable
        $this->lable->forceDelete();
        $remainingLables = Lable::all();
        $this->assertEmpty($remainingLables);
    }
}
