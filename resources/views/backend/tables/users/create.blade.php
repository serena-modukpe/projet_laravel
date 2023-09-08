@extends("backend.layout.mainlayout")

@section("content")

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Créer un utilisateur</h3>
        <div class="card-text">
            <div class="">
            
                <form method="POST" action="{{ route('users.store') }}" class="mt-4">
                    @csrf
                    <div class="row">
                     <div class="col-6">
                        <label for="name"class="fw-bold">Nom<i class="text-danger">*</i></label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="col-6">
                        <label for="prenom" class="fw-bold">Prenom<i class="text-danger">*</i></label>
                        <input type="text" name="prenom" id="prenom" class="form-control" rows="3" required></textarea>
                    </div>

                     <div class="col-6">
                        <label for="telephone" class="fw-bold">Telephone<i class="text-danger">*</i></label>
                        <input type="number" name="telephone" id="telephone" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="col-6">
                        <label for="email" class="fw-bold">Email<i class="text-danger">*</i></label>
                        <input type="email" name="email" id="email" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="col-6">
                        <label for="password" class="fw-bold">Mot de passe<i class="text-danger">*</i></label>
                        <input type="password" name="password" id="password" class="form-control" rows="3" required></textarea>
                    </div>

                    

                    
                    <div class="col-6">
                    <label for="role_id" class="fw-bold">Utilisateur<i class="text-danger">*</i></label>
                        <select name="role_id" id="role_id" class="form-control form-select" required>
                            <option value="">Sélectionnez un roles</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}"> {{ $role->libelle }} </option>
                            @endforeach
                        </select>
                    </div>
                    </div>


                    <div class="col-sm-8 mt-3">
                        <button type="submit" class="btn btn-primary btn-sm">Créer</button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
        
      </div>
    </div>
</div>

@endsection
