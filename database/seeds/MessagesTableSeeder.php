<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)
            ->times(50)
            ->create()
            ->each(function (App\User $user) {
                factory(App\Message::class)
                    ->times(20)
                    ->create([
                        'user_id' => $user->id
                    ]);
            });
    }
}
