<?php

use Illuminate\Database\Seeder;

class CauHinhTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cauhinhs = [
            [
                'name' => 'logo',
                'hinh' => 'smartlinks-logo.png',
                'order' => '1',
                'user_id' => '3'
            ],
            [
                'name' => 'Hình Trang Chủ Trái',
                'hinh' => 'pic01.jpg',
                'order' => '2',
                'user_id' => '3'
            ],
            [
                'name' => 'Liên Hệ',
                'noidung' => 'abc',
                'order' => '3',
                'user_id' => '3'
            ],
        ];
        foreach ($cauhinhs as $key => $value) {
            \App\CauHinh::create($value);
        }
    }
}
