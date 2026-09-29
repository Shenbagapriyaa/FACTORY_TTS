@extends('layouts.app')

@section('page-title', 'Dashboard')
@section('page-subtitle', 'Factory operations')

@section('content')

<div class="erp-dashboard">

    {{-- =========================================================
         WELCOME
    ========================================================== --}}

    <div class="dashboard-welcome">

        <div>
            <span class="welcome-label">
                SHIFT OVERVIEW
            </span>

            <h2>
                Hello, {{ auth()->user()->name }}
            </h2>

            <p>
                Current activity across materials, orders and dispatch.
            </p>
        </div>

        <div class="welcome-date">
            <span>Today</span>

            <strong>
                {{ now()->format('d M Y') }}
            </strong>
        </div>

    </div>


    {{-- =========================================================
         KPI CARDS
    ========================================================== --}}

    <div class="dashboard-kpis">

        {{-- TOTAL FABRICS --}}
        <a href="{{ route('fabrics.index') }}"
           class="erp-kpi blue">

            <div class="kpi-top">

                <span>
                    TOTAL FABRICS
                </span>

                <div class="kpi-symbol">
                    ▦
                </div>

            </div>

            <strong>
                {{ $fabricCount }}
            </strong>

            <small>
                Fabric master records
            </small>

        </a>


        {{-- FABRIC GROUPS --}}
        <a href="{{ route('fabric-groups.index') }}"
           class="erp-kpi purple">

            <div class="kpi-top">

                <span>
                    FABRIC GROUPS
                </span>

                <div class="kpi-symbol">
                    ▤
                </div>

            </div>

            <strong>
                {{ $groupCount }}
            </strong>

            <small>
                Configured fabric groups
            </small>

        </a>


        {{-- TOTAL ORDERS --}}
        <a href="{{ route('orders.index') }}"
           class="erp-kpi green">

            <div class="kpi-top">

                <span>
                    TOTAL ORDERS
                </span>

                <div class="kpi-symbol">
                    □
                </div>

            </div>

            <strong>
                {{ $orderCount }}
            </strong>

            <small>
                Production orders
            </small>

        </a>


        {{-- TOTAL SHIPMENTS --}}
        <a href="{{ route('shipments.index') }}"
           class="erp-kpi orange">

            <div class="kpi-top">

                <span>
                    TOTAL SHIPMENTS
                </span>

                <div class="kpi-symbol">
                    ➤
                </div>

            </div>

            <strong>
                {{ $shipmentCount }}
            </strong>

            <small>
                Shipment records
            </small>

        </a>

    </div>


    {{-- =========================================================
         PRODUCTION OVERVIEW
    ========================================================== --}}

    <div class="erp-panel">

        <div class="erp-panel-heading">

            <div>

                <span class="panel-eyebrow">
                    PRODUCTION MODULES
                </span>

                <h3>
                    Production Overview
                </h3>

                <p>
                    Current records across the textile production workflow.
                </p>

            </div>

            <span class="stage-count">
                18 Production Stages
            </span>

        </div>


        <div class="production-grid">

            {{-- 01 --}}
            <a href="{{ route('material-receivings.index') }}"
               class="production-card">

                <span class="production-number">01</span>

                <div>
                    <strong>Material Receiving</strong>
                    <small>{{ $materialReceivingCount }} records</small>
                </div>

            </a>


            {{-- 02 --}}
            <a href="{{ route('grns.index') }}"
               class="production-card">

                <span class="production-number">02</span>

                <div>
                    <strong>GRN</strong>
                    <small>{{ $grnCount }} records</small>
                </div>

            </a>


            {{-- 03 --}}
            <a href="{{ route('inspections.index') }}"
               class="production-card">

                <span class="production-number">03</span>

                <div>
                    <strong>Inspection</strong>
                    <small>{{ $inspectionCount }} records</small>
                </div>

            </a>


            {{-- 04 --}}
            <a href="{{ route('fabric-stores.index') }}"
               class="production-card">

                <span class="production-number">04</span>

                <div>
                    <strong>Fabric Store</strong>
                    <small>{{ $fabricStoreCount }} records</small>
                </div>

            </a>


            {{-- 05 --}}
            <a href="{{ route('orders.index') }}"
               class="production-card">

                <span class="production-number">05</span>

                <div>
                    <strong>Orders</strong>
                    <small>{{ $orderCount }} records</small>
                </div>

            </a>


            {{-- 06 --}}
            <a href="{{ route('relaxations.index') }}"
               class="production-card">

                <span class="production-number">06</span>

                <div>
                    <strong>Relaxation</strong>
                    <small>{{ $relaxationCount }} records</small>
                </div>

            </a>


            {{-- 07 --}}
            <a href="{{ route('reservations.index') }}"
               class="production-card">

                <span class="production-number">07</span>

                <div>
                    <strong>Reservation</strong>
                    <small>{{ $reservationCount }} records</small>
                </div>

            </a>


            {{-- 08 --}}
            <a href="{{ route('fabric-issues.index') }}"
               class="production-card">

                <span class="production-number">08</span>

                <div>
                    <strong>Fabric Issue</strong>
                    <small>{{ $fabricIssueCount }} records</small>
                </div>

            </a>


            {{-- 09 --}}
            <a href="{{ route('patterns.index') }}"
               class="production-card">

                <span class="production-number">09</span>

                <div>
                    <strong>Pattern / CAD</strong>
                    <small>{{ $patternCount }} records</small>
                </div>

            </a>


            {{-- 10 --}}
            <a href="{{ route('lay-models.index') }}"
               class="production-card">

                <span class="production-number">10</span>

                <div>
                    <strong>Lay Models</strong>
                    <small>{{ $layCount }} records</small>
                </div>

            </a>


            {{-- 11 --}}
            <a href="{{ route('markers.index') }}"
               class="production-card">

                <span class="production-number">11</span>

                <div>
                    <strong>Marker</strong>
                    <small>{{ $markerCount }} records</small>
                </div>

            </a>


            {{-- 12 --}}
            <a href="{{ route('cuttings.index') }}"
               class="production-card">

                <span class="production-number">12</span>

                <div>
                    <strong>Cutting</strong>
                    <small>{{ $cuttingCount }} records</small>
                </div>

            </a>


            {{-- 13 --}}
            <a href="{{ route('bundles.index') }}"
               class="production-card">

                <span class="production-number">13</span>

                <div>
                    <strong>Bundle / QR Tracking</strong>
                    <small>{{ $bundleCount }} records</small>
                </div>

            </a>


            {{-- 14 --}}
            <a href="{{ route('sewings.index') }}"
               class="production-card">

                <span class="production-number">14</span>

                <div>
                    <strong>Sewing / Production</strong>
                    <small>{{ $sewingCount }} records</small>
                </div>

            </a>


            {{-- 15 --}}
            <a href="{{ route('washings.index') }}"
               class="production-card">

                <span class="production-number">15</span>

                <div>
                    <strong>Washing / Laser</strong>
                    <small>{{ $washingCount }} records</small>
                </div>

            </a>


            {{-- 16 --}}
            <a href="{{ route('finishings.index') }}"
               class="production-card">

                <span class="production-number">16</span>

                <div>
                    <strong>Finishing</strong>
                    <small>{{ $finishingCount }} records</small>
                </div>

            </a>


            {{-- 17 --}}
            <a href="{{ route('packings.index') }}"
               class="production-card">

                <span class="production-number">17</span>

                <div>
                    <strong>Packing</strong>
                    <small>{{ $packingCount }} records</small>
                </div>

            </a>


            {{-- 18 --}}
            <a href="{{ route('shipments.index') }}"
               class="production-card">

                <span class="production-number">18</span>

                <div>
                    <strong>Shipment</strong>
                    <small>{{ $shipmentCount }} records</small>
                </div>

            </a>

        </div>

    </div>


    {{-- =========================================================
         PRODUCTION WORKFLOW
    ========================================================== --}}

    <div class="erp-panel">

        <div class="erp-panel-heading">

            <div>

                <span class="panel-eyebrow">
                    FACTORY PROCESS
                </span>

                <h3>
                    Production Workflow
                </h3>

                <p>
                    Complete textile production journey from material
                    receiving to final shipment.
                </p>

            </div>

            <span class="stage-count">
                5 Workflow Stages
            </span>

        </div>


        <div class="workflow-list">

            {{-- 01 --}}
            <a href="{{ route('material-receivings.index') }}"
               class="workflow-row">

                <span>01</span>

                <strong>
                    Material Preparation
                </strong>

                <small>
                    Receiving → GRN → Inspection → Fabric Store
                </small>

            </a>


            {{-- 02 --}}
            <a href="{{ route('orders.index') }}"
               class="workflow-row">

                <span>02</span>

                <strong>
                    Fabric Planning
                </strong>

                <small>
                    Orders → Relaxation → Reservation → Fabric Issue
                </small>

            </a>


            {{-- 03 --}}
            <a href="{{ route('patterns.index') }}"
               class="workflow-row">

                <span>03</span>

                <strong>
                    Cutting & Bundle Tracking
                </strong>

                <small>
                    Pattern → Lay → Marker → Cutting → Bundle / QR
                </small>

            </a>


            {{-- 04 --}}
            <a href="{{ route('sewings.index') }}"
               class="workflow-row">

                <span>04</span>

                <strong>
                    Garment Production
                </strong>

                <small>
                    Sewing → Washing / Laser → Finishing → Packing
                </small>

            </a>


            {{-- 05 --}}
            <a href="{{ route('shipments.index') }}"
               class="workflow-row">

                <span>05</span>

                <strong>
                    Dispatch
                </strong>

                <small>
                    Final shipment and dispatch
                </small>

            </a>

        </div>

    </div>

</div>

@endsection