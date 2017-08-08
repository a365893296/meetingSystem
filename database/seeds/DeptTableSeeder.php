<?php

use Illuminate\Database\Seeder;

class DeptTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory('App\Models\dept', 1)->create() ;

        \Illuminate\Support\Facades\DB::table('dept') ->delete() ;
        $depts = [
            '业务部', '工程部', '生产部',
            '管理部', '销售部', '市场开发部',
            '售后服务部', '设计部', '物料部',
            '统计部', '人力资源部', '总裁办',
        ];


        for ($i = 0; $i < count($depts); $i++) {

            switch ($i) {
                case 4:
                case 5:
                case 6:
                    $id = 1;
                    break;
                case 7:
                    $id = 2;
                    break;
                case 8:
                case 9 :
                    $id = 3;
                    break;
                case 10:
                case 11 :
                    $id = 4;
                    break;
                default:
                    $id = null;
            }

            \App\Models\dept::create([
                'name' => $depts[$i],
                'parent_id' => $id
            ]);
        }
    }
}
