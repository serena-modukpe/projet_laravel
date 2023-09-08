@extends("backend.layout.mainlayout")

@section("content")

    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Créer une matière</h3>
        <div class="card-text">
            <div >
            
                <form method="POST" action="{{ route('matieres.store') }}" class="mt-4">
                    @csrf
                   
                    <div class="row">
                        
                        <div class="col-6 pt-2">
                            <label for="libelle"class=" fw-bold form-label ">Libellé <i class="text-danger">*</i></label>
                            <input type="text" name="libelle" id="libelle" class="form-control" required>
                        </div>
    
                        <div class="col-6 pt-2">
                            <label for="coefficient"class=" fw-bold form-label ">Coefficient<i class="text-danger">*</i></label>
                            <input type="number" name="coefficient" id="coefficient" class="form-control" required>
                        </div>

                        <div class=" col-12 ">
                            <label for="description" class="fw-bold">Description<i class="text-danger">*</i></label>
                            <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                        </div>
                    </div>

                    <div class=" col-sm-8 mt-3">
                        <button type="submit" class="btn btn-primary btn-sm">Créer</button>
                        <a href="{{ route('matieres.index') }}" class="btn btn-secondary btn-sm">Annuler</a>
                    </div>
                    
                </form>
            </div>
        </div>
        
      </div>

@endsection
