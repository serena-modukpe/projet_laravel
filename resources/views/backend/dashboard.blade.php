@extends('backend.layout.mainlayout')

@section('content')

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>

@if(Auth::user()->role_id !== 1 && Auth::user()->role_id !== 2)

<div class="row">
    <div class="col-sm-6 col-md-4">
            <div class="card info-card revenue-card">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-house-door-fill text-primary"></i>
                        </div>
                        <div class="ps-3">
                            <a href="{{ route('notes.index') }}" ><h5 class="card-title">Notes</h5></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4">
            <div class="card info-card revenue-card">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-journal-text text-primary"></i>
                        </div>
                        <div class="ps-3">
                            <a href="{{ route('calendriers.index') }}" ><h5 class="card-title">Calendriers des devoirs</h5></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    

    
</div>

@else
@if(Auth::user()->getrole->id == 2)

<div class="row">
    <div class="col-lg-4 col-md-6">

                <div class="card info-card sales-card">

                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"></a>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Liste de classes</h5>
                        <a href="{{ route('classes.index') }}">
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-house-door-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $countclasse }}</h6>
                                    <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                </div>
            
        <div class="col-lg-4 col-md-6">
            <div class="card info-card sales-card">

                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"></a>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Liste d'Etablissements</h5>
                    <a href="{{ route('etablissements.index') }}">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-houses-fill"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $countetablissement }}</h6>
                                <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card info-card sales-card">

                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"></a>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Liste de matieres</h5>
                    <a href="{{ route('matieres.index') }}">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-list-ul"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $countmatiere }}</h6>
                                <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
</div>

@else

<section class="section dashboard">
    <div class="row">

        <!-- Users Card -->
        <div class="col-lg-4 col-md-6">
            <div class="card info-card sales-card">

                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"></a>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Liste d'utilisateurs</h5>

                    <a href="{{ route('users.index') }}">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people-fill"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $countuser }}</h6>
                                <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Directeurs Card -->
        

        <!-- Rôles Card -->
        <div class="col-lg-4 col-md-6">
            <div class="card info-card sales-card">

                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"></a>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Liste de rôles</h5>

                    <a href="{{ route('roles.index') }}">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-layers-half "></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $countrole }}</h6>
                                <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Statuts Card -->
        <div class="col-lg-4 col-md-6">
            <div class="card info-card sales-card">

                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"></a>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Liste de statuts</h5>
                    <a href="{{ route('statuts.index') }}">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-record-circle-fill"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $countstatut }}</h6>
                                <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>





        <div class="col-lg-4 col-md-6">
            <div class="card info-card sales-card">

                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"></a>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Liste de classes</h5>
                    <a href="{{ route('classes.index') }}">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-house-door-fill"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $countclasse }}</h6>
                                <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        
        <div class="col-lg-4 col-md-6">
            <div class="card info-card sales-card">

                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"></a>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Liste des habilitations</h5>
                    <a href="{{ route('habilitations.index') }}">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-stack"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $counthabilitations }}</h6>
                                <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>




        <div class="col-lg-4 col-md-6">
            <div class="card info-card sales-card">

                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"></a>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Liste d'Etablissements</h5>
                    <a href="{{ route('etablissements.index') }}">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-houses-fill"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $countetablissement }}</h6>
                                <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>


        <div class="col-lg-4 col-md-6">
            <div class="card info-card sales-card">

                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"></a>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Liste de matieres</h5>
                    <a href="{{ route('matieres.index') }}">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-list-ul"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $countmatiere }}</h6>
                                <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

</section>


@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Connexion réussie',
            text: '{{ session('success') }}',
        });
    </script>
@endif
@endif

@endif


@endsection
