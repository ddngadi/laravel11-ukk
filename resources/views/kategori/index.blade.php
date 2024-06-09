@extends('layouts.layouts')


@section('sidebar')
    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('dashboard.index') }}"> 
        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
            <use xlink:href="#real-estate-1"> </use>
        </svg><span>Home </span></a></li>
    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('barang.index') }}"> 
        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
            <use xlink:href="#survey-1"> </use>
        </svg><span>Barang </span></a></li>
    <li class="sidebar-item"><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
            <use xlink:href="#browser-window-1"> </use>
        </svg><span>Management Barang </span></a>
    <ul class="collapse list-unstyled " id="exampledropdownDropdown">
        <li><a class="sidebar-link" href="{{ route('barangmasuk.index') }}">Barang Masuk</a></li>
        <li><a class="sidebar-link" href="{{ route('barangkeluar.index') }}">Barang Keluar</a></li>
    </ul>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                <use xlink:href="#disable-1"> </use>
            </svg><span>Login page</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
            @method('DELETE')
        </form>
    </li>
    </ul><span class="text-uppercase text-gray-600 text-xs mx-3 px-2 heading mb-2">Administrator</span>
        <ul class="list-unstyled">
            <li class="sidebar-item active"><a class="sidebar-link" href="{{ route('kategori.index') }}"> 
                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                    <use xlink:href="#imac-screen-1"> </use>
                </svg><span>Kategori </span></a></li>
@endsection

@section('content')
<div class="bg-dash-dark-2 py-4">
    <div class="container-fluid">
        <h2 class="h5 mb-0">Kategori</h2>
    </div>
</div>
</br>

    <div class="container-fluid">
        <a href="{{ route('kategori.create') }}" class="btn btn-success mb-3">Create Kategori</a>
        @if (session('Gagal'))
            <div class="alert alert-danger">
                {{ session('Gagal') }}
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    
        <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="lh-1 mb-0 text-dash-color-2">
                <tr>
                    <th>ID</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>Keterangan Kategori</th>
                    <th >Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-100 lh-1 mb-0">
                @foreach($rsetKategori as $kategori)
                    <tr>
                        <td>{{ $kategori->id }}</td>
                        <td>{{ $kategori->deskripsi }}</td>
                        <td>{{ $kategori->kategori }}</td>
                        <td>{{ $kategori->ketkategori }}</td>
                        <td>
                            <a href="{{ route('kategori.show', $kategori->id) }}" class="btn btn-info"><i class="fa fa-eye"></i> Show</a>
                            <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                            <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')"><i class="fa fa-trash"></i> Delete</button>  
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
