<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('UserSeeder');
        $this->call('CategorySeeder');
        $this->call('TagSeeder');
        $this->call('ResourceSeeder');
        $this->call('BookSeeder');
        $this->call('ResourceTagSeeder');

        Model::reguard();
    }
}
