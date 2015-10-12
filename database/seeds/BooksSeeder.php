<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('books')->truncate();

        $books = [
            [
                'asin'      => 'dsajifdsjao',
                'title'     => 'Vagrant入門ガイド',
                'price'     => 400,
                'inventory' => 10,
            ],
            [
                'asin'      => 'dsajifdsjao1',
                'title'     => 'PHPエンジニア',
                'price'     => 2138,
                'inventory' => 10,
            ],
            [
                'asin'      => 'dsajifdsjao2',
                'title'     => 'CakePHP2',
                'price'     => 3110,
                'inventory' => 2,
            ],
        ];
        $now = Carbon::now();
        foreach ($books as $v) {
            $v['created_at'] = $now;
            $v['updated_at'] = $now;
            DB::table('books')->insert($v);
        }

    }
}
