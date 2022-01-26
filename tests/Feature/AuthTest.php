<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * ログインページが表示できるか確認。
     *
     * @return void
     */
    public function testCanDisplayLoginPage()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    /**
     * 登録済みのユーザーで正常にログインができるか確認。
     *
     * @return void
     */
    public function testCanLogin()
    {
        $user = User::factory()->create();

        $data = [
            'email'    => $user->email,
            'password' => 'password',
        ];

        $this->post('/login', $data)->assertRedirect(route('item.index'));
    }

    /**
     * 登録済みのユーザーで正常にログインができるか確認。
     *
     * @return void
     */
    public function testCantLogin()
    {
        $data = [
            'email'    => 'helloworld@gmail.com',
            'password' => 'password',
        ];

        $this->from('/login')
              ->post('/login', $data)
              ->assertRedirect('/login');
    }

    /**
     * 認証状態でログインページにアクセス
     *
     * @return void
     */
    public function testCanAccessTopPage()
    {
        $user = User::factory()->make();
        $this->actingAs($user);
        $this->assertAuthenticated();

        $this->get('/login')->assertRedirect(route('item.index'));
    }

    /**
     * 非認証時にtopページにアクセス
     *
     * @return void
     */
    public function testCantAccessTopPage()
    {
        $this->assertGuest();

        $this->get(route('item.index'))->assertRedirect('/login');
    }
}
