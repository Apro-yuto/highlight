<?php

namespace Tests\Feature\Models;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::create(['name' => 'hogehoge', 'email' => 'test@example.com', 'password' => 'password']);
    }

    /**
     * Test Model
     */
    public function testModel()
    {
        // Insert
        $this->assertNotNull($this->user);
        $this->assertIsInt($this->user->id);

        // Update
        $this->user->name = 'test';
        $result           = $this->user->save();

        $this->assertTrue($result);

        // Select
        $fetchedUser = User::where('name', $this->user->name)->first();

        $this->assertSame($this->user->name, $fetchedUser->name);
    }

    /**
     * Test SoftDeletes
     */
    public function testSoftDeletes()
    {
        $this->user->delete();

        // soft deleted
        $foundUser = User::find($this->user->id);
        $this->assertNull($foundUser);

        // trashed object
        $trashedUser = User::withTrashed()->find($this->user->id);
        $this->assertSame($this->user->id, $trashedUser->id);

        // soft delete flags
        $this->assertNotNull($trashedUser->deleted_at);

        // restore user
        $this->user->restore();
        $this->assertFalse($this->user->trashed());

        // force delete user
        $this->user->forceDelete();
        $remainingUsers = User::all();
        $this->assertEmpty($remainingUsers);
    }
}
