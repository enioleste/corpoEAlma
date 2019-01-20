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
  <div class="col-lg-8 col-lg-offset-2">
    
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
<form method="post" url="{{ url('admin/cadastro-profissional') }}">
<div class="col-lg-8  col-lg-offset-2">
  <!-- general form elements -->
  <div class="box box-solid box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">{{ $title }}</h3>
    </div>
    <div class="box-body">
       <div class="row">
         <div class="col-lg-6">
           <div class="form-group">
              <label >Nome do Profissional</label>
              <input type="text" id="" name="nome" class="form-control data" required="required">
            </div>
         </div> 
         <div class="col-lg-6">
            <label >Procedimento</label>
            <select class="form-control select2" name="procedimentos[]" multiple required="required">
              <option>limpeza...</option>
              <option>Unha...</option>
              <option>cabelo...</option>
            </select>
         </div>                                
       </div>
                 
       <div class="row">
         <div class="col-lg-12">
            <button type="submit" class="btn btn-success pull-right">Salvar</button>
            {{ csrf_field() }}
         </div>
       </div>           
    </div>
  </div>  
</div>    
</form>
@endsection