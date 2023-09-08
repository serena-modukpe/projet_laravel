@extends("backend.layout.mainlayout")

@section("content")

@include('sweetalert::alert')

    <div class="card">
      <div class="card-body">
            <h5 class="card-title">Editer une interrogation </h5>
            <div class="">
                <!-- Le formulaire est géré par la route "roles.update" -->
                <form method="POST" action="{{ route('interrogations.update', $interrogation->id) }}" enctype="multipart/form-data">
                    <!-- Le token CSRF -->
                    @csrf
                    @method('put')
                    <div class="row">

                        <div class="col-6 p-2">
                            <label for="matiere_id"class="fw-bold">Matière<i class="text-danger">*</i></label>
                            <select name="matiere_id" id="matiere_id" class="form-select">
                                <label for="matiere_id fw-bold form-label ">Matière <i class="text-danger">*</i></label>
                                <optgroup label="valeur par défaut">
                                    <option value="{{$interrogation->getmatiere->matiere_id}}">{{$interrogation->getmatiere->libelle}}</option>
                                </optgroup>
                                <optgroup label="liste disponible">
                                    @foreach($matieres as $matiere)
                                    <option value="{{$matiere->id}}">{{$matiere->libelle}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-6 p-2">
                            <label for="classeeleve_id"class="fw-bold">Elève<i class="text-danger">*</i></label>
                            <select name="classeeleve_id" id="classeeleve_id" class="form-control form-select">
                                <label for="classeeleve_id fw-bold form-label ">Classe <i class="text-danger">*</i></label>
                                <optgroup label="valeur par défaut">
                                    <option value="{{$interrogation->getclasseeleve->classeeleve_id}}">{{$interrogation->getclasseeleve->geteleve->nom}} {{$interrogation->getclasseeleve->geteleve->prenom}}</option>
                                </optgroup>
                                <optgroup label="liste disponible">
                                    @foreach($classeeleves as $classeeleve)
                                    <option value="{{$classeeleve->id}}">{{$classeeleve->geteleve->nom}} {{$classeeleve->geteleve->prenom}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
    
                        <div class="col-6">
                                <label for="note"class="fw-bold">Note<i class="text-danger">*</i></label>
                                <!-- S'il y a un $post->note, on complète la valeur de l'input -->
                                <input type="text" name="note" value="{{ isset($interrogation->note) ? $interrogation->note : old('note') }}" id="note" class="form-control" placeholder="Le titre du interrogation">
                                <!-- Le message d'erreur pour "note" -->
                                @error("note")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            

                            @if(Auth::check())
                                 <div class="col-6">
                                    <label for="createdBy" class="fw-bold">Created_by<i class="text-danger">*</i></label>
                                    <input type="text" name="createdBy" id="createdBy" class="form-control"  value="{{ Auth::user()->name }} {{ Auth::user()->prenom }}" required>
                                </div>
                            @endif

                            

    
                        <div class="col-12 p-2">
                            <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                            <a href="{{ route('interrogations.index') }}" class="btn btn-secondary btn-sm">Annuler</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
