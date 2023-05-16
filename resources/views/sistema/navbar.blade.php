<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
    <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbar" aria-controls="navbar" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/">Início</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">Tarefas</a>
                <div class="dropdown-menu" aria-labelledby="dropdown10">
                <a class="dropdown-item" href="">Cadastrar Tarefa</a>
                <a class="dropdown-item" href="">Listar Tarefas pendentes</a>
                <a class="dropdown-item" href="">Listar Tarefas Realizadas</a>
                <a class="dropdown-item" href="">Pesquisar Tarefas</a>
                </div>
            </li>
            <li class="nav-link dropdown">
                <a class="nav-liink dropdown-toggle" href="#" id="dropdown10" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">Tipos</a>
                <div class="dropdown-menu" aria-labelledby="dropdown10">
                <a class="dropdown-item" href="{{route('novoTipo')}}">Cadastrar Tipo</a>
                <a class="dropdown-item" href="{{route('indexTipos')}}">Listar Tipos</a>
                <a class="dropdown-item" href="{{route('pesquisarTipo')}}">Pesquisar Tipo</a>
                </div>
            </li>
        </ul>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- left Side of Navbar -->
            <ul class="navbar-nav me-auto">
            </ul>
            <!-- Right Side of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href='#' role="button"
                                data-bs-toggle="dropdown" aria-haspoup="true" aria-exánded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
    </div>
</nav>
                                       