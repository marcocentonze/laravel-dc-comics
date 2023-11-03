<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://w7.pngwing.com/pngs/54/634/png-transparent-san-diego-comic-con-logo-comic-book-comics-fumetteria-book-shop-logo-comics-text-comic-book.png"
                    width="100" alt="Negozio di Fumetti Logo">
                Negozio di Fumetti
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('comics') }}">Fumetti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Autori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contatti</a>
                    </li>
                </ul>
                <div class="d-flex pe-5">
                    <a class="nav-link border rounded p-2" href="{{ route('comics.index') }}">Admin</a>
                </div>
            </div>
        </div>
    </nav>
</header>
