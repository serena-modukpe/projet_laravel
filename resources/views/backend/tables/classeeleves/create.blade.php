@extends("backend.layout.mainlayout")

@section("content")

    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Créer une classe et elève</h3>
        <div class="card-text">
            <div class="">
            
                <form method="POST" action="{{ route('classeeleves.store') }}" class="mt-4">
                    @csrf

                <div class="row">
                    <div class="col-6">
                        <label for="eleve_id"class="fw-bold">Elève<i class="text-danger">*</i></label>
                        <select name="eleve_id" id="eleve_id" class="form-control form-select" required>
                            <label for="eleve_id" class=" fw-bold form-label  ">Sélectionné un élève<i class="text-danger">*</i></label>
                            <option value="">Sélectionnez un élève</option>
                            @foreach ($eleves as $eleve)
                                <option value="{{ $eleve->id }}"> {{ $eleve->nom }} {{ $eleve->prenom }} </option>
                            @endforeach
                        </select>
                    </div>

                        
                    
                    <div class="col-6">
                        <label for="classesite_id"class="fw-bold">Classes<i class="text-danger">*</i></label>
                        <select name="classesite_id" id="classesite_id" class="form-control form-select" required>
                            <label for="classesite_id" class=" fw-bold form-label  ">Sélectionné une classe<i class="text-danger">*</i></label>
                            <option value="">Sélectionnez une classe</option>
                            @foreach ($classesites as $classesite)
                                <option value="{{ $classesite->id }}"> {{ $classesite->getclasse->sigle }} </option>
                            @endforeach
                        </select>
                    </div>


                    
                    

                    <div class=" col-6 ">
                            <label for="annees"class="fw-bold">Année <i class="text-danger">*</i></label>
                            <input type="date" pattern="[0-9]*" name="annees" id="annees"  max="{{ date('Y-m-d') }}" class="form-control" required>
                    </div>
                        
                    
                        <div class="col-4 pt-3">
                            <button type="submit" class="btn btn-primary btn-sm">Créer</button>
                            <a href="{{ route('classeeleves.index') }}" class="btn btn-secondary btn-sm">Annuler</a>
                        </div>
                </div>
                    
                   
                </form>
            </div>
        </div>
</div>

@endsection
