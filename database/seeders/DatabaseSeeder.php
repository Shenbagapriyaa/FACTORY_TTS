<?php

namespace Database\Seeders;

use App\Models\Fabric;
use App\Models\FabricGroup;
use App\Models\LayModel;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::updateOrCreate(['email'=>'admin@example.com'], [
            'name'=>'Admin', 'password'=>Hash::make('ChangeMe@123'), 'role'=>'Admin'
        ]);

        $fabrics = collect([
            ['fabric_code'=>'FAB-001','fabric_name'=>'Cotton Single Jersey','fabric_type'=>'Knitted','composition'=>'100% Cotton','color'=>'Black','gsm'=>180,'width'=>72,'unit'=>'KG','status'=>'Active'],
            ['fabric_code'=>'FAB-002','fabric_name'=>'Cotton Rib','fabric_type'=>'Knitted','composition'=>'100% Cotton','color'=>'White','gsm'=>220,'width'=>68,'unit'=>'KG','status'=>'Active'],
            ['fabric_code'=>'FAB-003','fabric_name'=>'Cotton Interlock','fabric_type'=>'Knitted','composition'=>'100% Cotton','color'=>'Grey','gsm'=>200,'width'=>70,'unit'=>'KG','status'=>'Active'],
            ['fabric_code'=>'FAB-004','fabric_name'=>'Polyester','fabric_type'=>'Synthetic','composition'=>'100% Polyester','color'=>'Navy','gsm'=>160,'width'=>60,'unit'=>'KG','status'=>'Active'],
            ['fabric_code'=>'FAB-005','fabric_name'=>'Polyester Spandex','fabric_type'=>'Synthetic','composition'=>'95% Polyester 5% Spandex','color'=>'Black','gsm'=>190,'width'=>62,'unit'=>'KG','status'=>'Active'],
        ])->mapWithKeys(fn($f)=>[$f['fabric_code']=>Fabric::updateOrCreate(['fabric_code'=>$f['fabric_code']],$f)]);

        $g1 = FabricGroup::updateOrCreate(['group_code'=>'FG-001'], ['group_name'=>'Cotton Knitted Fabrics','description'=>'All cotton knitted fabrics','status'=>'Active']);
        $g2 = FabricGroup::updateOrCreate(['group_code'=>'FG-002'], ['group_name'=>'Synthetic Fabrics','description'=>'Synthetic and blended fabrics','status'=>'Active']);
        $g1->fabrics()->sync([$fabrics['FAB-001']->id,$fabrics['FAB-002']->id,$fabrics['FAB-003']->id]);
        $g2->fabrics()->sync([$fabrics['FAB-004']->id,$fabrics['FAB-005']->id]);

        LayModel::updateOrCreate(['lay_model_code'=>'LM-001'], [
            'lay_model_name'=>"Men's T-Shirt Lay", 'fabric_group_id'=>$g1->id, 'fabric_id'=>$fabrics['FAB-001']->id,
            'lay_length'=>12.50,'lay_width'=>72,'number_of_plies'=>50,'garment_size'=>'L','marker_length'=>11.80,'marker_width'=>68,'description'=>'Seed test lay model','status'=>'Active'
        ]);
        LayModel::updateOrCreate(['lay_model_code'=>'LM-002'], [
            'lay_model_name'=>"Men's Polo Lay", 'fabric_group_id'=>$g1->id, 'fabric_id'=>$fabrics['FAB-002']->id,
            'lay_length'=>14.00,'lay_width'=>68,'number_of_plies'=>45,'garment_size'=>'M','marker_length'=>13.40,'marker_width'=>65,'description'=>'Seed test polo lay','status'=>'Active'
        ]);
    }
}
