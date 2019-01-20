@extends('layouts.app')

@section('pageScripts')
<script type="text/javascript">
    $('#alterar-senha').on('click', function(e){
      $('.alteracao-senha').toggleClass('hide');
    }); 
</script>

<script type="text/javascript">
  var password = document.getElementById("password")
  confirm_password = document.getElementById("confirm_password");

  function validatePassword(){
    if(password.value != confirm_password.value) {
      confirm_password.setCustomValidity("As senhas devem ser iguais");
    } else {
      confirm_password.setCustomValidity('');
    }
  }
  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;
</script>
@endsection
@section('content')
<form method="post" url="{{ url('/alterar-usuario') }}" id="alterarUserForm">
<div class="col-md-8 col-md-offset-2">
  <!-- general form elements -->
  <div class="box box-solid box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">{{ $title }}</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form">
      <div class="box-body">
         <div class="row">
           <div class="col-md-6">
             <div class="form-group">
                <label >Nome</label>
                <input type="text" class="form-control" name="name" @if (!isset($user))                 
                value="{{ Auth::user()->name }}" @else value="{{ $user->name }}" @endif> 
              </div>
           </div>
           <div class="col-md-6">
             <div class="form-group">
                <label >Email</label>
                <input type="text" class="form-control" name="email" @if (!isset($user))                 
                value="{{ Auth::user()->email }}" @else value="{{ $user->email }}" @endif  readonly="readonly">
              </div>
           </div>           
         </div>
         <div class="row">
           <div class="col-lg-12">
              <button type="button" id="alterar-senha" class="btn btn-primary pull-left">Alterar Senha</button>
           </div>
         </div><br>
         <div class="row hide alteracao-senha">
           <div class="col-md-6">
             <div class="form-group">
                <label >Senha</label>
                <input type="password" id="password" name="password" class="form-control" value="">
              </div>
           </div>
           <div class="col-md-6">
             <div class="form-group">
                <label >Repita Senha</label>
                <input type="password" id="confirm_password" class="form-control" value="">
              </div>
           </div>
         </div>                 
         <div class="row">
          @if (isset($user))
            <input type="hidden" name="id" value="{{ $user->id }}">
          @endif
           <div class="col-lg-12">
              <button type="submit" class="btn btn-success pull-right">Alterar</button>
              {{ csrf_field() }}
           </div>
         </div>
      </div>
    </form>
  </div>  
</div>
</form>
@endsection