<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar ">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar ">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel ">
            <div class="pull-left image">
                <img src="{{ asset("/assets/dist/img/avatar5.png") }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                @if (!Auth::guest())
                <p>
                    {{ Auth::user()->name }} 
                </p>
                <!-- Status -->
                <a href="#">
                    <i class="fa fa-circle text-success"></i>
                    {{-- {{ Auth::user()->roles->first()->display_name }} --}}
                </a>
                @endif
            </div>
        </div>
            <ul class="sidebar-menu tree" data-widget="tree">
                <li class="treeview menu-open">
                  <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Calendários</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <?php 
                        use App\Procedimento;                        
                        $procedimentos = Procedimento::all();
                    ?>
                    @foreach ($procedimentos as $procedimento)
                        <li class="active"><a href="{{url('/home/'. $procedimento->id)}}"><i class="fa fa-circle-o"></i>{{$procedimento->nome}}</a></li>
                    @endforeach
                  </ul>
                </li>
            </ul>    
            <ul class="sidebar-menu">
                @if (Auth::user()->perfil === '2')
                    <li class="treeview tour-sidebar">
                        <a href="{{ url('/home') }}">                    
                            <span>HOME</span>
                            <span class="pull-right-container">
                            </span>
                        </a> 
                    </li>                
                    <li class="treeview tour-sidebar">
                        <a href="{{ url('novo-agendamento') }}">                    
                            <span>Novo Agendamento</span>
                            <span class="pull-right-container">
                            </span>
                        </a> 
                    </li>
                    <li class="treeview tour-sidebar">
                        <a href="{{ url('meus-agendamentos') }}">                    
                            <span>Meus Agendamentos</span>
                            <span class="pull-right-container">
                            </span>
                        </a> 
                    </li>
                @elseif(Auth::user()->perfil === '1')
                    <li class="treeview tour-sidebar">
                        <a href="{{ url('admin/novo-agendamento') }}">                    
                            <span>Novo Agendamento</span>
                            <span class="pull-right-container">
                            </span>
                        </a> 
                    </li>                    
                    <li class="treeview tour-sidebar">
                        <a href="{{ url('admin/lista-pacientes') }}">                    
                            <span>Pacientes</span>
                            <span class="pull-right-container">
                            </span>
                        </a> 
                    </li>
                    <li class="treeview tour-sidebar">
                        <a href="{{ url('admin/cadastro-paciente') }}">                    
                            <span>Cadastro Paciente</span>
                            <span class="pull-right-container">
                            </span>
                        </a> 
                    </li>                
                    <li class="treeview tour-sidebar">
                        <a href="{{ url('admin/cadastro-profissional') }}">
                            <span>Cadastro de Profissional</span>
                            <span class="pull-right-container">
                            </span>
                        </a> 
                    </li> 
                    <li class="treeview tour-sidebar">
                        <a href="{{ url('admin/cadastro-procedimento') }}">
                            <span>Cadastro de Procedimento</span>
                            <span class="pull-right-container">
                            </span>
                        </a> 
                    </li>                                                         
                    <li class="treeview tour-sidebar">
                        <a href="{{ url('admin/usuarios') }}">
                            <span>Usuários</span>
                            <span class="pull-right-container">
                            </span>
                        </a> 
                    </li>
                    <li>
                        <a href="{{ url('/admin/cadastro-usuario') }}">                    
                            <span>Cadastrar Usuário</span>
                            <span class="pull-right-container">
                            </span>
                        </a> 
                    </li>                
                @endif
                <li>
                    @if (isset(Auth::user()->id))
                        <a href="{{ url('/alterar-usuario/'.Auth::user()->id) }}">                    
                            <span>Alterar Usuário</span>
                            <span class="pull-right-container">
                            </span>
                        </a> 
                    @endif
                </li>
            </ul>

    </section><!-- /.sidebar -->
</aside>