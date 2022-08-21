<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use function Symfony\Component\String\u;

class LoginTest extends TestCase
{
//    /** @test */
//    public function スカウトログインができること()
//    {
//        $response = $this->actingAs(Owner::find(1)) //id = 1のユーザーとして認証
//        ->get('/dashboard')
//            ->assertStatus(200);
//    }

    /** @test */
    public function 管理者ログイン画面を開ける()
    {
        $this->get('/admin/login')->assertOk();
    }

    /**
     * @test
     */
    public function ログイン時の入力チェック()
    {
        $url = '/admin/login';
        $this->from($url)->post($url, [])->assertRedirect($url);
        app()->setLocale('testing');

        $this->post($url, ['email' => ''])->assertInvalid(['email' => 'required',]);
        $this->post($url, ['email' => 'aa@bb@cc'])->assertInvalid(['email' => 'email',]);
        $this->post($url, ['password' => ''])->assertInvalid(['password' => 'required',]);
    }

    /** @test */
    public function 管理者ログインができること()
    {
        $url = '/admin/login';
        $this->from($url)->post($url, [])->assertRedirect($url);
        app()->setLocale('testing');

        $admin = Admin::factory()->create([
            'name' => 'test123',
            'email' => 'test123@example.com',
            'password' => \Hash::make('password'),
        ]);
        //ハッシュ化する
        $this->post($url, ['email' => 'test123@example.com', 'password' => 'password'])
            ->assertRedirect('admin/dashboard');

        $this->assertAuthenticatedAs($admin, 'admin')->get('admin/games')->assertOk();
    }

}
