<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFabricGroupRequest;
use App\Http\Requests\UpdateFabricGroupRequest;
use App\Models\Fabric;
use App\Models\FabricGroup;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class FabricGroupController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->input('search'));
        $groups = FabricGroup::query()
            ->withCount('fabrics')
            ->when($search !== '', fn($q) => $q->where(function($q) use ($search) {
                $q->where('group_code','like',"%{$search}%")->orWhere('group_name','like',"%{$search}%");
            }))
            ->latest()->paginate(10)->withQueryString();
        return view('fabric-groups.index', compact('groups','search'));
    }

    public function create()
    {
        return view('fabric-groups.create', ['fabrics' => Fabric::orderBy('fabric_code')->get()]);
    }

    public function store(StoreFabricGroupRequest $request)
    {
        $data = $request->validated();
        $fabricIds = $data['fabric_ids'];
        unset($data['fabric_ids']);
        $group = FabricGroup::create($data);
        $group->fabrics()->sync($fabricIds);
        return redirect()->route('fabric-groups.show',$group)->with('success','Fabric group created successfully.');
    }

    public function show(FabricGroup $fabricGroup)
    {
        $fabricGroup->load('fabrics');
        return view('fabric-groups.show', compact('fabricGroup'));
    }

    public function edit(FabricGroup $fabricGroup)
    {
        $fabricGroup->load('fabrics');
        return view('fabric-groups.edit', [
            'fabricGroup' => $fabricGroup,
            'fabrics' => Fabric::orderBy('fabric_code')->get(),
            'selectedFabricIds' => $fabricGroup->fabrics->pluck('id')->all(),
        ]);
    }

    public function update(UpdateFabricGroupRequest $request, FabricGroup $fabricGroup)
    {
        $data = $request->validated();
        $fabricIds = $data['fabric_ids'];
        unset($data['fabric_ids']);
        $fabricGroup->update($data);
        $fabricGroup->fabrics()->sync($fabricIds);
        return redirect()->route('fabric-groups.show',$fabricGroup)->with('success','Fabric group updated successfully.');
    }

    public function destroy(FabricGroup $fabricGroup)
    {
        if ($fabricGroup->layModels()->exists()) {
            return back()->with('error','This fabric group is already used in a lay model and cannot be deleted.');
        }
        $fabricGroup->fabrics()->detach();
        $fabricGroup->delete();
        return redirect()->route('fabric-groups.index')->with('success','Fabric group deleted successfully.');
    }

    public function fabrics(FabricGroup $fabricGroup)
    {
        return response()->json($fabricGroup->fabrics()->orderBy('fabric_code')->get(['fabrics.id','fabric_code','fabric_name','status']));
    }
}
