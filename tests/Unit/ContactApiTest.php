<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Middleware\EnsureTokenIsValid;

class ContactApiTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        
        $response = $this->get('/api/contacts/?token=x');
        $response->assertOk();
       
        
        //TODO not work
        /*$response = $this->postJson('/api/contacts',[
            'name' => 'name2',
            'email' =>  'test2@mail.ru',
            'comment' => 'comment',
            'phone' => '+79112224455',
            'token' => EnsureTokenIsValid::TEMP_ACCESS_TOKEN,
         ]);
        
        $response->assertJson([
             'name' => 'name2',
        ]);*/
        //dd($response = $this->get('/'));
        //$response = $this->put('/api/contacts/8');
        //$response->dd();
    }
}
