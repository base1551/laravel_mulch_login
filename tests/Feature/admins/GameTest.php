<?php

namespace Tests\Feature\admins;

use App\Models\Admin;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GameTest extends TestCase
{
    // DatabaseSeederを実行
    use RefreshDatabase;

    /**
     * @test
     */
    public function 管理者以外は試合管理を閲覧できないこと()
    {
        $this->get('/admin/games')->assertRedirect('admin/login');
        $user = User::factory()->create();
        $owner = Owner::factory()->create();
        $this->actingAs($user, 'user')->get('admin/games')->assertN();

    }

    /**
     * @test
     */
    public function 認証している場合、試合一覧画面が表示できること()
    {
        $admin = Admin::factory()->create();
        $this->actingAs($admin, 'admin')->get('admin/games')->assertOk();
    }

    /**
     * @test
     */
    public function 試合を登録できる()
    {

    }

    /**
     * @test
     */
    public function 試合を更新できる()
    {

    }

    /**
     * @test
     */
    public function 試合を削除できる()
    {

    }

}
