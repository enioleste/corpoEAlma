@extends('layouts.app')

@section('pageScripts')
<script type="text/javascript">
    $(document).ready(function() {
      $('#tabela-agendamentos').DataTable({
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

    $(document).ready(function() {
      
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            lang: 'pt-br',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,list'
            },         
            defaultDate: moment(),
            navLinks: true, // can click day/week names to navigate views
            editable: false,
            eventLimit: true, // allow "more" link when too many events
            events: [  
              @foreach ($agendamentos as $agendamento)
                @if ($parametro == 'parametro')
                  {
                    title: '{{ $agendamento->paciente}}',
                    start: '{{ $agendamento->data_hora }}',
                  },
                @else
                  {
                    title: '{{ $agendamento->procedimento}}',
                    start: '{{ $agendamento->data_hora }}',
                  },
                @endif
              @endforeach           
            ],

        });

    });
</script>
@endsection
@section('content')
<div class="row">
  <div class="col-lg-12 col-lg-offset-5">
    @if ($nomeProcedimento != '')
      <h3 style="color:blue;">{{$nomeProcedimento}}</h3>
    @endif
  </div>
</div>
<div class="box-body">
  <div class="col-lg-12 col-md-12">    
    <div class="col-lg-12 col-md-12">
      {{-- @if (Auth::user()->perfil === '1')
      <div class="row">
        <div class="col-lg-12">
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box bg-aqua">
              <span class="info-box-icon"><i class="glyphicon glyphicon-calendar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Visão do Dia</span>
              <span class="info-box-number">{{ date('d/m/Y') }}</span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
              </span>
            </div>
              <!-- /.info-box-content -->
            </div> 
          </div>         
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-dropbox"></i></span>

              <div class="info-box-content">
                <span class="info-box-text" style="font-size:20px;">Clientes Hoje</span>
                <span class="info-box-number" style="font-size:30px;"><small></small></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div> 
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="glyphicon glyphicon-duplicate"></i></span>

              <div class="info-box-content">
                <span class="info-box-text" style="font-size:20px;">Pedidos</span>
                <span class="info-box-number" style="font-size:30px;"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>                     
        </div>
      </div>
      @endif --}}
      <div class="box box-primary">
        <div id="calendar"></div>
        <div class="box-body">
            <div class="table-responsive">
              {{-- <table class="table table-bordered table-hover"> --}}
              <table class="display tabela-sku" id="tabela-agendamentos" style="font-size: 13px;">
                <thead>
                  <tr>
                    <th>Profissional</th>
                    <th>Cliente</th>
                    <th>Procedimento</th>
                    <th>Data/Hora</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($agendamentos as $agendamento)
                    <tr>
                      <td><a href="#">{{ $agendamento->profissional }}</a></td>
                      <td><a href="#">{{ $agendamento->paciente }}</a></td>
                      <td><a href="#">{{ $agendamento->procedimento }}</a></td>
                      <td><a href="#">{{ date('d/m/Y H:i', strtotime($agendamento->data_hora)) }}</a></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection