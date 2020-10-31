<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test()
    {
        $user = new \App\User;
        $user->name = "山田";
        $user->email = "yamada@test.com";
        $user->password = \Hash::make('password');
        $user->save();
     
        $readUser = \App\User::where('name', '山田')->first();
        $this->assertNotNull($readUser);            // データが取得できたかテスト
        $this->assertTrue(\Hash::check('password', $readUser->password)); // パスワードが一致しているかテスト
     
        \App\User::where('email', 'yamada@test.com')->delete(); // テストデータの削除
    }
}
