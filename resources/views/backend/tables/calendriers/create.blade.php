@extends("backend.layout.mainlayout")

@section("content")

    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Créer une classe et elève</h3>
        <div class="card-text">
            <div class="">
            
                <form method="POST" action="{{ route('calendriers.store') }}" class="mt-4">
                    @csrf

                <div class="row">

                    <div class="col-6">
                        <label for="type_devoir" class="fw-bold">Type du devoir<i class="text-danger">*</i></label>
                        <input type="text" name="type_devoir" id="type_devoir" class="form-control"required>
                    </div>

                    <div class="col-6">
                        <label for="matiere_id"class="fw-bold">Matière<i class="text-danger">*</i></label>
                        <select name="matiere_id" id="matiere_id" class="form-control form-select" required>
                            <option value="">Sélectionnez une matière</option>
                            @foreach ($matieres as $matiere)
                                <option value="{{ $matiere->id }}"> {{ $matiere->libelle }} </option>
                            @endforeach
                        </select>
                    </div>

                        
                    
                    <div class="col-6">
                        <label for="classesite_id"class="fw-bold">Classes et sites<i class="text-danger">*</i></label>
                        <select name="classesite_id" id="classesite_id" class="form-control form-select" required>
                            <option value="">Sélectionnez une classe et le site</option>
                            @foreach ($classesites as $classesite)
                                <option value="{{ $classesite->id }}"> {{ $classesite->getclasse->sigle }} {{ $classesite->getsite->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class=" col-6 ">
                            <label for="date_debut"class="fw-bold">Date début <i class="text-danger">*</i></label>
                            <input type="datetime-local"  name="date_debut" id="date_debut"  max="{{ date('d-m-Y') }}" class="form-control" required>
                    </div>
                        
                    <div class=" col-6 ">
                            <label for="date_fin"class="fw-bold">Date fin <i class="text-danger">*</i></label>
                            <input type="datetime-local"  name="date_fin" id="date_fin"  max="{{ date('d-m-Y') }}" class="form-control" required>
                    </div>

                    @if(Auth::check())
                        <div class="col-6">
                                    
                                    <input type="text" name="createdBy" id="createdBy" class="form-control"  value="{{ Auth::user()->name }}"required hidden>
                        </div>
                        @endif

                    
                        <div class="col-12 pt-3">
                            <button type="submit" class="btn btn-primary btn-sm">Créer</button>
                            <a href="{{ route('calendriers.index') }}" class="btn btn-secondary btn-sm">Annuler</a>
                        </div>
                
                
                
                   
                </form>
            </div>
        </div>
</div>

@endsection
