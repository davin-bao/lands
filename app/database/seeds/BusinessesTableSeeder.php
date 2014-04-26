<?php

class BusinessesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('businesses')->delete();

        $businesses = array(
            array( // 1
                'business_name' => '业务介绍',
                'business_content'=>'内容详情'
            )
        );

        DB::table('businesses')->insert( $businesses );
    }

}