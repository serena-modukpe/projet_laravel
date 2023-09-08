@extends("backend.layout.mainlayout")

@section("content")

    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Créer un statut</h3>
        <div class="card-text">
            <div class="">
            
                <form method="POST" action="{{ route('statuts.store') }}" class="mt-4">
                    @csrf

                    <div class="row ">
                        <div class="col-12 ">
                            <label for="libelle"class="fw-bold form-label">Libellé<i class="text-danger">*</i></label>
                            <input type="text" name="libelle" id="libelle" class="form-control" required>
                        </div>

                        <div class="col-12">
                            <label for="description" class="fw-bold form-label">Description<i class="text-danger">*</i></label>
                            <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                        </div>
    
                        <div class="col-4 mt-5">
                            <button type="submit" class="btn btn-primary btn-sm">Créer</button>
                            <a href="{{ route('statuts.index') }}" class="btn btn-secondary btn-sm">Annuler</a>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
        
      </div>

@endsection
