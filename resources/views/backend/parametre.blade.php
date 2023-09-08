@extends("backend.layout.mainlayout")




@section("content")
@if(Auth::user()->role_id !== 1 && Auth::user()->role_id !== 2)
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
                    <i class="bi bi-house-door-fill text-primary"></i>
                    </div>
                    <div class="ps-3">
                        <a href="{{ route('interrogations.index') }}" ><h5 class="card-title">Interrogations</h5></a>
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
<div class="col-sm-6 col-md-4">
        <div class="card info-card revenue-card">
            <div class="card-body">
                <h5 class="card-title"></h5> 
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                       
                        <i class="bi bi-list-columns-reverse text-primary"></i>
                    </div>
                    <div class="ps-3">
                        <a href="{{ route('sites.index') }}" ><h5 class="card-title">Sites</h5></a>
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
                    <i class="bi bi-houses-fill text-primary"></i>
                    </div>
                    <div class="ps-3">
                        <a href="{{ route('etablissements.index') }}" ><h5 class="card-title">Etablissement</h5></a>
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
                        <a href="{{ route('matieres.index') }}" ><h5 class="card-title">Matières</h5></a>
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
                    <i class="bi bi-house-door-fill text-primary"></i>
                    </div>
                    <div class="ps-3">
                        <a href="{{ route('classes.index') }}" ><h5 class="card-title">Classes</h5></a>
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
                    <i class="bi bi-house-door-fill text-primary"></i>
                    </div>
                    <div class="ps-3">
                        <a href="{{ route('classematieres.index') }}" ><h5 class="card-title">Classes et matières</h5></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@else
<div class="row">
    <div class="col-sm-6 col-md-4">
        <div class="card info-card revenue-card">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <!-- Insérez ici une icône ou une image représentant le rôle -->
                        <i class="bi bi-layers-half text-primary"></i>
                    </div>
                    <div class="ps-3">
                        <a href="{{ route('roles.index') }}" class="btn "><h5 class="card-title">Rôles</h5></a>
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
                        <!-- Insérez ici une icône ou une image représentant le statut -->
                        <i class="bi bi-circle text-primary"></i>
                    </div>
                    <div class="ps-3">
                        <a href="{{ route('statuts.index') }}" class="btn "><h5 class="card-title">Statuts</h5></a>
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
                        <i class="bi bi-credit-card-fill text-primary"></i>
                    </div>
                    <div class="ps-3">
                        <a href="{{ route('payements.index') }}" class="btn "><h5 class="card-title">Statuts-payements</h5></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6 col-md-4">
        <div class="card info-card revenue-card">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <!-- Insérez ici une icône ou une image représentant les inscriptions -->
                        <i class="bi bi-people text-primary"></i>
                    </div>
                    <div class="ps-3">
                        <a href="{{ route('inscriptions.index') }}" class="btn "><h5 class="card-title">Statut-inscriptions</h5></a>
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
                    <i class="bi bi-stack text-primary"></i>
                    </div>
                    <div class="ps-3">
                        <a href="{{ route('habilitations.index') }}" ><h5 class="card-title">Habilitations</h5></a>
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
                       
                        <i class="bi bi-list-columns-reverse text-primary"></i>
                    </div>
                    <div class="ps-3">
                        <a href="{{ route('sites.index') }}" ><h5 class="card-title">Sites</h5></a>
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
                    <i class="bi bi-houses-fill text-primary"></i>
                    </div>
                    <div class="ps-3">
                        <a href="{{ route('etablissements.index') }}" ><h5 class="card-title">Etablissement</h5></a>
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
                        <a href="{{ route('matieres.index') }}" ><h5 class="card-title">Matières</h5></a>
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
                    <i class="bi bi-house-door-fill text-primary"></i>
                    </div>
                    <div class="ps-3">
                        <a href="{{ route('classes.index') }}" ><h5 class="card-title">Classes</h5></a>
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
                    <i class="bi bi-house-door-fill text-primary"></i>
                    </div>
                    <div class="ps-3">
                        <a href="{{ route('classematieres.index') }}" ><h5 class="card-title">Classes et matières</h5></a>
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
                    <i class="bi bi-house-door-fill text-primary"></i>
                    </div>
                    <div class="ps-3">
                        <a href="{{ route('classesites.index') }}" ><h5 class="card-title">Classes et sites</h5></a>
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
                    <i class="bi bi-house-door-fill text-primary"></i>
                    </div>
                    <div class="ps-3">
                        <a href="{{ route('classeeleves.index') }}" ><h5 class="card-title">Classes et élèves</h5></a>
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
                    <i class="bi bi-person-vcard text-primary"></i>
                    </div>
                    <div class="ps-3">
                        <a href="{{ route('eleves.index') }}" ><h5 class="card-title">Elèves</h5></a>
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
@endif
@endif
@endsection
