@extends("backend.layout.mainlayout")

@section("content")

@include('sweetalert::alert')


    <div class="card">
      <div class="card-body">
            <h5 class="card-title">Editer un etablissement</h5>
            <div class="">
                <!-- Le formulaire est géré par la route "roles.update" -->
                <form method="POST" action="{{ route('etablissements.update', $etablissement) }}" enctype="multipart/form-data">
                    <!-- Le token CSRF -->
                    @csrf
                    @method('put')
                        <div class="row">
                                <div class=" col-6">
                                    <label for="nom"class="fw-bold">Nom<i class="text-danger">*</i></label>
                                    <!-- S'il y a un $post->nom, on complète la valeur de l'input -->
                                    <input type="text" name="nom" value="{{ isset($etablissement->nom) ? $etablissement->nom : old('nom') }}" id="nom" class="form-control" placeholder="Le titre de etablissement">
                                    <!-- Le message d'erreur pour "nom" -->
                                    @error("nom")
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <label for="adresse">Adresse</label>
                                    <input type="text" name="adresse" value="{{ isset($etablissement->adresse) ? $etablissement->adresse : old('adresse') }}" id="adresse" class="form-control" placeholder="Le titre du etablissement">
                                    <!-- Le message d'erreur pour "adresse" -->
                                    @error("adresse")
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <label for="sigle"class="fw-bold">Sigle<i class="text-danger">*</i></label>
                                        <!-- S'il y a un $post->sigle, on complète la valeur de l'input -->
                                        <input type="text" name="sigle" value="{{ isset($etablissement->sigle) ? $etablissement->sigle : old('sigle') }}" id="sigle" class="form-control" placeholder="Le titre du etablissement">
                                        <!-- Le message d'erreur pour "sigle" -->
                                        @error("sigle")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>

                                <div class="col-6">
                                    <label for="telephone"class="fw-bold">Telephone<i class="text-danger">*</i></label>
                                        
                                        <input type="text" name="telephone" value="{{ isset($etablissement->telephone) ? $etablissement->telephone : old('telephone') }}" id="telephone" class="form-control" placeholder="Le titre du etablissement">
                                        @error("telephone")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>

                                <div class="col-6">
                                    <label for="anneecreation"class="fw-bold">Année de creation<i class="text-danger">*</i></label>
                                        
                                        <input type="text" name="anneecreation" value="{{ isset($etablissement->anneecreation) ? $etablissement->anneecreation : old('anneecreation') }}" id="anneecreation" class="form-control">
                                        @error("anneecreation")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>



                                <div class="col-6">
                                    <label for="logo"class="fw-bold">Logo<i class="text-danger">*</i></label>
                                        
                                        <input type="file" name="logo" value="{{ isset($etablissement->logo) ? $etablissement->logo : old('logo') }}" id="logo" class="form-control">
                                        @error("logo")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>        
                    
                                <div class="col-12 pt-3">
                                    <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                                    <a href="{{ route('etablissements.index') }}" class="btn btn-secondary btn-sm">Annuler</a>
                                </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

@endsection
