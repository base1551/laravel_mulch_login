<?php

namespace Tests\Feature\admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GameTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function サンプルテスト()
    {
        $response = $this->get('/');
        $response->assertStatus(302);
    }

//    /**
//     * @test
//     */
//    public function
}
