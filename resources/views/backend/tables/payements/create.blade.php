@extends("backend.layout.mainlayout")

@section("content")

  
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Créer un statut payement</h3>
        <div class="card-text">
            <div class="">
            
                <form method="POST" action="{{ route('payements.store') }}" class="mt-4">
                    @csrf
                    <div class="row">

                        <div class="col-6 ">
                            <label for="libelle"class="fw-bold">Libellé<i class="text-danger">*</i></label>
                            <input type="text" name="libelle" id="libelle" class="form-control" required>
                        </div>

                        
                        <div class="col-6">
                        <label for="user_id" class="fw-bold"> site<i class="text-danger">*</i></label>
                            <select name="site_id" id="site_id" class="form-control form-select" required>
                            
                                <option value="">Sélectionnez un site</option>
                                @foreach ($sites as $site)
                                    <option value="{{ $site->id }}"> {{ $site->nom }} </option>
                                @endforeach
                            </select>
                        </div>
                   
                        <div class="col-12 pt-3">
                            <label for="description" class="fw-bold">Description<i class="text-danger">*</i></label>
                            <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="col-12 pt-3">
                            <button type="submit" class="btn btn-primary btn-sm">Créer</button>
                            <a href="{{ route('payements.index') }}" class="btn btn-secondary btn-sm">Annuler</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
      </div>
    </div>
</div>

@endsection
