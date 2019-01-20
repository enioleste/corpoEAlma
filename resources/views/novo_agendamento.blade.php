@extends('layouts.app')

@section('pageScripts')
<script type="text/javascript">
$(document).ready(function() {
  $('.select2').select2(); 
});
</script>
<script type="text/javascript">
  $(function() {
    $('.data').daterangepicker({
        timePicker: true,
        showDropdowns: false,
        singleDatePicker: true,
        format: 'mm-dd-yyyy',
        locale: { format: 'DD-MM-YYYY hh:mm',"separator": "-"},
        "minDate": moment(),
    }, 

    function(start, end, label) {
      var years = moment().diff(start, 'years');
    });

    selected2 = '';
    $(".data").on("change",function(){
      var selected = $(this).val();                
      selected2 = selected2 + ' | ' +  selected;
      $('#dataSelecionada').val(selected2);
    });     
});
  
</script>
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
<form method="post" url="{{ url('admin/novo-agendamento') }}">
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
           <div class="col-lg-6">
              <label >Procedimento</label>
              <select class="form-control select2" name="procedimento" required="required">
                <option>Selecione...</option>
                  @foreach ($procedimentos as $procedimento)
                    <option value="{{$procedimento->id}}">{{$procedimento->nome}}</option>
                  @endforeach
              </select>
           </div>           
           <div class="col-lg-6">
              <label >Profissional</label>
              <select class="form-control select2" name="profissional" required="required">
                <option>Selecione...</option>
                  @foreach ($profissionais as $profissional)
                    <option value="{{$profissional->id}}">{{$profissional->nome}}</option>
                  @endforeach
              </select>
           </div>
         </div><br>
         <div class="row">
           <div class="col-lg-6">
              <label >Paciente</label>
              <select class="form-control select2" name="cliente" required="required">
                <option>Selecione...</option>
                  @foreach ($pacientes as $paciente)
                    <option value="{{$paciente->id}}">{{$paciente->nome}}</option>
                  @endforeach
              </select>
           </div> 
           <div class="col-lg-6">
             <div class="form-group">
                <label >Data/Hora</label> 
                <input type="text" class="form-control data" name="data_hora" class="form-control" required="required">
              </div>
           </div>
         </div><br>           
         <div class="row">
           <div class="col-lg-6">
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