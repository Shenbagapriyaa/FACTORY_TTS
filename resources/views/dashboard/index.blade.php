@extends('layouts.app')

@section('page-title', 'Dashboard')
@section('page-subtitle', 'Overview of textile production master data')

@section('content')

<div class="dashboard-grid">

    <div class="stat-card">
        <div class="stat-card-top">
            <div class="stat-icon">▦</div>
            <span class="stat-label">Total Fabrics</span>
        </div>

        <div class="stat-value">{{ $fabricCount }}</div>
        <div class="stat-description">Fabric master records</div>
    </div>

    <div class="stat-card">
        <div class="stat-card-top">
            <div class="stat-icon">▤</div>
            <span class="stat-label">Fabric Groups</span>
        </div>

        <div class="stat-value">{{ $fabricGroupCount }}</div>
        <div class="stat-description">Configured groupings</div>
    </div>

    <div class="stat-card">
        <div class="stat-card-top">
            <div class="stat-icon">◫</div>
            <span class="stat-label">Total Lay Models</span>
        </div>

        <div class="stat-value">{{ $layModelCount }}</div>
        <div class="stat-description">Production lay configurations</div>
    </div>

</div>

<div class="panel dashboard-panel">
    <div class="panel-header">
        <div>
            <h2>Production Workflow</h2>
            <p>Master data flow for production planning.</p>
        </div>
    </div>

    <div class="workflow">

        <div class="workflow-item">
            <div class="workflow-number">01</div>

            <div>
                <h3>Fabric</h3>
                <p>Define fabric master details and specifications.</p>
            </div>
        </div>

        <div class="workflow-arrow">→</div>

        <div class="workflow-item">
            <div class="workflow-number">02</div>

            <div>
                <h3>Fabric Group</h3>
                <p>Connect related fabrics into production groups.</p>
            </div>
        </div>

        <div class="workflow-arrow">→</div>

        <div class="workflow-item">
            <div class="workflow-number">03</div>

            <div>
                <h3>Lay Model</h3>
                <p>Plan cutting lay configurations for production.</p>
            </div>
        </div>

    </div>
</div>

@endsection