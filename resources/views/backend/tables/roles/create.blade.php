@extends("backend.layout.mainlayout")

@section("content")

  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Créer un rôle</h3>
        <div class="card-text">
            <div class="">
            
                <form method="POST" action="{{ route('roles.store') }}" class="mt-4">
                    @csrf

                <div class="row">

                    <div class="form-group col-6">
                        <label for="libelle"class="fw-bold">Libellé<i class="text-danger">*</i></label>
                        <input type="text" name="libelle" id="libelle" class="form-control" required>
                    </div>

                    <div class="form-group col-6">
                        <label for="description" class="fw-bold">Description<i class="text-danger">*</i></label>
                        <input type="text" name="description" id="description" class="form-control" rows="3" required>
                    </div>

                        <div class="form-group col-sm-8 mt-3">
                            <button type="submit" class="btn btn-primary btn-sm">Créer</button>
                            <a href="{{ route('roles.index') }}" class="btn btn-secondary btn-sm">Annuler</a>
                        </div>
                </div>

                    
                </form>
            </div>
        </div>
        
      </div>
    </div>
</div>

@endsection
