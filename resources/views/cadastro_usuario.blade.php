@extends('layouts.app')

@section('pageScripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endsection
@section('content')
   <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Registrar</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="col-md-6">
                                    <label for="name" class="control-label">Nome</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="{{ $errors->has('email') ? ' has-error' : '' }}">

                                <div class="col-md-6">
                                    <label for="email" class="control-label">E-Mail</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="{{ $errors->has('password') ? ' has-error' : '' }}">

                                <div class="col-md-6">
                                    <label for="password" class="control-label">Senha</label>
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="password-confirm" class="control-label">Confirme Senha</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div
>                        </div><br>
                        <div class="row">                           
                        </div><br>
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-success  pull-right">
                                    Salvar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>     

@endsection