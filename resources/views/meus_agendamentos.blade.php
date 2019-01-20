</script>
@extends('layouts.app')

@section('pageScripts')
<script type="text/javascript">
  $(document).ready(function() {
      $('#tabela-meus-agendamentos').DataTable();
  }); 

  $( ".botaoExcluir" ).click(function() {
      $('#id_agendamento').val($(this).attr("data-id"));
  });
</script>
@endsection
@section('content')
<div class="row">
  <div class="col-lg-12">
    
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
<div class="col-lg-12">
  <!-- general form elements -->
  <div class="box box-solid box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">{{ $title }}</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
      <div class="box-body">
          <div class="table-responsive">
            {{-- <table class="table table-bordered table-hover"> --}}
            <table class="display tabela-sku" id="tabela-meus-agendamentos" style="font-size: 13px;">
              <thead>
                <tr>
                  <th>Fornecedor ID</th>
                  <th>Sap_Pedidos</th>
                  <th>Notas_Fiscais</th>
                  <th>Quant. Caixas</th>
                  <th>Data/Hora</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($agendamentos as $agendamento)
                  <tr>
                    <td><a href="#">{{$agendamento->sap_fornecedor_id}}</a></td>
                    <td><a href="#">{{ implode( ' , ' , array_filter($agendamento->sap_pedidos)) }}</a></td>
                    <td><a href="#">{{ implode( ' , ' , array_filter($agendamento->sap_notas_ficais)) }}</a></td>
                    <td><a href="#">{{ $agendamento->quant_caixas }}</a></td>
                    <td><a href="#">{{ date('d/m/Y h:i', strtotime($agendamento->dataHora)) }}</a></td>
                    <td><button class="label label-danger botaoExcluir" data-id="{{ $agendamento->id }}" ><i class="glyphicon glyphicon-remove" title="Excluir" data-toggle="modal" data-target="#exampleModal"></i></button><a href="{{ url('/editar-agendamento').'/'.$agendamento->id }}"><button class="label label-primary botaoEditar" data-id="{{ $agendamento->id }}" ><i class="glyphicon glyphicon-edit" title="Editar" data-toggle="modal" data-target="#modalEdicao"></i></button></a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
      </div>
  </div>  
</div>


<!-- Modal -->
<div class="modal fade modal-danger" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Exclusão de Agendamento</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3><p align="center">Tem certeza que deseja excluir o Agendamento??</p></h3>
      </div>
      <div class="modal-footer">
        <form method="POST" action="{{ url('/excluir-agendamento') }}">
          <input type="hidden" name="id_agendamento" id="id_agendamento" value="">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-success">Excluir</button>
          {{ csrf_field() }}
        </form>
      </div>
    </div>
  </div>
</div>
@endsection