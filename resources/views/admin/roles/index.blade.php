@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de roles</h1>
@stop

@section('content')
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Rol') }}
                        </span>

                        @can('admin.users.create')
                            <div class="float-right">
                                <a href="{{ route('admin.roles.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Rol New') }}
                                </a>
                            </div>
                        @endcan
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="usuarios" class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>ID</th>

                                    <th>Role</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>

                                        <td>{{ $role->name }}</td>

                                        <td>
                                            <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST">
                                                @can('admin.roles.show')
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('admin.roles.show', $role->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Show</a>
                                                @endcan
                                                @can('admin.roles.edit')
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('admin.roles.edit', $role->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Edit</a>
                                                @endcan
                                                @csrf
                                                @method('DELETE')
                                                @can('admin.roles.destroy')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> Delete</button>
                                                @endcan
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- {!! $users->links() !!} --}}
        </div>
    </div>
</div>
@stop
