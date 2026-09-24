<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFabricRequest;
use App\Http\Requests\UpdateFabricRequest;
use App\Models\Fabric;
use Illuminate\Http\Request;

class FabricController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->input('search'));
        $fabrics = Fabric::query()
            ->when($search !== '', fn($q) => $q->where(function($q) use ($search) {
                $q->where('fabric_code','like',"%{$search}%")
                  ->orWhere('fabric_name','like',"%{$search}%")
                  ->orWhere('fabric_type','like',"%{$search}%")
                  ->orWhere('color','like',"%{$search}%");
            }))
            ->latest()->paginate(10)->withQueryString();
        return view('fabrics.index', compact('fabrics','search'));
    }

    public function create() { return view('fabrics.create'); }

    public function store(StoreFabricRequest $request)
    {
        Fabric::create($request->validated());
        return redirect()->route('fabrics.index')->with('success','Fabric created successfully.');
    }

    public function show(Fabric $fabric) { return view('fabrics.show', compact('fabric')); }

    public function edit(Fabric $fabric) { return view('fabrics.edit', compact('fabric')); }

    public function update(UpdateFabricRequest $request, Fabric $fabric)
    {
        $fabric->update($request->validated());
        return redirect()->route('fabrics.index')->with('success','Fabric updated successfully.');
    }

    public function destroy(Fabric $fabric)
    {
        if ($fabric->layModels()->exists()) {
            return back()->with('error','This fabric is already used in a lay model and cannot be deleted.');
        }
        $fabric->groups()->detach();
        $fabric->delete();
        return redirect()->route('fabrics.index')->with('success','Fabric deleted successfully.');
    }
}
