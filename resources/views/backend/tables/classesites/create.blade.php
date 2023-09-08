@extends("backend.layout.mainlayout")

@section("content")

    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Créer une classe et son site</h3>
        <div class="card-text">
            <div class="">
            
                <form method="POST" action="{{ route('classesites.store') }}" class="mt-4">
                    @csrf

                <div class="row">
                    <div class="col-6">
                        <label for="site_id" class=" fw-bold form-label  ">Sélectionné un site<i class="text-danger">*</i></label>
                        <select name="site_id" id="site_id" class="form-control form-select" required>
                            <option value="">Sélectionnez un site</option>
                            @foreach ($sites as $site)
                                <option value="{{ $site->id }}"> {{ $site->nom }} </option>
                            @endforeach
                        </select>
                    </div>

                        
                    <div class="col-6">
                        <label for="classe_id" class=" fw-bold form-label  ">Sélectionné une classe<i class="text-danger">*</i></label>
                        <select name="classe_id" id="classe_id" class="form-control form-select" required>
                            <option value="">Sélectionnez une classe</option>
                            @foreach ($classes as $classe)
                                <option value="{{ $classe->id }}"> {{ $classe->libelle }} </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-6">
                        <label for="effectif"class="fw-bold pt-2">Effectif<i class="text-danger">*</i></label>
                        <input type="number" name="effectif" id="effectif" class="form-control" required>
                    </div>


                    <div class="col-6">
                        <label for="user_id" class=" fw-bold pt-2">Maître <i class="text-danger">*</i></label>
                            <select name="user_id" id="user_id" class="form-control form-select" required>
                                <option value="">Sélectionnez un maitre</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"> {{ $user->name }} {{ $user->prenom }}</option>
                                @endforeach
                            </select>
                    </div>

                        
                    
                   
                    </div>
                    <div class="col-4 pt-5">
                            <button type="submit" class="btn btn-primary btn-sm">Créer</button>
                            <a href="{{ route('classesites.index') }}" class="btn btn-secondary btn-sm">Annuler</a>
                        </div>

                    
                   
                </form>
            </div>
        </div>
</div>

@endsection
