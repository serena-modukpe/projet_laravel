@extends("backend.layout.mainlayout")

@section("content")

@include('sweetalert::alert')

    <div class="card">
      <div class="card-body">
            <h5 class="card-title">Editer une classematiere et sa matière</h5>
            <div class="">
                <!-- Le formulaire est géré par la route "roles.update" -->
                <form method="POST" action="{{ route('classematieres.update', $classematiere->id) }}" enctype="multipart/form-data">
                    <!-- Le token CSRF -->
                    @csrf
                    @method('put')
                    <div class="row">

                        <div class="col-6 p-2">
                        
                            <select name="matiere_id" id="matiere_id" class="form-select">
                                <label for="matiere_id fw-bold form-label ">Matière <i class="text-danger">*</i></label>
                                <optgroup label="valeur par défaut">
                                    <option value="{{$classematiere->getmatiere->matiere_id}}">{{$classematiere->getmatiere->libelle}}</option>
                                </optgroup>
                                <optgroup label="liste disponible">
                                    @foreach($matieres as $matiere)
                                    <option value="{{$matiere->id}}">{{$matiere->libelle}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-6 p-2">
                            
                            <select name="classe_id" id="classe_id" class="form-control form-select">
                                <label for="classe_id fw-bold form-label ">Classe <i class="text-danger">*</i></label>
                                <optgroup label="valeur par défaut">
                                    <option value="{{$classematiere->classe_id}}">{{$classematiere->getclasse->sigle}}</option>
                                </optgroup>
                                <optgroup label="liste disponible">
                                    @foreach($classes as $classe)
                                    <option value="{{$classe->id}}">{{$classe->sigle}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
    
                        <div class="col-6 p-2">
                            
                            <select name="site_id" id="site_id" class="form-control form-select">
                                <label for="site_id fw-bold form-label ">Classe <i class="text-danger">*</i></label>
                                <optgroup label="valeur par défaut">
                                    <option value="{{$classematiere->getsite->site_id}}"> {{$classematiere->getsite->nom}}</option>
                                </optgroup>
                                <optgroup label="liste disponible">
                                    @foreach($sites as $site)
                                    <option value="{{$site->id}}">  {{$site->nom}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
    
                        
    
                        <div class="col-12 p-2">
                            <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                            <a href="{{ route('classematieres.index') }}" class="btn btn-secondary btn-sm">Annuler</a>
                        </div>
                </form>
            </div>
        </div>
    </div>

@endsection
