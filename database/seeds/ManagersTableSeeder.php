<?php

use Illuminate\Database\Seeder;

class ManagersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            'username' => 'admin',
            'password' => bcrypt('wsad0806'),
            'active' => 1,
        ];
        DB::table('managers')->insert($data);
        $data = [
            'username' => '水王子',
            'password' => bcrypt('wsad0806'),
            'status' => 0,
            'active' => 0,
        ];
        DB::table('managers')->insert($data);
    }
}
