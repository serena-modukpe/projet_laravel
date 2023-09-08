@extends("backend.layout.mainlayout")

@section("content")

@include('sweetalert::alert')
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Editer un site</h5>
            <div class="card-text">
                <!-- Le formulaire est géré par la route "site.update" -->
                <form method="POST" action="{{ route('sites.update', $site) }}" enctype="multipart/form-data">
                    <!-- Le token CSRF -->
                    @csrf
                    @method('put')
                    <div class="row">
                    <div class="form-group col-4">
                    <label for="nom"class="fw-bold">Nom<i class="text-danger">*</i></label>
                        <input type="text" name="nom" value="{{ isset($site->nom) ? $site->nom : old('nom') }}" id="nom" class="form-control">
                        @error("nom")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group col-sm-12 ">
                        <label for="etablissement_id" class="fw-bold">Site <i class="text-danger">*</i></label>
                        <select name="etablissement_id" id="etablissement_id" class="form-select">

                            <optgroup label="valeur par défaut">
                                <option value="{{$site->getetablissement->id}}">{{$site->getetablissement->nom}}</option>
                            </optgroup>
                            <optgroup label="liste disponible">
                            @foreach($etablissements as $etablissement)
                                <option value="{{$etablissement->id}}">{{$etablissement->nom}}</option>
                                @endforeach
        
                            </optgroup>
                        </select>
                    </div>



                    <div class="form-group col-sm-12 ">
                        <label for="user_id" class="fw-bold">Utilisateur <i class="text-danger">*</i></label>
                        <select name="user_id" id="user_id" class="form-select">

                            <optgroup label="valeur par défaut">
                                <option value="{{$site->getuser->id}}">{{$site->getuser->name}}</option>
                            </optgroup>
                            <optgroup label="liste disponible">
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                            </optgroup>
                        </select>
                    </div>

                </div>

                    

                    <div class="form-group col-sm-12 mt-3">
                        <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                        <a href="{{ route('sites.index') }}" class="btn btn-secondary btn-sm">Annuler</a>
                    </div>

                

                </form>
            </div>
        
        </div>
    </div>
  </div>
</div>

@endsection
