<!-- Navbar -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
    <div class="container">
        <a href="" class="navbar-brand">{{ Str::ucfirst(Auth::user()->fname) }}</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item px-2">
                    <a href="" class="nav-link active">Dashboard</a>
                </li>
            </ul>


            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown mr-2">
                    <a href="#" class="nav-link" data-toggle="dropdown" id="show">
                        <i class="fa fa-bell text-white">
                            <span class="badge badge-danger count"></span>
                        </i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#"></a>
                    </div>
                </li>   
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="" class="nav-link"><i class="fas fa-user-times"></i> Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav> 