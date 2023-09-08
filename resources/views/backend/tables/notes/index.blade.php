@extends("backend.layout.mainlayout")
@section("content")
@include('sweetalert::alert')
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Liste des notes</h5>
        <div class="card-text">
        <h5><a href="{{ route('notes.create') }}" title="Ajouter une note" style="text-decoration: none;">Ajouter une note<i class="bi bi-file-plus-fill"></i></a></h5>
        <div class="row table-responsive">
                <table class="table table-bordered">
                    <thead class="text-black ">
                        <tr>
                                <th scope="cop" class="text-center">N°</th>
                                <th scope="cop" class="text-center">Elèves</th>
                                <th scope="cop" class="text-center">Matières</th>
                                <th scope="cop" class="text-center">Note1</th>
                                <th scope="cop" class="text-center">Note2</th>
                                <th scope="cop" class="text-center">Note3</th>
                                <th scope="cop" class="text-center">Devoir1</th>
                                <th scope="cop" class="text-center">Devoir2</th>
                                <th scope="cop" class="text-center">Devoir3</th>
                                <th scope="cop" class="text-center">Moyenne des interrogations</th>
                                <th scope="cop" class="text-center">Moyenne des devoirs</th>
                                <th scope="cop" class="text-center">Moyenne</th>
                                <th scope="cop" class="text-center">created_by</th>
                                
                                @if(Auth::user()->getrole->id == 1)
                                <th scope="cop" class="text-center">Statut</th>
                                @else
                                @endif
                                <th scope="cop" class="text-center">Date de modification</th>
                                <th scope="cop" class="text-center" >Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notes as $note)
                        <tr>

                            <td class="text-center">
                                
                                {{ $loop->iteration }}
                            </td>

                            <td class="text-center">
                                
                                {{ $note->getclasseeleve->geteleve->nom }}
                            </td>


                            <td class="text-center">
                                
                                {{ $note->getmatiere->libelle }}
                            </td>

                            <td class="text-center">
                                
                                {{ $note->note1 }}
                            </td>

                            <td class="text-center">
                                
                                {{ $note->note2 }}
                            </td>

                            <td class="text-center">
                                
                                {{ $note->note3 }}
                            </td>

                            <td class="text-center">
                                
                                {{ $note->devoir1 }}
                            </td>

                            <td class="text-center">
                                
                                {{ $note->devoir2 }}
                            </td>

                            <td class="text-center">
                                
                                {{ $note->devoir3 }}
                            </td>

                            <td class="text-center">
                                
                                {{ $note->moyeninterro }}
                            </td>

                            <td class="text-center">
                                
                                {{ $note->moyendevoir }}
                            </td>

                            <td class="text-center">
                                
                                {{ $note->moyenne }}
                            </td>

                            
                            <td class="text-center">
                                
                                {{ $note->getcreatedBy->name }}
                            </td>

                            @if(Auth::user()->getrole->id == 1)
                            <td class="text-center">
                                {{ $note->getstatut->libelle }}
                            </td>

                                @else
                                @endif
                            
                            <td class="text-center">
                                 {{ $note->updated_at->format('d-m-Y')}}
                            </td>
   
                            
                            

                            <td class="text-center">
                                        <a class="btn bg-success text-white " href="{{ route('notes.edit', $note) }}" title="Modifier un rôle"><i class="bi bi-pencil-square"></i></a>
                                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $note->id }}"><i class="bi bi-trash" title="Supprimer"></i></a>

                                        <div class="modal fade" id="exampleModal_{{ $note->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Voulez-vous vraiment supprimer cet enregistrement ?</p>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                            <form method="POST" action="{{ route('notes.destroy', $note->id) }}" style="display: inline;">
                                            <!-- CSRF token -->
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger">
                                                 <i class="bi bi-trash"></i> 
                                            </button>

                                            
                                        </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>

                                        
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection