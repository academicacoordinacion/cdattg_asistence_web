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
                <div class="card-header">
                    {{-- <h3 class="card-title">{{ request()->path() }}</h3> --}}
                    {{-- <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div> --}}
                    <div class="card-body">
                        <a class="btn btn-warning btn-sm" href="{{ route('persona.index') }}">
                            <i class="fas fa-arrow-left"></i>
                            </i>
                            Volver
                        </a>
                    </div>
                    <form method="POST" action="{{ route('persona.update', $persona->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="col-md-6">
                            <label for="tipo_documento">Tipo de Documento</label>
                            <select class="form-control" name="tipo_documento" autofocus>
                                <option value="CEDULA DE CIUDADANIA"
                                    {{ old('tipo_documento', $persona->tipo_documento) == 'CEDULA DE CIUDADANIA' ? 'selected' : '' }}>
                                    CEDULA DE CIUDADANIA</option>
                                <option value="PASAPORTE"
                                    {{ old('tipo_documento', $persona->tipo_documento) == 'PASAPORTE' ? 'selected' : '' }}>
                                    PASAPORTE</option>
                                <option value="CEDULA DE EXTRANJERIA"
                                    {{ old('tipo_documento', $persona->tipo_documento) == 'CEDULA DE EXTRANJERIA' ? 'selected' : '' }}>
                                    CEDULA DE EXTRANJERIA</option>
                                <option value="SIN DOCUMENTO"
                                    {{ old('tipo_documento', $persona->tipo_documento) == 'SIN DOCUMENTO' ? 'selected' : '' }}>
                                    SIN DOCUMENTO</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="numero_documento" class="col-form-label">Numero de documento</label>
                            <input type="text" name="numero_documento" class="form-control"
                                value="{{ old('numero_documento', $persona->numero_documento) }}">
                        </div>

                        <div class="form-group">
                            <label for="primer_nombre" class="col-form-label">Primer Nombre</label>
                            <input type="text" name="primer_nombre" class="form-control"
                                value="{{ old('primer_nombre', $persona->primer_nombre) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="segundo_nombre" class="col-form-label">Segundo Nombre</label>
                            <input type="text" name="segundo_nombre" class="form-control"
                                value="{{ old('segundo_nombre', $persona->segundo_nombre) }}">
                        </div>

                        <div class="form-group">
                            <label for="primer_apellido" class="col-form-label">Primer Apellido</label>
                            <input type="text" name="primer_apellido" class="form-control"
                                value="{{ old('primer_apellido', $persona->primer_apellido) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="segundo_apellido" class="col-form-label">Segundo Apellido</label>
                            <input type="text" name="segundo_apellido" class="form-control"
                                value="{{ old('segundo_apellido', $persona->segundo_apellido) }}">
                        </div>

                        <div class="col-md-6">
                            <label for="fecha_de_nacimiento">Fecha de Nacimiento</label>
                            <input type="date" class="form-control"
                                value="{{ old('fecha_de_nacimiento', $persona->fecha_de_nacimiento) }}"
                                name="fecha_de_nacimiento" placeholder="Fecha de Nacimiento" required>
                        </div>

                        <div class="col-md-6">
                            <label for="genero">Género</label>
                            <select class="form-control" name="genero">
                                <option value="MASCULINO"
                                    {{ old('genero', $persona->genero) == 'MASCULINO' ? 'selected' : '' }}>MASCULINO
                                </option>
                                <option value="FEMENINO"
                                    {{ old('genero', $persona->genero) == 'FEMENINO' ? 'selected' : '' }}>FEMENINO</option>
                                <option value="SIN DEFINIR"
                                    {{ old('genero', $persona->genero) == 'SIN DEFINIR' ? 'selected' : '' }}>SIN DEFINIR
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-form-label">Correo Electronico</label>
                            <input type="text" name="email" class="form-control"
                                value="{{ old('email', $persona->email) }}">
                        </div>

                        <div class="col-md-6">
                            <label for="cargo">Cargo</label>
                            <select class="form-control" name="cargo">
                                <option value="INGENIERO"
                                    {{ old('cargo', $persona->cargo) == 'INGENIERO' ? 'selected' : '' }}>INGENIERO</option>
                                <option value="INSTRUCTOR"
                                    {{ old('cargo', $persona->cargo) == 'INSTRUCTOR' ? 'selected' : '' }}>INSTRUCTOR
                                </option>
                                <option value="TECNICO" {{ old('cargo', $persona->cargo) == 'TECNICO' ? 'selected' : '' }}>
                                    TECNICO</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-form-label">Estado:</label>
                            <select name="status" class="form-control" required>
                                <option value="1" {{ old('status', $persona->user->status) == 1 ? 'selected' : '' }}>
                                    Activo</option>
                                <option value="0" {{ old('status', $persona->user->status) == 0 ? 'selected' : '' }}>
                                    Inactivo</option>
                            </select>
                        </div>


   

                    <button type="submit" class="btn btn-primary">Actualizar persona</button>
                    </form>
                </div>
            @endsection