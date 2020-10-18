<?php

use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;
use App\Room;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'monsef@gmail.com',
                'password'       => '$2y$10$VOunUZVMv4bwC84FJngVdORh/3WOQsLYXcHOTcmsVFWTVWWg.V8/i',
                'remember_token' => null,
            ]
        ];

        User::insert($user);

        $roles = [
            [
                'id'             => 1,
                'slug'             => 'admin',
                'name'             => 'Administrator',
                'permissions'      => null,
            ],
            [
                'id'             => 2,
                'slug'             => 'emp',
                'name'             => 'Employee',
                'permissions'      => null,
            ],
            [
                'id'             => 3,
                'slug'             => 'user',
                'name'             => 'User',
                'permissions'      => null,
            ]
        ];

        Role::insert($roles);

        DB::insert('insert into role_users (user_id , role_id ) values (?, ?)', [1, 1]);

        $room = [
            [
                'id'    => 1,
                'name' => 'ac123',
                'type' => 'meeting_room',
                'capacity' => 20,
                'hourly_rate' => 150,
                'over_capacity' => 10,
                'extra_price' => 15,
            ],
            [
                'id'    => 2,
                'name' => 'room1table1',
                'type' => 'room',
                'capacity' => 1,
                'hourly_rate' => 15,
                'over_capacity' => 0,
                'extra_price' => 0,
            ],
            [
                'id'    => 3,
                'name' => 'room1table2',
                'type' => 'room',
                'capacity' => 1,
                'hourly_rate' => 15,
                'over_capacity' => 0,
                'extra_price' => 0,
            ],
            [
                'id'    => 4,
                'name' => 'room1table3',
                'type' => 'room',
                'capacity' => 1,
                'hourly_rate' => 15,
                'over_capacity' => 0,
                'extra_price' => 0,
            ],
        ];

        Room::insert($room);
    }
}
