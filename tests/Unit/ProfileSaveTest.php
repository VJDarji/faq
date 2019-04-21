<?php

namespace Tests\Unit;

use App\Profile;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfileSaveTest extends TestCase {
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample() {
        $user = factory(User::class)->create();
        $profile = factory(Profile::class)->make();
        $profile->user()
                ->associate($user);
        $this->assertTrue($profile->save());
    }
}
