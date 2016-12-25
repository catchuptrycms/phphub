<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    protected $seeders = [
        'UsersTableSeeder',
        'LinksTableSeeder',
        'CategoriesTableSeeder',
        'TopicsTableSeeder',
        'RepliesTableSeeder',
        'BannersTableSeeder',
        'FollowersTableSeeder',
        'ActiveUsersTableSeeder',
        'HotTopicsTableSeeder',
        'SitesTableSeeder',
        'OauthClientsTableSeeder',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        insanity_check();

        Model::unguard();

        foreach ($this->seeders as $seedClass) {
            $this->call($seedClass);
        }

        Model::reguard();
    }
}
