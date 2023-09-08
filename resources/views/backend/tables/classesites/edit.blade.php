@extends("backend.layout.mainlayout")

@section("content")

@include('sweetalert::alert')

    <div class="card">
      <div class="card-body">
            <h5 class="card-title">Editer une classe et son site</h5>
            <div class="">
                <!-- Le formulaire est géré par la route "roles.update" -->
                <form method="POST" action="{{ route('classesites.update', $classesite) }}" enctype="multipart/form-data">
                    <!-- Le token CSRF -->
                    @csrf
                    @method('put')
                    <div class="row">

                        <div class="col-6">
                            <label for="site_id form-label" class="fw-bold">Site <i class="text-danger">*</i></label>
                            <select name="site_id" id="site_id" class="form-select">
                                <optgroup label="valeur par défaut">
                                    <option value="{{$classesite->getsite->site_id}}">{{$classesite->getsite->nom}}</option>
                                </optgroup>
                                <optgroup label="liste disponible">
                                    @foreach($sites as $site)
                                    <option value="{{$site->id}}">{{$site->nom}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>



                        <div class="col-6">
                            <label for="effectif"class="fw-bold">Effectif<i class="text-danger">*</i></label>
                                <input type="number" name="effectif" value="{{ isset($classesite->effectif) ? $classesite->effectif : old('effectif') }}" id="effectif" class="form-control" placeholder="">
                                @error("effectif")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div> 


                        <div class="col-6">
                            <label for="classe_id form-label " class="fw-bold">Classe <i class="text-danger">*</i></label>
                            <select name="classe_id" id="classe_id" class="form-control form-select">
                                <optgroup label="valeur par défaut">
                                    <option value="{{$classesite->getclasse->classe_id}}">{{$classesite->getclasse->sigle}}</option>
                                </optgroup>
                                <optgroup label="liste disponible">
                                    @foreach($classes as $classe)
                                    <option value="{{$classe->id}}">{{$classe->sigle}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>



                        <div class="col-6">
                            <label for="user_id"class="fw-bold">Maître<i class="text-danger">*</i></label>
                            <select name="user_id" id="user_id" class="form-select">
    
                                <optgroup label="valeur par défaut">
                                    <option value="{{$classesite->getuser->id}}">{{$classesite->getuser->name}}</option>
                                </optgroup>
                                <optgroup label="liste disponible">
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
    
                        
    
                        <div class="col-4 p-2">
                            <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                            <a href="{{ route('classesites.index') }}" class="btn btn-secondary btn-sm">Annuler</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
