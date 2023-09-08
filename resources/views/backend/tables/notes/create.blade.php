@extends("backend.layout.mainlayout")

@section("content")

    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Ajouter une note</h3>
        <div class="card-text">
            <div class="">
            
                <form method="POST" action="{{ route('notes.store') }}" class="mt-4">
                    @csrf

                <div class="row">

                        <div class="col-6">
                        <label for="note1"class=" fw-bold form-label ">Elève <i class="text-danger">*</i></label>
                                <select name="classeeleve_id" id="classeeleve_id" class="form-control form-select" required>
                                    <option value="">Sélectionnez un élève</option>
                                    @foreach ($classeeleves as $classeeleve)
                                        <option value="{{ $classeeleve->id }}"> {{ $classeeleve->geteleve->nom }} </option>
                                    @endforeach
                                </select>
                        </div>

                        <div class="col-6">
                        <label for="note1"class=" fw-bold form-label ">Matières <i class="text-danger">*</i></label>
                            <select name="matiere_id" id="matiere_id" class="form-control form-select" required>
                                <label for="matiere_id" class=" fw-bold form-label  ">Sélectionné une matière<i class="text-danger">*</i></label>
                                <option value="">Sélectionnez un matière</option>
                                @foreach ($matieres as $matiere)
                                    <option value="{{ $matiere->id }}"> {{ $matiere->libelle }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-6 pt-2">
                            <label for="note1"class=" fw-bold form-label ">Note1 <i class="text-danger">*</i></label>
                            <input type="text" name="note1" id="note1" class="form-control" required>
                        </div>

                        <div class="col-6 pt-2">
                            <label for="note2"class=" fw-bold form-label ">Note2 <i class="text-danger">*</i></label>
                            <input type="text" name="note2" id="note2" class="form-control" required>
                        </div>

                        <div class="col-6 pt-2">
                            <label for="note3"class=" fw-bold form-label ">Note3 <i class="text-danger">*</i></label>
                            <input type="text" name="note3" id="note3" class="form-control" required>
                        </div>

                        <div class="col-6 pt-2">
                            <label for="devoir1"class=" fw-bold form-label ">Devoir1 <i class="text-danger">*</i></label>
                            <input type="text" name="devoir1" id="devoir1" class="form-control" required>
                        </div>

                        <div class="col-6 pt-2">
                            <label for="devoir2"class=" fw-bold form-label ">Devoir2 <i class="text-danger">*</i></label>
                            <input type="text" name="devoir2" id="devoir2" class="form-control" required>
                        </div>

                        <div class="col-6 pt-2">
                            <label for="devoir3"class=" fw-bold form-label ">Devoir3</label>
                            <input type="text" name="devoir3" id="devoir3" class="form-control" >
                        </div>

                        <div class="col-6 pt-2">
                            <label for="moyeninterro"class=" fw-bold form-label ">Moyenne des interrogations <i class="text-danger">*</i></label>
                            <input type="text" name="moyeninterro" id="moyeninterro" class="form-control" required>
                        </div>

                        <div class="col-6 pt-2">
                            <label for="moyendevoir"class=" fw-bold form-label ">Moyenne des devoirs <i class="text-danger">*</i></label>
                            <input type="text" name="moyendevoir" id="moyendevoir" class="form-control" required>
                        </div>

                        

                        <div class="col-6 pt-2">
                            <label for="moyenne"class=" fw-bold form-label ">Moyenne générale <i class="text-danger">*</i></label>
                            <input type="text" name="moyenne" id="moyenne" class="form-control" required>
                        </div>

                        @if(Auth::check())
                        <div class="col-6 pt-2">
                                    <label for="createdBy" class="fw-bold">Created_by<i class="text-danger">*</i></label>
                                    <input type="text" name="createdBy" id="createdBy" class="form-control"  value="{{ Auth::user()->name }}"required>
                        </div>
                        @endif

                        <div class="col-4 pt-5">
                            <button type="submit" class="btn btn-primary btn-sm">Créer</button>
                            <a href="{{ route('notes.index') }}" class="btn btn-secondary btn-sm">Annuler</a>
                        </div>
                
                    </div>
                    
                   
                </form>
            </div>
        </div>
</div>

@endsection
