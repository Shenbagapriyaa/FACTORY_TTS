<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLayModelRequest;
use App\Http\Requests\UpdateLayModelRequest;
use App\Models\Fabric;
use App\Models\FabricGroup;
use App\Models\LayModel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LayModelController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->input('search'));
        $layModels = LayModel::with(['fabricGroup','fabric'])
            ->when($search !== '', fn($q) => $q->where(function($q) use ($search) {
                $q->where('lay_model_code','like',"%{$search}%")
                  ->orWhere('lay_model_name','like',"%{$search}%")
                  ->orWhere('garment_size','like',"%{$search}%");
            }))
            ->latest()->paginate(10)->withQueryString();
        return view('lay-models.index', compact('layModels','search'));
    }

    public function create()
    {
        return view('lay-models.create', ['fabricGroups' => FabricGroup::with('fabrics')->orderBy('group_code')->get()]);
    }

    public function store(StoreLayModelRequest $request)
    {
        $data = $request->validated();
        $this->validateFabricBelongsToGroup($data['fabric_group_id'], $data['fabric_id']);
        LayModel::create($data);
        return redirect()->route('lay-models.index')->with('success','Lay model created successfully.');
    }

    public function show(LayModel $layModel)
    {
        $layModel->load(['fabricGroup','fabric']);
        return view('lay-models.show', compact('layModel'));
    }

    public function edit(LayModel $layModel)
    {
        $layModel->load(['fabricGroup','fabric']);
        return view('lay-models.edit', ['layModel'=>$layModel, 'fabricGroups'=>FabricGroup::with('fabrics')->orderBy('group_code')->get()]);
    }

    public function update(UpdateLayModelRequest $request, LayModel $layModel)
    {
        $data = $request->validated();
        $this->validateFabricBelongsToGroup($data['fabric_group_id'], $data['fabric_id']);
        $layModel->update($data);
        return redirect()->route('lay-models.show',$layModel)->with('success','Lay model updated successfully.');
    }

    public function destroy(LayModel $layModel)
    {
        $layModel->delete();
        return redirect()->route('lay-models.index')->with('success','Lay model deleted successfully.');
    }

    private function validateFabricBelongsToGroup(int $groupId, int $fabricId): void
    {
        $belongs = FabricGroup::whereKey($groupId)->whereHas('fabrics', fn($q) => $q->whereKey($fabricId))->exists();
        if (!$belongs) {
            throw ValidationException::withMessages(['fabric_id' => 'The selected fabric does not belong to the selected fabric group.']);
        }
    }
}
