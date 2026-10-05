<?php

namespace App\Http\Controllers;

use App\Models\Fabric;
use App\Models\FabricGroup;
use App\Models\LayModel;
use App\Models\MaterialReceiving;
use App\Models\GRN;
use App\Models\Inspection;
use App\Models\FabricStore;
use App\Models\Relaxation;
use App\Models\Reservation;
use App\Models\FabricIssue;
use App\Models\Order;
use App\Models\Pattern;
use App\Models\Marker;
use App\Models\Cutting;
use App\Models\Bundle;
use App\Models\Sewing;
use App\Models\Washing;
use App\Models\Finishing;
use App\Models\Packing;
use App\Models\Shipment;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function index()
    {
        $dashboardCounts = Cache::remember(
            'dashboard_counts',
            now()->addMinutes(10),
            function () {
                return [

                    // MASTER
                    'fabricCount' => Fabric::count(),
                    'groupCount' => FabricGroup::count(),

                    // PRODUCTION
                    'materialReceivingCount' => MaterialReceiving::count(),
                    'grnCount' => GRN::count(),
                    'inspectionCount' => Inspection::count(),
                    'fabricStoreCount' => FabricStore::count(),
                    'relaxationCount' => Relaxation::count(),
                    'reservationCount' => Reservation::count(),
                    'fabricIssueCount' => FabricIssue::count(),

                    'orderCount' => Order::count(),
                    'patternCount' => Pattern::count(),
                    'layCount' => LayModel::count(),
                    'markerCount' => Marker::count(),
                    'cuttingCount' => Cutting::count(),
                    'bundleCount' => Bundle::count(),
                    'sewingCount' => Sewing::count(),
                    'washingCount' => Washing::count(),
                    'finishingCount' => Finishing::count(),
                    'packingCount' => Packing::count(),
                    'shipmentCount' => Shipment::count(),
                ];
            }
        );

        return view('dashboard.index', $dashboardCounts);
    }
}