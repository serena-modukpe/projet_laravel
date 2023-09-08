@extends("backend.layout.mainlayout")

@section("content")

@include('sweetalert::alert')

    <div class="card">
      <div class="card-body">
            <h5 class="card-title">Editer une classe eleve</h5>
            <div class="">
                <!-- Le formulaire est géré par la route "roles.update" -->
                <form method="POST" action="{{ route('classeeleves.update', $classeeleve->id) }}" enctype="multipart/form-data">
                    <!-- Le token CSRF -->
                    @csrf
                    @method('put')
                    <div class="row">

                        
                        <div class="col-6 p-2">
                            <label for="classe_id form-label"class="fw-bold ">Classe <i class="text-danger">*</i></label>
                            <select name="classe_id" id="classe_id" class="form-control form-select">
                                <optgroup label="valeur par défaut">
                                    <option value="{{$classeeleve->classe_id}}">{{$classeeleve->getclasse->sigle}}</option>
                                </optgroup>
                                <optgroup label="liste disponible">
                                    @foreach($classes as $classe)
                                    <option value="{{$classe->id}}">{{$classe->sigle}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>

                        <div class="col-6 p-2">
                            <label for="site_id form-label" class="fw-bold ">Site <i class="text-danger">*</i></label>
                            <select name="site_id" id="site_id" class="form-control form-select">
                                <optgroup label="valeur par défaut">
                                    <option value="{{$classeeleve->site_id}}">{{$classeeleve->getsite->nom}}</option>
                                </optgroup>
                                <optgroup label="liste disponible">
                                    @foreach($sites as $site)
                                    <option value="{{$site->id}}">{{$site->nom}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
    
                        <div class="col-6 p-2">
                            <label for="eleve_id form-label" class="fw-bold ">Elève <i class="text-danger">*</i></label>
                            <select name="eleve_id" id="eleve_id" class="form-control form-select">
                                <optgroup label="valeur par défaut">
                                    <option value="{{$classeeleve->geteleve->eleve_id}}">{{$classeeleve->geteleve->nom}}  {{$classeeleve->geteleve->prenom}}</option>
                                </optgroup>
                                <optgroup label="liste disponible">
                                    @foreach($eleves as $eleve)
                                    <option value="{{$eleve->id}}">{{$eleve->nom}} {{$eleve->prenom}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>


                        <div class="col-6">
                            <label for="annees"class="fw-bold">Année <i class="text-danger">*</i></label>
                                <!-- S'il y a un $post->annees, on complète la valeur de l'input -->
                                <input type="number" name="annees" value="{{ isset($classeeleve->annees) ? $classeeleve->annees : old('annees') }}" id="annees" class="form-control" placeholder="Année">
                                <!-- Le message d'erreur pour "annees" -->
                                @error("annees")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>
    
                        <div class="col-4 p-2">
                            <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                            <a href="{{ route('classeeleves.index') }}" class="btn btn-secondary btn-sm">Annuler</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
