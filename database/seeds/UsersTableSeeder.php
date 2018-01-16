<?php

use App\Profile;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = App\User::create([
            'name' => 'Chirill gaibu',
            'email' => 'chirill.gaibu@lugera.ro',
            'password' => bcrypt('isoscel'),
            'status' => 1,
        ]);
        Profile::create([
            'user_id' => $user->id,
            'avatar'=>'/uploads/avatars/1.png',
            'about'=>'admin',
        ]);

    }
}
