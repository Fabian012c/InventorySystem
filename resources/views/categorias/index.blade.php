@extends('layouts.dashboard')

@section('content')
<h1 class="section-title"><i class="fas fa-list"></i> Listado de Categorías</h1>

@if(session('success'))
    <div class="alert alert-success">
        <i class="fas fa-check-circle"></i>
        <div>{{ session('success') }}</div>
    </div>
@endif

<!-- Estadísticas -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon" style="background-color: #dbeafe; color: #3b82f6;">
            <i class="fas fa-layer-group"></i>
        </div>
        <div class="stat-info">
            <div class="stat-title">Total de Categorías</div>
            <div class="stat-value">{{ $categorias->count() }}</div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon" style="background-color: #dcfce7; color: #22c55e;">
            <i class="fas fa-box"></i>
        </div>
        <div class="stat-info">
            <div class="stat-title">Productos asociados</div>
            <div class="stat-value">
                {{ $categorias->sum(fn($categoria) => $categoria->productos->count()) }}
            </div>
        </div>
    </div>
</div>

<!-- Tabla -->
<div class="table-container">
    <div class="table-header">
        <div class="categorias-title">
            <i class="fas fa-list"></i>
            <span>Categorías registradas</span>
        </div>
        <button class="btn btn-outline" onclick="exportTable()">
            <i class="fas fa-download"></i> Exportar
        </button>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Color</th>
                <th>Icono</th>
                <th>Slug</th>
                <th>Productos</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categorias as $categoria)
                <tr>
                    <td>
                        <a href="{{ route('categorias.productos', $categoria->id) }}" class="categoria-nombre-link">
                            <span class="categoria-nombre-icono">
                                <i class="{{ $categoria->icono }}"></i>
                            
                            </span>
                            <span class="categoria-nombre-texto">{{ $categoria->nombre }}</span>
                        </a>
                    </td>
                    <td>
                        <span class="color-box" style="background-color: {{ $categoria->color }}"></span>
                        {{ $categoria->color }}
                    </td>
                    <td>
                        <span class="icon-preview"><i class="{{ $categoria->icono }}"></i></span>
                        {{ $categoria->icono }}
                    </td>
                    <td>{{ $categoria->slug }}</td>
                    <td>{{ $categoria->productos->count() }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        <div class="empty-state">
                            <i class="fas fa-folder-open"></i>
                            <p>No hay categorías registradas.</p>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
