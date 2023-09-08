@extends("backend.layout.mainlayout")

@section("content")

@include('sweetalert::alert')


    <div class="card">
      <div class="card-body">
            <h5 class="card-title">Editer une habilitation</h5>
            <div class="card-text">
                <!-- Le formulaire est géré par la route "habilitation.update" -->
                <form method="POST" action="{{ route('habilitations.update', $habilitation) }}" enctype="multipart/form-data">
                    <!-- Le token CSRF -->
                    @csrf
                    @method('put')
                        <div class="row">



                            <div class="col-6">
                                <label for="role_id">Role</label>
                                <select name="role_id" id="role_id" class="form-select">

                                    <optgroup label="valeur par défaut">
                                        <option value="{{$habilitation->getrole->id}}">{{$habilitation->getrole->libelle}}</option>
                                    </optgroup>
                                    <optgroup label="liste disponible">
                                        @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->nom}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>

                            <div class="col-md-6 mt-4">
                                <label class="fw-bold">Droit<span class="text-danger">*</span></label><br>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="create" id="create" class="form-check-input" value="1" {{ $habilitation->create ? 'checked' : '' }}>
                                    <label for="create" class="form-check-label fw-bold">Créer</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="read" id="read" class="form-check-input" value="1" {{ $habilitation->read ? 'checked' : '' }}>
                                    <label for="read" class="form-check-label fw-bold">Lire</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="update" id="update" class="form-check-input" value="1" {{ $habilitation->update ? 'checked' : '' }}>
                                    <label for="update" class="form-check-label fw-bold">Modifier</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="delete" id="delete" class="form-check-input" value="1" {{ $habilitation->delete ? 'checked' : '' }}>
                                    <label for="delete" class="form-check-label fw-bold">Supprimer</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="fw-bold">Description</label>
                                <input type="text" name="description" id="description" class="form-control" value="{{ isset($habilitation) ? $habilitation->description : old('description') }}" required>
                            </div>





                            <div class="col-12 pt-3">
                                <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                                <a href="{{ route('habilitations.index') }}" class="btn btn-secondary btn-sm">Annuler</a>
                            </div>

                        </div>

                </form>
            </div>
        
        </div>
    </div>


@endsection
