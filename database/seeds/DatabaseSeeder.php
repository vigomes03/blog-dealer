<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

    	// User Admin
		$user           = new \App\User;
		$user->name     = "admin";
		$user->email    = "admin@admin";
		$user->password = Hash::make("root");
		$user->is_admin = "Y";
		$user->status   = "A";
		$user->save();

		// Nunca fazer isso é muito errado, mas é mais rápido para testar

        // $this->call(UsersTableSeeder::class);

    }
}
