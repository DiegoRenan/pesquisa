<div class="form-group">
    {!! Form::label('name', 'Nome Usuário') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'autofocus', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('name', 'Categoria') !!}
    {!! Form::select('role_id', $roles, $padrao, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email') !!}
    {!! Form::input('email', 'email', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::label('password', 'Senha') !!}
            {!! Form::input('password', 'password', null, ['class' => 'form-control', 'required']) !!}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::label('password', 'Repita Senha') !!}
            {!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'required']) !!}
        </div>
    </div>
</div>