<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $user=[
        //     'role' => 'Admin',
        //     'name'=>'Administrateur',
        //     'lastname'=>'G5',
        //     'tel'=>'0343037149',
        //     'email' => 'test@example.com',
        //     'password' => Hash::make('test@example.com')
        // ];
        // DB::table('users')->insert($user);

        $user=[
            'role' => 'candidat',
            'name'=>'RAKOTONIRINA',
            'lastname'=>'Zatovo',
            'tel'=>'0348021824',
            'email' => 'rakotonirinazatovo@gmail.com',
            'password' => Hash::make('rakotonirinazatovo@gmail.com')
        ];
        DB::table('users')->insert($user);
    }
}
