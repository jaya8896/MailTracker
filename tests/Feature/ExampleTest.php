<?php

namespace Tests\Feature;
\date_default_timezone_set('Asia/Kolkata');


use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /** @test */
    public function token_is_not_generated_before_auth(){
        $response = $this->json('POST', '/tokens');
        $response
            ->assertStatus(401)
            ->assertJson([
                'content' => "Error : 401 Unauthorized. Enter correct credentials.",
            ]);
    }

    /** @test */
    public function valid_open_token_is_generated_after_auth(){
        $response = $this->json('POST', '/tokens',[],['user_id'=>'5','pass'=>'admin']);
        $response
            ->assertStatus(200)
            ->assertJson([
                'content' => true,
            ]);
    }

    /** @test */
    public function valid_click_token_is_generated_after_auth(){
        $response = $this->json('POST', '/tokens',[],['user_id'=>'5','pass'=>'admin','dest'=>"https://www.directi.com"]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'content' => true,
            ]);
    }
}