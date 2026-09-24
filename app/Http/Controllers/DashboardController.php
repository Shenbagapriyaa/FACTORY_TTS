<?php

namespace App\Http\Controllers;

use App\Models\Fabric;
use App\Models\FabricGroup;
use App\Models\LayModel;

class DashboardController extends Controller
{
    public function index()
    {
        $fabricCount = Fabric::count();
        $fabricGroupCount = FabricGroup::count();
        $layModelCount = LayModel::count();

        return view('dashboard.index', compact(
            'fabricCount',
            'fabricGroupCount',
            'layModelCount'
        ));
    }
}