<?php

use App\Profile;
use App\User;
use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(Profile::class, 50)
            ->make()
            ->each(function ($profile) {
                $profile->user()
                        ->associate(factory(User::class)->create())
                        ->save();
            });
    }
}
