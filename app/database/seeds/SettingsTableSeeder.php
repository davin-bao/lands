<?php

class SettingsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('settings')->delete();

        $introductions = array(
            array( // 1
                'site_url' => 'www.example.com',
                'company_name'=>'公司名称',
                'master_email'=>'master@example.com',
                'address'=>'公司地址',
                'service_phone'=>'400-8000-1234',
                'mobile'=>'+86 13988888888',
                'company_instroductions'=>'地缘网络是全球第一家也是最大的土地信息综合服务机构，是一个24小时在线的土地信息门户网站。土流网提供土地信息服务以及各种与土地相关的配套服务、发展土地服务产业链、发展连锁加盟店，是一个综合性的土地服务平台。',
                'services'=>'地缘网络定位于行业领先的农业土地信息综合服务机构，以互联网和遍布全国的连锁机构为载体，将掌握闲置土地的农民、土地流转中介机构、土地需求企业或个人三者有机的联系到一起，实现了土地资源的流转和优化配置，使得互联网深刻服务于中国8亿农民群体的生活改善与提高。',
                'contact'=>'联系我们内容'
            )
        );

        DB::table('settings')->insert( $introductions );
    }

}