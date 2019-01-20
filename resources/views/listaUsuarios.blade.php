</script>
@extends('layouts.app')

@section('pageScripts')
<script type="text/javascript">
  $(document).ready(function() {
      $('#tabela-usuarios').DataTable({
        "language": {
          "paginate": {
              "first":      "Primeira",
              "last":       "Última",
              "next":       "Próxima",
              "previous":   "Anterior"
          },
          "info": "Mostrar _START_ de _END_ de _TOTAL_ linhas",
          "lengthMenu":     "Mostrar _MENU_ Linhas",
          "search":         "Procurar:",
          "infoEmpty":      "Mostrando 0 para 0 de 0 linhas",
          "emptyTable":     "Nenhum dado para mostrar",
        }
      });
  }); 
  $( ".botaoExcluir" ).click(function() {
      $('#id_user').val($(this).attr("data-id"));
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
      <a href="{{ url('/admin/cadastro-usuario') }}"><button type="submit" class="btn btn-success pull-right">CADASTRAR NOVO</button></a>
    </div>

      <div class="box-body">
          <div class="table-responsive">
            {{-- <table class="table table-bordered table-hover"> --}}
            <table class="display tabela-sku" id="tabela-usuarios" style="font-size: 13px;">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $value)
                  <tr>
                    <td><a href="#">{{$value->id}}</a></td>
                    <td><a href="#">{{$value->name}}</a></td>
                    <td><a href="#">{{$value->email}}</a></td>
                    <td><button class="label label-danger botaoExcluir" data-id="{{ $value->id }}"><i class="glyphicon glyphicon-remove" title="Excluir" data-toggle="modal" data-target="#exampleModal"></i></button>
                      <a href="{{ url('/alterar-usuario/'.$value->id) }}"><span class="label label-primary"><i class="glyphicon glyphicon-edit" title="Editar"></i></span></a></td>
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
        <h4 class="modal-title" id="exampleModalLabel">Exclusão de Usuário</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3><p align="center">Tem certeza que deseja excluir o Usuário??</p></h3>
      </div>
      <div class="modal-footer">
        <form method="POST" action="{{ url('admin/excluir-usuario') }}">
          <input type="hidden" name="id_user" id="id_user" value="">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-success">Excluir</button>
          {{ csrf_field() }}
        </form>
      </div>
    </div>
  </div>
</div> 
@endsection