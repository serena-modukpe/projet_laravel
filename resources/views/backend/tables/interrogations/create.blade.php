@extends("backend.layout.mainlayout")

@section("content")

    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Ajouter une note</h3>
        <div class="card-text">
            <div class="">
            
                <form method="POST" action="{{ route('interrogations.store') }}" class="mt-4">
                    @csrf

                <div class="row">

                        <div class="col-6">
                        <label for="note1"class=" fw-bold form-label ">Elève <i class="text-danger">*</i></label>
                                <select name="classeeleve_id" id="classeeleve_id" class="form-control form-select" required>
                                    <option value="">Sélectionnez un élève</option>
                                    @foreach ($classeeleves as $classeeleve)
                                        <option value="{{ $classeeleve->id }}"> {{ $classeeleve->geteleve->nom }} {{ $classeeleve->geteleve->prenom }}</option>
                                    @endforeach
                                </select>
                        </div>

                        <div class="col-6">
                        <label for="matiere_id"class=" fw-bold form-label ">Matières <i class="text-danger">*</i></label>
                            <select name="matiere_id" id="matiere_id" class="form-control form-select" required>
                                <label for="matiere_id" class=" fw-bold form-label  ">Sélectionné une matière<i class="text-danger">*</i></label>
                                <option value="">Sélectionnez un matière</option>
                                @foreach ($matieres as $matiere)
                                    <option value="{{ $matiere->id }}"> {{ $matiere->libelle }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-6 pt-2">
                            <label for="note"class=" fw-bold form-label ">Note <i class="text-danger">*</i></label>
                            <input type="text" name="note" id="note" class="form-control" required>
                        </div>

                        

                        @if(Auth::check())
                        <div class="col-4">
                                    <label for="createdBy" class="fw-bold">Created_by<i class="text-danger">*</i></label>
                                    <input type="text" name="createdBy" id="createdBy" class="form-control"  value="{{ Auth::user()->name }} {{ Auth::user()->prenom }}"required>
                        </div>
                        @endif

                        <div class="col-4 pt-5">
                            <button type="submit" class="btn btn-primary btn-sm">Créer</button>
                            <a href="{{ route('interrogations.index') }}" class="btn btn-secondary btn-sm">Annuler</a>
                        </div>
                
                    </div>
                    
                   
                </form>
            </div>
        </div>
</div>

@endsection
