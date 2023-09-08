@extends("backend.layout.mainlayout")

@section("content")

@include('sweetalert::alert')

    <div class="card">
      <div class="card-body">
            <h5 class="card-title">Editer une calendrier et sa matière</h5>
            <div class="">
                <!-- Le formulaire est géré par la route "roles.update" -->
                <form method="POST" action="{{ route('calendriers.update', $calendrier->id) }}" enctype="multipart/form-data">
                    <!-- Le token CSRF -->
                    @csrf
                    @method('put')
                    <div class="row">



                        <div class="col-6 p-2">
                            <label for="matiere_id"class="fw-bold">Matière<i class="text-danger">*</i></label>
                            <select name="matiere_id" id="matiere_id" class="form-select">
                                <label for="matiere_id fw-bold form-label ">Matière <i class="text-danger">*</i></label>
                                <optgroup label="valeur par défaut">
                                    <option value="{{$calendrier->getmatiere->matiere_id}}">{{$calendrier->getmatiere->libelle}}</option>
                                </optgroup>
                                <optgroup label="liste disponible">
                                    @foreach($matieres as $matiere)
                                    <option value="{{$matiere->id}}">{{$matiere->libelle}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-6 p-2">
                            <label for="classesite_id"class="fw-bold">Elève<i class="text-danger">*</i></label>
                            <select name="classesite_id" id="classesite_id" class="form-control form-select">
                                <label for="classesite_id fw-bold form-label ">Classe <i class="text-danger">*</i></label>
                                <optgroup label="valeur par défaut">
                                    <option value="{{$calendrier->getclassesite->classesite_id}}">{{$calendrier->getclassesite->getclasse->sigle}}</option>
                                </optgroup>
                                <optgroup label="liste disponible">
                                    @foreach($classesites as $classesite)
                                    <option value="{{$classesite->id}}">{{$classesite->getclasse->sigle}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
    
                        <div class="col-6">
                            <label for="date_debut"class="fw-bold">Date_début <i class="text-danger">*</i></label>
                                <input type="datetime" name="date_debut" value="{{ isset($calendrier->date_debut) ? $calendrier->date_debut : old('date_debut') }}" id="date_debut" class="form-control" max="{{ date('d-m-Y') }}">
                                @error("date_debut")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="col-6">
                            <label for="date_fin"class="fw-bold">Date_fin <i class="text-danger">*</i></label>
                                <input type="datetime" name="date_fin" value="{{ isset($calendrier->date_fin) ? $calendrier->date_fin : old('date_fin') }}" id="date_fin" class="form-control" max="{{ date('d-m-Y') }}">
                                @error("date_fin")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="col-6 ">
                            <label for="type_devoir"class="fw-bold">Type de devoir<i class="text-danger">*</i></label>
                                <!-- S'il y a un $post->type_devoir, on complète la valeur de l'input -->
                                <input type="text" name="type_devoir" value="{{ isset($calendrier->type_devoir) ? $calendrier->type_devoir : old('type_devoir') }}" id="type_devoir" class="form-control" >
                                <!-- Le message d'erreur pour "type_devoir" -->
                                @error("type_devoir")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>

                        @if(Auth::check())
                                <div class="col-6">
                                
                                <input type="text" name="createdBy" id="createdBy" class="form-control"  value="{{ Auth::user()->name }}"required hidden>
                            </div>
                        @endif
    
                        <div class="col-12 p-2">
                            <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                            <a href="{{ route('calendriers.index') }}" class="btn btn-secondary btn-sm">Annuler</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
