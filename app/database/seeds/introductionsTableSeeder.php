<?php

class IntroductionsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('introductions')->delete();

        $introductions = array(
            array( // 1
                'introduction_name' => '公司简介',
                'introduction_content'=>'内容详情'
            )
        );

        DB::table('introductions')->insert( $introductions );
    }

}