@extends("backend.layout.mainlayout")

@section("content")

@include('sweetalert::alert')

    <div class="card">
      <div class="card-body">
            <h5 class="card-title">Editer une note et sa matière</h5>
            <div class="">
                <!-- Le formulaire est géré par la route "roles.update" -->
                <form method="POST" action="{{ route('notes.update', $note->id) }}" enctype="multipart/form-data">
                    <!-- Le token CSRF -->
                    @csrf
                    @method('put')
                    <div class="row">

                        <div class="col-6 p-2">
                            <label for="matiere_id"class="fw-bold">Matière<i class="text-danger">*</i></label>
                            <select name="matiere_id" id="matiere_id" class="form-select">
                                <label for="matiere_id fw-bold form-label ">Matière <i class="text-danger">*</i></label>
                                <optgroup label="valeur par défaut">
                                    <option value="{{$note->getmatiere->matiere_id}}">{{$note->getmatiere->libelle}}</option>
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
                                    <option value="{{$note->getclasseeleve->classeeleve_id}}">{{$note->getclasseeleve->geteleve->nom}}</option>
                                </optgroup>
                                <optgroup label="liste disponible">
                                    @foreach($classeeleves as $classeeleve)
                                    <option value="{{$classeeleve->id}}">{{$classeeleve->geteleve->nom}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
    
                        <div class="col-6">
                                <label for="note1"class="fw-bold">Note1<i class="text-danger">*</i></label>
                                <!-- S'il y a un $post->note1, on complète la valeur de l'input -->
                                <input type="text" name="note1" value="{{ isset($note->note1) ? $note->note1 : old('note1') }}" id="note1" class="form-control" placeholder="Le titre du note">
                                <!-- Le message d'erreur pour "note1" -->
                                @error("note1")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="col-6">
                                <label for="note2"class="fw-bold">Note2<i class="text-danger">*</i></label>
                                <!-- S'il y a un $post->note2, on complète la valeur de l'input -->
                                <input type="text" name="note2" value="{{ isset($note->note2) ? $note->note2 : old('note2') }}" id="note2" class="form-control" placeholder="Le titre du note">
                                <!-- Le message d'erreur pour "note2" -->
                                @error("note2")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label for="note3"class="fw-bold">Note3<i class="text-danger">*</i></label>
                                <!-- S'il y a un $post->note3, on complète la valeur de l'input -->
                                <input type="text" name="note3" value="{{ isset($note->note3) ? $note->note3 : old('note3') }}" id="note3" class="form-control" placeholder="Le titre du note">
                                <!-- Le message d'erreur pour "note3" -->
                                @error("note3")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label for="devoir1"class="fw-bold">Devoir1<i class="text-danger">*</i></label>
                                <!-- S'il y a un $post->devoir1, on complète la valeur de l'input -->
                                <input type="text" name="devoir1" value="{{ isset($note->devoir1) ? $note->devoir1 : old('devoir1') }}" id="devoir1" class="form-control" placeholder="Le titre du note">
                                <!-- Le message d'erreur pour "devoir1" -->
                                @error("devoir1")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label for="devoir2"class="fw-bold">Devoir2<i class="text-danger">*</i></label>
                                <!-- S'il y a un $post->devoir2, on complète la valeur de l'input -->
                                <input type="text" name="devoir2" value="{{ isset($note->devoir2) ? $note->devoir2 : old('devoir2') }}" id="devoir2" class="form-control" placeholder="Le titre du note">
                                <!-- Le message d'erreur pour "devoir2" -->
                                @error("devoir2")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label for="devoir3"class="fw-bold">Devoir3<i class="text-danger">*</i></label>
                                <!-- S'il y a un $post->devoir3, on complète la valeur de l'input -->
                                <input type="text" name="devoir3" value="{{ isset($note->devoir3) ? $note->devoir3 : old('devoir3') }}" id="devoir3" class="form-control" placeholder="Le titre du note">
                                <!-- Le message d'erreur pour "devoir3" -->
                                @error("devoir3")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            @if(Auth::check())
                                 <div class="col-6">
                                    <label for="createdBy" class="fw-bold">Created_by<i class="text-danger">*</i></label>
                                    <input type="text" name="createdBy" id="createdBy" class="form-control"  value="{{ Auth::user()->name }}"required>
                                </div>
                            @endif

                            <div class="col-6">
                                <label for="moyeninterro"class="fw-bold">Moyenne des interros<i class="text-danger">*</i></label>
                                <!-- S'il y a un $post->moyeninterro, on complète la valeur de l'input -->
                                <input type="text" name="moyeninterro" value="{{ isset($note->moyeninterro) ? $note->moyeninterro : old('moyeninterro') }}" id="moyeninterro" class="form-control" placeholder="Le titre du note">
                                <!-- Le message d'erreur pour "moyeninterro" -->
                                @error("moyeninterro")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label for="moyendevoir"class="fw-bold">Moyenne des devoirs<i class="text-danger">*</i></label>
                                <!-- S'il y a un $post->moyendevoir, on complète la valeur de l'input -->
                                <input type="text" name="moyendevoir" value="{{ isset($note->moyendevoir) ? $note->moyendevoir : old('moyendevoir') }}" id="moyendevoir" class="form-control" placeholder="Le titre du note">
                                <!-- Le message d'erreur pour "moyendevoir" -->
                                @error("moyendevoir")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label for="moyenne"class="fw-bold">Moyenne<i class="text-danger">*</i></label>
                                <!-- S'il y a un $post->moyenne, on complète la valeur de l'input -->
                                <input type="text" name="moyenne" value="{{ isset($note->moyenne) ? $note->moyenne : old('moyenne') }}" id="moyenne" class="form-control" placeholder="Le titre du note">
                                <!-- Le message d'erreur pour "moyenne" -->
                                @error("moyenne")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            

    
                        <div class="col-12 p-2">
                            <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                            <a href="{{ route('notes.index') }}" class="btn btn-secondary btn-sm">Annuler</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
