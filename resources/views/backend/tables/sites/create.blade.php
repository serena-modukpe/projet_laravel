@extends("backend.layout.mainlayout")

@section("content")


    <div class="card">
      <div class="card-body">
            <h3 class="card-title">Créer un site</h3>
            <div class="card-text">
                <div class="">
            
                    <form method="POST" action="{{ route('sites.store') }}" class="mt-4">
                        @csrf
                        <div class="row">
                            
                                <div class="form-group col-4 ">
                                    <label for="nom"class="fw-bold">Nom<i class="text-danger">*</i></label>
                                    <input type="text" name="nom" id="nom" class="form-control" required>
                                </div>
                                
                                
                                <div class="col-4">
                                    <label for="etablissement_id" class="fw-bold">Etablissement<i class="text-danger">*</i></label>
                                    <select name="etablissement_id" id="etablissement_id" class="form-control form-select" required>
                                        <option value="">Etalissement</option>
                                        @foreach ($etablissements as $etablissement)
                                            <option value="{{ $etablissement->id }}"> {{ $etablissement->nom }} </option>
                                        @endforeach
                                    </select>
                                </div>


                                
                                <div class="col-4">
                                    <label for="user_id" class="fw-bold">directeur<i class="text-danger">*</i></label>
                                    <select name="user_id" id="user_id" class="form-control form-select" required>
                                        <option value="">Sélectionnez un directeur</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"> {{ $user->name }} {{ $user->prenom }}</option>
                                        @endforeach
                                    </select>
                                </div>

                         
                            <div class="form-group col-sm-8 mt-3">
                                <button type="submit" class="btn btn-primary btn-sm">Créer</button>
                                <a href="{{ route('sites.index') }}" class="btn btn-secondary btn-sm">Annuler</a>
                            </div>

                        </div>
                    </form>
            </div>
        </div>
        
    </div>

@endsection
