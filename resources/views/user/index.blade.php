@extends('adminlte::page')

@section('template_title')
    User
@endsection

@section('content')
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('User') }}
                            </span>

                            @can('admin.users.create')
                                <div class="float-right">
                                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm float-right"
                                        data-placement="left">
                                        {{ __('Create New') }}
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
                                        <th>No</th>

                                        <th>Name</th>
                                        <th>Email</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>

                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>

                                            <td>
                                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                                    @can('admin.users.show')
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('admin.users.show', $user->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> Show</a>
                                                    @endcan
                                                    @can('admin.users.edit')
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('admin.users.edit', $user->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('admin.users.destroy')
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
@endsection

		@section('css')
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
			<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
			<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
		@endsection

		@section('js')
			<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
			<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
			<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
			<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>
			<script>
				$('#usuarios').DataTable({
					responsive: true,
					autoWidth: false
				});
			</script>
		@endsection
