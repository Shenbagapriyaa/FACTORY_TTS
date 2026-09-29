<?php

namespace Tests\Feature;

use App\Models\Fabric;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FabricTest extends TestCase
{
    use RefreshDatabase;
    private function admin(): User { return User::factory()->create(); }
    public function test_create_fabric(): void { $this->actingAs($this->admin())->post('/fabrics',['fabric_code'=>'FAB-100','fabric_name'=>'Test Cotton','fabric_type'=>'Knitted','gsm'=>180,'width'=>72,'unit'=>'KG','status'=>'Active'])->assertRedirect('/fabrics'); $this->assertDatabaseHas('fabrics',['fabric_code'=>'FAB-100']); }
    public function test_duplicate_code_rejected(): void { $this->actingAs($this->admin()); Fabric::factory()->create(['fabric_code'=>'FAB-100']); $this->post('/fabrics',['fabric_code'=>'FAB-100','fabric_name'=>'Test','fabric_type'=>'Knitted','status'=>'Active'])->assertSessionHasErrors('fabric_code'); }
    public function test_invalid_negative_values_rejected(): void { $this->actingAs($this->admin())->post('/fabrics',['fabric_code'=>'FAB-101','fabric_name'=>'Test','fabric_type'=>'Knitted','gsm'=>-1,'width'=>-2,'status'=>'Active'])->assertSessionHasErrors(['gsm','width']); }
    public function test_view_update_and_delete_fabric(): void { $u=$this->admin(); $f=Fabric::factory()->create(); $this->actingAs($u)->get('/fabrics/'.$f->id)->assertOk(); $this->put('/fabrics/'.$f->id,$f->toArray()+['fabric_code'=>'FAB-UPD','status'=>'Active'])->assertRedirect('/fabrics'); $this->assertDatabaseHas('fabrics',['id'=>$f->id,'fabric_code'=>'FAB-UPD']); $this->delete('/fabrics/'.$f->id)->assertRedirect('/fabrics'); $this->assertSoftDeleted($f); }
}
