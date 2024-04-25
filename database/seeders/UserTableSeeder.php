<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Super Admin';
        $user->email = 'superadmin@gmail.com';
        $user->password = HASH::make('123456789');
        $user->phone = '9384322889';
        $user->is_verified =1;

        $user->save();
        echo '-----------User  Created----------------'."\n";
        echo '----------------------------------------'."\n";
        echo '----------Assigning Super Admin role to=>'.$user->email. '---------'."\n";

        $user->assignRole('Super Admin');
        echo '-----Assigning Super Admin role to =>'.$user->email. 'completed------'."\n";

        echo '------User Seeding Completed----------'. "\n";
    }
}
