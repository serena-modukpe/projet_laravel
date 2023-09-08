@extends("backend.layout.mainlayout")

@section("content")


        <div class="card">
            <div class="card-body">
                 <h3 class="card-title">Créer une classe</h3>
                    <div class="card-text">
                        <div class="">
            
                            <form method="POST" action="{{ route('classes.store') }}" class="mt-4">
                                @csrf
                                <div class="row">

                                @if(isset($recordToRestore)) <!-- Vérifier si on restaure un enregistrement existant -->
                                    <input type="hidden" name="id" value="{{ $recordToRestore->id }}">
                                @endif

                                    <div class="col-6">
                                        <label for="sigle"class="fw-bold">Sigle<i class="text-danger">*</i></label>
                                        <input type="text" name="sigle" id="sigle" class="form-control" required>
                                    </div>

                                    <div class="col-6">
                                        <label for="libelle"class="fw-bold">Libellé<i class="text-danger">*</i></label>
                                        <input type="text" name="libelle" id="libelle" class="form-control" required>
                                    </div>
                                
                                
                                    <div class="col-8 pt-3">
                                        <button type="submit" class="btn btn-primary btn-sm">Créer</button>
                                        <a href="{{ route('classes.index') }}" class="btn btn-secondary btn-sm">Annuler</a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  

@endsection
