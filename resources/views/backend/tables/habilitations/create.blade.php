@extends("backend.layout.mainlayout")

@section("content")

<div class="card">
    <div class="card-body">
        <h3 class="card-title">Créer une habilitation</h3>
        <div class="card-text">
            <div class="">

                <form method="POST" action="{{ route('habilitations.store') }}" class="mt-4">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="role_id" class="form-label fw-bold">Rôles<span class="text-danger">*</span></label>
                            <select name="role_id" id="role_id" class="form-select" required>
                                <option value="">Sélectionnez un rôle</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->libelle }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mt-4">
                        <label for="role_id" class=" fw-bold">Droit<span class="text-danger">*</span></label></br>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" name="create" id="create" class="form-check-input">
                                <label for="create" class="form-check-label fw-bold">Créer</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" name="read" id="read" class="form-check-input">
                                <label for="read" class="form-check-label fw-bold">Lire</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" name="update" id="update" class="form-check-input">
                                <label for="update" class="form-check-label fw-bold">Modifier</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" name="delete" id="delete" class="form-check-input">
                                <label for="delete" class="form-check-label fw-bold">Supprimer</label>
                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="description" class="form-label fw-bold">Description<span class="text-danger">*</span></label>
                            <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="col-md-12 mt-3">
                            <button type="submit" class="btn btn-primary btn-sm">Créer</button>
                            <a href="{{ route('habilitations.index') }}" class="btn btn-secondary btn-sm">Annuler</a>
                        </div>

                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

@endsection
