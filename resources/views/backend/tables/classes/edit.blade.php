@extends("backend.layout.mainlayout")

@section("content")

@include('sweetalert::alert')


    <div class="card">
      <div class="card-body">
            <h5 class="card-title">Editer une classe</h5>
            <div class="">
                <!-- Le formulaire est géré par la route "roles.update" -->
                <form method="POST" action="{{ route('classes.update', $classe) }}" enctype="multipart/form-data">
                    <!-- Le token CSRF -->
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-6">
                        <label for="sigle"class="fw-bold">Sigle<i class="text-danger">*</i></label>
                            <!-- S'il y a un $post->sigle, on complète la valeur de l'input -->
                            <input type="text" name="sigle" value="{{ isset($classe->sigle) ? $classe->sigle : old('sigle') }}" id="sigle" class="form-control" placeholder="Le titre du classe">
                            <!-- Le message d'erreur pour "sigle" -->
                            @error("sigle")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-6 ">
                            <label for="libelle"class="fw-bold">Libellé<i class="text-danger">*</i></label>
                                <!-- S'il y a un $post->libelle, on complète la valeur de l'input -->
                                <input type="text" name="libelle" value="{{ isset($classe->libelle) ? $classe->libelle : old('libelle') }}" id="libelle" class="form-control" placeholder="Le titre du matiere">
                                <!-- Le message d'erreur pour "libelle" -->
                                @error("libelle")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="col-12 pt-3">
                            <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                            <a href="{{ route('classes.index') }}" class="btn btn-secondary btn-sm">Annuler</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
