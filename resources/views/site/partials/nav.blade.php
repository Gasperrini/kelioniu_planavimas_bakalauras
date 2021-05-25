<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('planner.index') }}">Planuoti kelionę</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('journey.index') }}">Mano kelionės</a>
                </li>
            </ul>
        </div>
    </div>
</nav>