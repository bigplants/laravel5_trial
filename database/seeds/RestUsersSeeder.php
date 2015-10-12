<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RestUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('rest_users')->truncate();

        $rest_users = [
            [
                'api_token' => 'token1',
                'name'      => '大阪　太郎',
            ],
            [
                'api_token' => 'token2',
                'name'      => '神戸　花子',
            ],
            [
                'api_token' => 'token3',
                'name'      => '東京　次郎',
            ],
        ];

        $now = Carbon::now();
        foreach ($rest_users as $v) {
            $v['created_at'] = $now;
            $v['updated_at'] = $now;
            DB::table('rest_users')->insert($v);
        }
    }
}
