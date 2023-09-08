@extends("backend.layout.mainlayout")

@section("content")

@include('sweetalert::alert')

    <div class="card">
      <div class="card-body">
            <h5 class="card-title">Modifier un élève</h5>
            <div class="">
                <!-- Le formulaire est géré par la route "roles.update" -->
                <form method="POST" action="{{ route('eleves.update', $eleve) }}" enctype="multipart/form-data">
                    <!-- Le token CSRF -->
                    @csrf
                    @method('put')
                    <div class="row">
                       
                        <div class="col-6">
                            <label for="nom"class="fw-bold">Nom<i class="text-danger">*</i></label>
                                <!-- S'il y a un $post->nom, on complète la valeur de l'input -->
                                <input type="text" name="nom" style="text-transform : uppercase;" value="{{ isset($eleve->nom) ? $eleve->nom : old('nom') }}" id="nom" class="form-control" placeholder="Le titre du role">
                                <!-- Le message d'erreur pour "nom" -->
                                @error("nom")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="col-6">
                            <label for="prenom"class="fw-bold">Prénom<i class="text-danger">*</i></label>
                                <!-- S'il y a un $post->prenom, on complète la valeur de l'input -->
                                <input type="text" name="prenom" style="text-transform : capitalize;" value="{{ isset($eleve->prenom) ? $eleve->prenom : old('prenom') }}" id="prenom" class="form-control" placeholder="Le titre du eleve">
                                <!-- Le message d'erreur pour "prenom" -->
                                @error("prenom")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>
                        
                        <div class="col-6">
                            <label for="date_naissance"class="fw-bold">Date de naissance<i class="text-danger">*</i></label>
                                <!-- S'il y a un $post->date_naissance, on complète la valeur de l'input -->
                                <input type="date" name="date_naissance" value="{{ isset($eleve->date_naissance) ? $eleve->date_naissance : old('date_naissance') }}" id="date_naissance" class="form-control" placeholder="Le titre du eleve">
                                <!-- Le message d'erreur pour "date_naissance" -->
                                @error("date_naissance")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="col-6">
                            <label for="telephone"class="fw-bold">Téléphone<i class="text-danger">*</i></label>
                                <!-- S'il y a un $post->telephone, on complète la valeur de l'input -->
                                <input type="number" name="telephone" value="{{ isset($eleve->telephone) ? $eleve->telephone : old('telephone') }}" id="telephone" class="form-control" placeholder="Le titre du eleve">
                                <!-- Le message d'erreur pour "telephone" -->
                                @error("telephone")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="col-12">
                            
                                <!-- S'il y a un $post->numat, on complète la valeur de l'input -->
                                <input type="text" name="numat" value="{{ isset($eleve->numat) ? $eleve->numat : old('numat') }}" id="numat" class="form-control" placeholder="Le titre du eleve" hidden>
                                <!-- Le message d'erreur pour "numat" -->
                                @error("numat")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>
                    
                        <div class="col-4 pt-3">
                            <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                            <a href="{{ route('eleves.index') }}" class="btn btn-secondary btn-sm">Annuler</a>
                        </div>
                    </div>
                </form>
            </div>
@endsection
