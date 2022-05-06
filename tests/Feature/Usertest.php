<?php

namespace Tests\Feature;



use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\testing\DatabaseMigrations;
use Illuminate\Foundation\testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use  DatabaseMigrations;
    use DatabaseTransactions;

   public function testCreate()
   {
       User::create(['name'=>'name',
       'email'=>'email',
       'password'=>'password',
        'phone'=>'phone',
        'rol'=>'rol',
        'tipe'=>'tipe',
       'adress'=>'adress']);

       $users= User::index();
       $this->assertCount(1,$users);
   }
}
