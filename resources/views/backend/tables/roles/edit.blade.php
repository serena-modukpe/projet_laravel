@extends("backend.layout.mainlayout")

@section("content")

@include('sweetalert::alert')

    <div class="card">
      <div class="card-body">
            <h5 class="card-title">Modifier un rôle</h5>
            <div class="">
                <!-- Le formulaire est géré par la route "roles.update" -->
                <form method="POST" action="{{ route('roles.update', $role) }}" enctype="multipart/form-data">
                    <!-- Le token CSRF -->
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-6">
                            <label for="libelle"class="fw-bold">Libellé<i class="text-danger">*</i></label>
                                <!-- S'il y a un $post->libelle, on complète la valeur de l'input -->
                                <input type="text" name="libelle" value="{{ isset($role->libelle) ? $role->libelle : old('libelle') }}" id="libelle" class="form-control" placeholder="Le titre du role">
                                <!-- Le message d'erreur pour "libelle" -->
                                @error("libelle")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>


                        <div class="col-6">
                            <label for="description">Description</label>
                            <input type="text" name="description" value="{{ isset($role->description) ? $role->description : old('description') }}" id="description" class="form-control" placeholder="Le titre du role">
                            <!-- Le message d'erreur pour "description" -->
                            @error("description")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            
                        </div>
                    
                        <div class="col-4 pt-3">
                            <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                            <a href="{{ route('roles.index') }}" class="btn btn-secondary btn-sm">Annuler</a>
                        </div>
                    </div>
                </form>
            </div>
@endsection
