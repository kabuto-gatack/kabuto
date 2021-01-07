<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //新闻填充
        $data = [];
        for($i=1;$i<=30;$i++){
            $data[] = [
                'newstitle' => '经验分享：我是如何做好每日计划的',
                'keyword' => '经验分享：我是如何做好每日计划的',
                'picture' => 'news/BZDsdsBUydLFP5T7pZUq9suiX9ZaGEapBmS2hWiy.jpeg',
                'desc' => '在日常的工作中，不知道大家有没有遇到以下这些问题：面对这样的问题，我养成了一个习惯就是每天写工作计划。想在此与大家分享，希望对你们有所帮助，同时欢迎指正及共同探讨。',
                'remark' => '在日常的工作中，不知道大家有没有遇到以下这些问题：面对这样的问题，我养成了一个习惯就是每天写工作计划。想在此与大家分享，希望对你们有所帮助，同时欢迎指正及共同探讨。',
                'contents' => '在日常的工作中，不知道大家有没有遇到以下这些问题：面对这样的问题，我养成了一个习惯就是每天写工作计划。想在此与大家分享，希望对你们有所帮助，同时欢迎指正及共同探讨。在日常的工作中，不知道大家有没有遇到以下这些问题：面对这样的问题，我养成了一个习惯就是每天写工作计划。想在此与大家分享，希望对你们有所帮助，同时欢迎指正及共同探讨。',
                'created_at' => date("Y/m/d H:i:s"),
                'updated_at' => date("Y/m/d H:i:s")
            ];
        }
        DB::table("news")->insert($data);
    }
}
