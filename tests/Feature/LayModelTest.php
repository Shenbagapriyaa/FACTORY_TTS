<?php

namespace Tests\Feature;

use App\Models\Fabric;
use App\Models\FabricGroup;
use App\Models\LayModel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LayModelTest extends TestCase
{
    use RefreshDatabase;
    private function setupData(): array { $f=Fabric::factory()->create(); $other=Fabric::factory()->create(); $g=FabricGroup::create(['group_code'=>'FG-1','group_name'=>'Group','status'=>'Active']); $g->fabrics()->attach($f); return [$f,$other,$g]; }
    private function payload($f,$g): array { return ['lay_model_code'=>'LM-100','lay_model_name'=>'Test Lay','fabric_group_id'=>$g->id,'fabric_id'=>$f->id,'lay_length'=>12.5,'lay_width'=>72,'number_of_plies'=>50,'garment_size'=>'L','marker_length'=>11.8,'marker_width'=>68,'status'=>'Active']; }
    public function test_create_lay_model(): void { $u=User::factory()->create(); [$f,$o,$g]=$this->setupData(); $this->actingAs($u)->post('/lay-models',$this->payload($f,$g))->assertRedirect('/lay-models'); $this->assertDatabaseHas('lay_models',['lay_model_code'=>'LM-100','fabric_id'=>$f->id,'fabric_group_id'=>$g->id]); }
    public function test_reject_fabric_not_in_group(): void { $u=User::factory()->create(); [$f,$other,$g]=$this->setupData(); $this->actingAs($u)->post('/lay-models',$this->payload($other,$g))->assertSessionHasErrors(['fabric_id']); $this->assertDatabaseCount('lay_models',0); }
    public function test_update_and_view_lay_model(): void { $u=User::factory()->create(); [$f,$other,$g]=$this->setupData(); $l=LayModel::create($this->payload($f,$g)); $this->actingAs($u)->get('/lay-models/'.$l->id)->assertOk()->assertSee('LM-100'); $data=$this->payload($f,$g); $data['lay_model_code']='LM-101'; $this->put('/lay-models/'.$l->id,$data)->assertRedirect(); $this->assertDatabaseHas('lay_models',['id'=>$l->id,'lay_model_code'=>'LM-101']); }
}
