@extends("backend.layout.mainlayout")

@section("content")

@include('sweetalert::alert')

    <div class="card">
      <div class="card-body">
            <h5 class="card-title">Editer une matière</h5>
            <div class="">
                <!-- Le formulaire est géré par la route "roles.update" -->
                <form method="POST" action="{{ route('matieres.update', $matiere) }}" enctype="multipart/form-data">
                    <!-- Le token CSRF -->
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-4">
                        <label for="libelle"class="fw-bold">Libellé<i class="text-danger">*</i></label>
                            <!-- S'il y a un $post->libelle, on complète la valeur de l'input -->
                            <input type="text" name="libelle" value="{{ isset($matiere->libelle) ? $matiere->libelle : old('libelle') }}" id="libelle" class="form-control" placeholder="Le titre du matiere">
                            <!-- Le message d'erreur pour "libelle" -->
                            @error("libelle")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-4">
                            <label for="description" class="fw-bold">Description<i class="text-danger">*</i></label>
                            <input type="text" name="description" value="{{ isset($matiere->description) ? $matiere->description : old('description') }}" id="description" class="form-control" placeholder="Le titre du matiere">
                            <!-- Le message d'erreur pour "description" -->
                            @error("description")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-4">
                            <label for="coefficient"class="fw-bold">Coefficient<i class="text-danger">*</i></label>
                            
                                <input type="number" name="coefficient" value="{{ isset($matiere->coefficient) ? $matiere->coefficient : old('coefficient') }}" id="coefficient" class="form-control" placeholder="Le titre du matiere">
                        
                                @error("coefficient")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>

                        
                        <div class="col-12 pt-3">
                            <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                            <a href="{{ route('matieres.index') }}" class="btn btn-secondary btn-sm" >Annuler</a>
                        </div>


                    </div>
                    

                </form>
            </div>
        </div>
    </div>

@endsection
