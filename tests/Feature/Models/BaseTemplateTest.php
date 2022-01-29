<?php

namespace Tests\Feature\Models;

use App\Models\BaseTemplate;
use Tests\TestCase;

class BaseTemplateTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->baseTemplate = BaseTemplate::create(['user_id' => 1, 'content_head' => 'hoge1', 'content_end' => 'hoge2', 'comment' => 'hoge3']);
    }

    /**
     * Test Model
     */
    public function testModel()
    {
        // Insert
        $this->assertNotNull($this->baseTemplate);
        $this->assertIsInt($this->baseTemplate->id);

        // Update
        $this->baseTemplate->content_head = 'test';
        $result                           = $this->baseTemplate->save();

        $this->assertTrue($result);

        // Select
        $fetchedBaseTemplate = BaseTemplate::where('content_head', $this->baseTemplate->content_head)->first();

        $this->assertSame($this->baseTemplate->content_head, $fetchedBaseTemplate->content_head);
    }

    /**
     * Test SoftDeletes
     */
    public function testSoftDeletes()
    {
        $this->baseTemplate->delete();

        // soft deleted
        $foundBaseTemplate = BaseTemplate::find($this->baseTemplate->id);
        $this->assertNull($foundBaseTemplate);

        // trashed object
        $trashedBaseTemplate = BaseTemplate::withTrashed()->find($this->baseTemplate->id);
        $this->assertSame($this->baseTemplate->id, $trashedBaseTemplate->id);

        // soft delete flags
        $this->assertNotNull($trashedBaseTemplate->deleted_at);

        // restore BaseTemplate
        $this->baseTemplate->restore();
        $this->assertFalse($this->baseTemplate->trashed());

        // force delete BaseTemplate
        $this->baseTemplate->forceDelete();
        $remainingBaseTemplates = BaseTemplate::all();
        $this->assertEmpty($remainingBaseTemplates);
    }
}
