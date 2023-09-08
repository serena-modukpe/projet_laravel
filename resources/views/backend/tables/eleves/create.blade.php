@extends("backend.layout.mainlayout")

@section("content")

    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Enregistrer un élève</h3>
        <div class="card-text">
            <div >
            
                <form method="POST" action="{{ route('eleves.store') }}" class="mt-4">
                    @csrf
                    <div class="row">

                    <div class="row">
                        
                        <div class="col-6 pt-2">
                            <label for="nom"class=" fw-bold form-label ">Nom<i class="text-danger">*</i></label>
                            <input type="text" name="nom" id="nom" style="text-transform : uppercase;" class="form-control" required>
                        </div>
    
                        <div class="col-6 pt-2">
                            <label for="prenom"class="fw-bold form-label ">Prénom<i class="text-danger">*</i></label>
                            <input type="text" name="prenom" id="prenom" style="text-transform : capitalize;"  class="form-control" required>
                        </div>
    
                        <div class="col-6 pt-2">
                            <label for="date_naissance"class="fw-bold form-label ">Date de naissance<i class="text-danger">*</i></label>
                            <input type="date" name="date_naissance" id="date_naissance" class="form-control" max="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="col-6 pt-2">
                            <label for="telephone"class="fw-bold form-label ">Téléphone<i class="text-danger">*</i></label>
                            <input type="number" name="telephone" id="telephone" class="form-control" required>
                        </div>

                        <div class="col-6 pt-2">
                            
                            <input type="text" name="numat" id="numat" value="{{ $nouveauNumMatricule }}" class="form-control" readonly  hidden>
                        </div>
                        
                    </div>

                    <div class=" col-sm-8 mt-3">
                        <button type="submit" class="btn btn-primary btn-sm">Créer</button>
                        <a href="{{ route('eleves.index') }}" class="btn btn-secondary btn-sm">Annuler</a>
                    </div>
                    
                </form>
            </div>
        </div>
        
      </div>

@endsection
