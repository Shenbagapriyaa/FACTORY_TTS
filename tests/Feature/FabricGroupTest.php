<?php

namespace Tests\Feature;

use App\Models\Fabric;
use App\Models\FabricGroup;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FabricGroupTest extends TestCase
{
    use RefreshDatabase;
    public function test_create_group_with_multiple_fabrics(): void { $u=User::factory()->create(); $a=Fabric::factory()->create(); $b=Fabric::factory()->create(); $this->actingAs($u)->post('/fabric-groups',['group_code'=>'FG-100','group_name'=>'Cotton Group','status'=>'Active','fabric_ids'=>[$a->id,$b->id]])->assertRedirect(); $g=FabricGroup::where('group_code','FG-100')->firstOrFail(); $this->assertCount(2,$g->fabrics); }
    public function test_group_requires_fabric(): void { $this->actingAs(User::factory()->create())->post('/fabric-groups',['group_code'=>'FG-101','group_name'=>'Empty','status'=>'Active','fabric_ids'=>[]])->assertSessionHasErrors('fabric_ids'); }
    public function test_remove_fabric_from_group(): void { $u=User::factory()->create(); $a=Fabric::factory()->create(); $b=Fabric::factory()->create(); $g=FabricGroup::create(['group_code'=>'FG-102','group_name'=>'Group','status'=>'Active']); $g->fabrics()->sync([$a->id,$b->id]); $this->actingAs($u)->put('/fabric-groups/'.$g->id,['group_code'=>'FG-102','group_name'=>'Group','status'=>'Active','fabric_ids'=>[$a->id]])->assertRedirect(); $this->assertTrue($g->fresh()->fabrics->contains($a)); $this->assertFalse($g->fresh()->fabrics->contains($b)); }
    public function test_view_group_fabrics(): void { $u=User::factory()->create(); $g=FabricGroup::create(['group_code'=>'FG-103','group_name'=>'Group','status'=>'Active']); $f=Fabric::factory()->create(); $g->fabrics()->attach($f); $this->actingAs($u)->get('/fabric-groups/'.$g->id)->assertOk()->assertSee($f->fabric_code); }
}
