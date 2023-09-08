@extends("backend.layout.mainlayout")


@section("content")
@if(Auth::user()->role_id !== 1 && Auth::user()->role_id !== 2)
@else
@if(Auth::user()->getrole->id == 4)


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
                        <a href="#" ><h5 class="card-title">Notes</h5></a>
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
                        <a href="#" ><h5 class="card-title">Notes</h5></a>
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
                        <a href="#" ><h5 class="card-title">Notes</h5></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


   

</div>
@endif
@endif
@endsection
