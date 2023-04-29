@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- @can('admin.categories.create') --}}
        <a class="btn btn-info btn:sm float-right" href="{{route('admin.roles.create')}}">Agregar Rol</a>
    {{-- @endcan --}}
    <h1>Lista de Roles</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            {{session('info')}}    
        </div>    
    @endif


    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</t>
                        <th>Rol</t>
                        <th colspan="2"></t>
                    </tr>
                </thead>

                <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td width="10px">
                            <a href="{{route('admin.roles.edit', $role)}}" class="btn btn-primary">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop