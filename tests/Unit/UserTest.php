<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\User;
use Illuminate\Foundation\testing\DatabaseMigrations;
use Illuminate\Foundation\testing\DatabaseTransactions;

class UserTest extends TestCase
{
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
