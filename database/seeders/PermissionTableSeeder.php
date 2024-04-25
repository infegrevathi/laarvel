<?php

namespace Database\Seeders;

use App\Models\PermissionGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {
        $permissions = [
            [
                'name' => 'Dashboard Create',
                'permission_group_id' => permissionGroup::where( 'name', 'Dashboard' )->first()->id
            ],
            [
                'name' => 'Customer Create',
                'permission_group_id' => permissionGroup::where( 'name', 'Customer' )->first()->id
            ],
            [
                'name' => 'Customer List',
                'permission_group_id' => permissionGroup::where( 'name', 'Customer' )->first()->id
            ],
            [
                'name' => 'Customer Edit',
                'permission_group_id' => permissionGroup::where( 'name', 'Customer' )->first()->id
            ],
            [
                'name' => 'Customer Delete',
                'permission_group_id' => permissionGroup::where( 'name', 'Customer' )->first()->id
            ],
            [
                'name' => 'Financer View',
                'permission_group_id' => permissionGroup::where( 'name', 'Financer' )->first()->id
            ],
            [
                'name' => 'Financer Request',
                'permission_group_id' => permissionGroup::where( 'name', 'Financer' )->first()->id
            ],
            [
                'name' => 'Report View',
                'permission_group_id' => permissionGroup::where( 'name', 'Report' )->first()->id
            ],
            [
                'name' => 'Staff',
                'permission_group_id' => permissionGroup::where( 'name', 'Manage Staff' )->first()->id
            ],
        ];
        echo '-------------------------------------------' . '\n';
        echo '----------Permission Seeding---------' . '\n';
        foreach ( $permissions as $key => $value ) {
            $permission = new Permission;
            $permission->name = $value[ 'name' ];
            $permission->permission_group_id = $value[ 'permission_group_id' ];
            $permission->save();
            echo "---------Permission Name=> $permission->name------------".'\n';
        }
        echo '-----------------Permission Seeding Completed-----------------'.'\n';
    }
}
