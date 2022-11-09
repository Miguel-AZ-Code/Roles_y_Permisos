<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('name', 'Nombre') }}
            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del rol']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <h2 class="h2">Lista de permisos</h2>

        @foreach ($permissions as $permission)
            <div>
                <label>
                    {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                    {{ $permission->name }}
                </label>
            </div>
        @endforeach

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
