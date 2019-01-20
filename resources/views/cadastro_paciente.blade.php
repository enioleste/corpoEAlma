@extends('layouts.app')

@section('pageScripts')

@endsection
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    
    @if (session('success_message'))
        <div class="alert alert-success">
            {{ session('success_message') }}
        </div>
    @endif
    @if (session('error_message'))
        <div class="alert alert-danger">
            {{ session('error_message') }}
        </div>
    @endif
    @if (session('warning_message'))
        <div class="alert alert-warning">
            {!! session('warning_message') !!}
        </div>
    @endif
    @if (session('info_message'))
        <div class="alert alert-info">
            {{ session('info_message') }}
        </div>
    @endif
  </div>
</div>
<form method="post" @if (isset($paciente)) url="{{ url('admin/altera-paciente/'.$paciente->id) }}" @else url="{{ url('admin/cadastro-paciente') }}" @endif   id="salvaFornecedorForm">
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
           <div class="col-md-12">
             <div class="form-group">
                <label >Nome:</label>
                <input type="text" class="form-control" name="nome" required="required" placeholder="Nome" @if (isset($paciente)) value="{{ $paciente->sap_fornecedor_id }}" @endif> 
              </div>
           </div>           
         </div>
         <div class="row">
           <div class="col-md-6">
             <div class="form-group">
                <label >CPF:</label>
                <input type="text" class="form-control" name="cpf" required="required" placeholder="Cpf" @if (isset($paciente)) value="{{ $paciente->empresa }}" @endif>
              </div>
           </div>
           <div class="col-md-6">
             <div class="form-group">
                <label >RG:</label>
                <input type="text" class="form-control" name="rg" required="required" placeholder="Rg" @if (isset($paciente)) value="{{ $paciente->empresa }}" @endif>
              </div>
           </div>           
         </div>           
         <div class="row">
           <div class="col-md-12">
             <div class="form-group">
                <label >Email</label>
                <input type="text" id="password" name="email" class="form-control" required="required" placeholder="Favor inserir um Email válido" @if (isset($paciente)) value="{{ $paciente->email }}" @endif>
              </div>
           </div>
         </div> 
         <div class="row">
           <div class="col-md-6">
             <div class="form-group">
                <label >Telefone Residêncial:</label>
                <input type="text" class="form-control" name="telefone_residencial" required="required" placeholder="Celular" @if (isset($paciente)) value="{{ $paciente->empresa }}" @endif>
              </div>
           </div>
           <div class="col-md-6">
             <div class="form-group">
                <label >Celular:</label>
                <input type="text" class="form-control" name="celular" required="required" placeholder="Celular" @if (isset($paciente)) value="{{ $paciente->empresa }}" @endif>
              </div>
           </div>           
         </div>
         <div class="row">
           <div class="col-md-12">
             <div class="form-group">
                <label >Endereço:</label>
                <input type="text" id="password" name="endereco" class="form-control" required="required" placeholder="Endereço..." @if (isset($paciente)) value="{{ $paciente->email }}" @endif>
              </div>
           </div>
         </div>                                   
         <div class="row">
           <div class="col-lg-12">
              <button type="submit" class="btn btn-success pull-right">Salvar</button>
              {{ csrf_field() }}
           </div>
         </div>
      </div>
    </form>
  </div>  
</div>
</form>
@endsection