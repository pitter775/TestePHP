<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Teste PHP')</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    @include('layouts.alert_messages');
    <div class="container-fluid">
        <div class="row">
            <!-- Menu lateral -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ 
                                Route::is('clientes.index') ? 'btn-primary' : '' }}" 
                                href="{{ url('/clientes') }}">Clientes
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link {{ 
                                Route::is('pedidos.index') ? 'btn-primary' : ''}}"
                                href="{{ url('/pedidos') }}">Pedidos
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ 
                                Route::is('produtos.index') ? 'btn-primary' : ''}}"
                                href="{{ url('/produtos') }}">Produtos
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ 
                                Route::is('produtos-grupos.index') ? 'btn-primary' : ''}}"
                                href="{{ url('/produtos-grupos') }}">Produtos Grupos
                            </a>
                        </li>

             

                        <li class="nav-item">
                            <a class="nav-link {{ 
                                Route::is('dias-venda') ? 'btn-primary' : ''}}"
                                href="{{ url('/dias-venda') }}">Mais Vendas
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Conteúdo principal -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>
    </div>
    
    <script>
        setTimeout(function(){
            $(".alert").hide();
        }, 3000 );
    </script>

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
