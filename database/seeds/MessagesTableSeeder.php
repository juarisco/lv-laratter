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
        // factory(App\User::class)
        //     ->times(50)
        //     ->create()
        //     ->each(function (App\User $user) {
        //         factory(App\Message::class)
        //             ->times(20)
        //             ->create([
        //                 'user_id' => $user->id
        //             ]);
        //     });

        $users = factory(App\User::class)->times(50)->create();

        $users->each(function (App\User $user) use ($users) {

            $messages = factory(App\Message::class)
                ->times(20)
                ->create([
                    'user_id' => $user->id,
                ]);

            $messages->each(function (App\Message $message) use ($users) {
                factory(App\Response::class, random_int(1, 10))
                    ->create([
                        'message_id' => $message->id,
                        'user_id' => $users->random(1)->first()->id
                    ]);
            });

            $user->follows()->sync(
                $users->random(10)
            );
        });
    }
}
