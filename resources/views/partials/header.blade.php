<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid header-container">
            <div class="d-flex" style="align-items: center;">
                <a href="/home">
                    <i class="bi bi-shop store" style="font-size: 2em; color: white;"></i>
                </a>
            </div>
            <div>
                <ul class="navbar-nav">
                    <li class="nav-item @if($currentUrl === '/home') active @endif">
                        <a class="nav-link" href="/home">Inicio</a>
                    </li>
                    <li class="nav-item @if($currentUrl === '/Lista_productos') active @endif">
                        <a class="nav-link" href="/Lista_productos">Productos</a>
                    </li>
                    <li class="nav-item @if($currentUrl === '/stock') active @endif">
                        <a class="nav-link" href="/stock">Compras</a>
                    </li>
                    <li class="nav-item @if($currentUrl === '/ventas') active @endif">
                        <a class="nav-link" href="/ventas">Vender</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>