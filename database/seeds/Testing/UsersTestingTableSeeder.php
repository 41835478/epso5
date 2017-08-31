<?php

use App\Repositories\Profiles\Profile;
use App\Repositories\Users\User;
use Illuminate\Database\Seeder;

class UsersTestingTableSeeder extends Seeder
{
    private $total = 26;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create the God User
        $god = factory(User::class, 'user_god')->create();
        $god_profile = factory(Profile::class)->create(['user_id' => $god->id]);

        //Create the Admin User
        $admin = factory(User::class, 'user_admin')->create();
        $admin_profile = factory(Profile::class)->create(['user_id' => $admin->id]);

        //Create the Editor User
        $editor = factory(User::class, 'user_editor')->create();
        $editor_profile = factory(Profile::class)->create(['user_id' => $editor->id]);

        //Create the User
        $user = factory(User::class)->create();
        $user_profile = factory(Profile::class)->create(['user_id' => $user->id]);

        //Create the testing users
        for($x = 0; $x <= $this->total; $x++) {
            factory(Profile::class)->create([
                'user_id' => factory(User::class)->create()->id,
            ]);
        }
    }
}
