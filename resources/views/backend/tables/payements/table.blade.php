<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
            <div class="card-text">
                <!-- Le formulaire est géré par la route "statuts.update" -->
                <form method="POST" action="{{ route('statuts.update', $statut) }}" enctype="multipart/form-data">
                    <!-- Le token CSRF -->
                    @csrf
                    @method('put')
                    <div class="form-group col-8 mx-auto">
                        <label for="libelle">Libelle</label>
                        <!-- S'il y a un $post->libelle, on complète la valeur de l'input -->
                        <input type="text" name="libelle" value="{{ isset($statut->libelle) ? $statut->libelle : old('libelle') }}" id="libelle" class="form-control" placeholder="Le titre du statut">
                        <!-- Le message d'erreur pour "libelle" -->
                        @error("libelle")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-sm-8 mx-auto text-center">
                        <button type="submit" class="btn btn-primary">Valider</button>
                        <a href="{{ route('statuts.index') }}" class="btn btn-secondary">Annuler</a>
                    </div>

                

                </form>
            </div>
        
        </div>
    </div>
  </div>
</div>