@extends("backend.layout.mainlayout")

@section("content")

@include('sweetalert::alert')

    <div class="card">
      <div class="card-body">
            <h5 class="card-title">Editer un rôle inscription</h5>
            <div class="">
                <!-- Le formulaire est géré par la route "roles.update" -->
                <form method="POST" action="{{ route('inscriptions.update', $inscriptions) }}" enctype="multipart/form-data">
                    <!-- Le token CSRF -->
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-6">
                        <label for="libelle"class="fw-bold">Libellé<i class="text-danger">*</i></label>
                            <!-- S'il y a un $post->libelle, on complète la valeur de l'input -->
                            <input type="text" name="libelle" value="{{ isset($inscriptions->libelle) ? $inscriptions->libelle : old('libelle') }}" id="libelle" class="form-control" placeholder="Le titre du inscriptions">
                            <!-- Le message d'erreur pour "libelle" -->
                            @error("libelle")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-6">
                            <label for="site_id"class="fw-bold">Site<i class="text-danger">*</i></label>
                            <select name="site_id" id="site_id" class="form-select">

                                <optgroup label="valeur par défaut">
                                    <option value="{{$inscriptions->getsite->id}}">{{$inscriptions->getsite->nom}}</option>
                                </optgroup>
                                <optgroup label="liste disponible">
                                    @foreach($sites as $site)
                                    <option value="{{$site->id}}">{{$site->nom}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>

                        <div class="col-6">
                            <label for="description"class="fw-bold">Description<i class="text-danger">*</i></label>
                            <input type="text" name="description" value="{{ isset($inscriptions->description) ? $inscriptions->description : old('description') }}" id="description" class="form-control" placeholder="Le titre du inscriptions">
                            <!-- Le message d'erreur pour "description" -->
                            @error("description")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            
                        </div>
                
                        <div class="col-12 pt-3">
                            <button type="submit" class="btn btn-primary btn-sm">Valider</button>
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
