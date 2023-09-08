@extends("backend.layout.mainlayout")

@section("content")

@include('sweetalert::alert')
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Editer un statut</h5>
            <div class="card-text">
                <!-- Le formulaire est géré par la route "statuts.update" -->
                <form method="POST" action="{{ route('statuts.update', $statut) }}" enctype="multipart/form-data">
                    <!-- Le token CSRF -->
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-6">
                            <label for="libelle"class="fw-bold">Libellé<i class="text-danger">*</i></label>
                                <!-- S'il y a un $post->libelle, on complète la valeur de l'input -->
                                <input type="text" name="libelle" value="{{ isset($statut->libelle) ? $statut->libelle : old('libelle') }}" id="libelle" class="form-control" placeholder="Le titre du statut">
                                <!-- Le message d'erreur pour "libelle" -->
                                @error("libelle")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
        
                            <div class="col-6 ">
                                <label for="description">Description</label>
                                <input type="text" name="description" value="{{ isset($statut->description) ? $statut->description : old('description') }}" id="description" class="form-control" placeholder="Le titre du role">
                                <!-- Le message d'erreur pour "description" -->
                                @error("description")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                
                            </div>
        
    
                    </div>

                    <div class="form-group col-sm-12 mt-3">
                        <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                        <a href="{{ route('statuts.index') }}" class="btn btn-secondary btn-sm">Annuler</a>
                    </div>

                

                </form>
            </div>
        
        </div>
    </div>

@endsection
