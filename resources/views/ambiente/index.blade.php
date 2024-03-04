@extends('layout.master-layout')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ request()->path() }}


                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                {{-- <a href="{{ route('home.index') }}">Inicio</a> --}}
                            </li>
                            <li class="breadcrumb-item active">{{ request()->path() }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">

                <div class="card-body p-0">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th style="width: 1%">
                                    #
                                </th>
                                <th style="width: 20%">
                                    Nombre
                                </th>
                                <th style="width: 30%">
                                    piso
                                </th>
                                <th style="width: 50%">
                                    Estado
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($ambientes as $ambiente)
                                <tr>
                                    <td>
                                        {{ $ambiente->id }}
                                    </td>
                                    <td>
                                        {{ $ambiente->descripcion }}
                                    </td>

                                    <td>
                                        {{ $ambiente->piso->descripcion }}
                                    </td>

                                    <td>
                                        <span class="badge badge-{{ $ambiente->status === 1 ? 'success' : 'danger' }}">
                                            @if ($ambiente->status === 1)
                                                ACTIVO
                                            @else
                                                INACTIVO
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        {{-- <form id="cambiarEstadoForm" class=" d-inline"
                                            action="{{ route('ambiente.cambiarEstadoUser', ['ambiente' => $ambiente->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT') --}}
                                            <button type="submit" class="btn btn-success btn-sm"><i
                                                    class="fas fa-sync"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning btn-sm"
                                            href="{{ route('ambiente.show', ['ambiente' => $ambiente->id]) }}">
                                            <i class="fas fa-eye"></i>

                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm"
                                            href="{{ route('ambiente.edit', ['ambiente' => $ambiente->id]) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('ambiente.destroy', ['ambiente' => $ambiente->id]) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿Estás seguro de que deseas eliminar este parámetro?')">

                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="4">No hay ambientes registrados</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
    </div>

    <div class="card-footer">
        <div class="float-right">
            {{ $ambientes->links() }}
        </div>
    </div>
@endsection
