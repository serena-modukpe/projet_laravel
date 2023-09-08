@extends("backend.layout.mainlayout")
@section("content")
@include('sweetalert::alert')
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Liste des calendriers</h5>
        <div class="card-text">
        @if(Auth::user()->getrole->id == 1)
        <h5><a href="{{ route('calendriers.create') }}" title="Ajouter une calendrier" style="text-decoration: none;">Ajouter un calendrier<i class="bi bi-file-plus-fill"></i></a></h5>
        @else
        @endif
        <div class="row table-responsive">
                <table class="table table-bordered">
                    <thead class="text-black ">
                        <tr>
                                <th scope="cop" class="text-center">N°</th>
                                <th scope="cop" class="text-center">Type du devoir</th>
                                <th scope="cop" class="text-center">Matières</th>
                                <th scope="cop" class="text-center">Classes</th>
                                <th scope="cop" class="text-center">site</th>
                                <th scope="cop" class="text-center">Date de début</th>
                                <th scope="cop" class="text-center">Date de fin</th>
                                <th scope="cop" class="text-center">Créé par</th>
                                
                                @if(Auth::user()->getrole->id != 1 && Auth::user()->getrole->id != 2)
                                <th scope="cop" class="text-center">Statut</th>
                                @else
                                
                                <th scope="cop" class="text-center">Statut</th>
                                <th scope="cop" class="text-center">Date de modification</th>
                                <th scope="cop" class="text-center" >Actions</th>
                                @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($calendriers as $calendrier)
                        <tr>

                            <td class="text-center">
                                
                                {{ $loop->iteration }}
                            </td>

                            <td class="text-center">
                                
                                {{ $calendrier->type_devoir }}
                            </td>

                            <td class="text-center">
                                
                                {{ $calendrier->getmatiere->libelle }}
                            </td>

                            <td class="text-center">
                                
                                {{ $calendrier->getclassesite->getclasse->sigle }}
                            </td>


                            <td class="text-center">
                                
                                {{ $calendrier->getclassesite->getsite->nom }}
                            </td>

                            <td class="text-center">
                                
                                {{ $calendrier->date_debut }}
                            </td>

                            <td class="text-center">
                                
                                {{ $calendrier->date_fin }}
                            </td>

                            <td class="text-center">
                                
                                {{ $calendrier->getcreatedBy->name }}
                            </td>

                            
                            <td class="text-center">
                                {{ $calendrier->getstatut->libelle }}
                            </td>
                            
                            @if(Auth::user()->getrole->id == 1)
                            <td class="text-center">
                                 {{ $calendrier->updated_at->format('d-m-Y')}}
                            </td>
                                @else
                                @endif
                            
                           
   
                            
                            @if(Auth::user()->getrole->id == 1)

                            <td class="text-center">
                                        <a class="btn bg-success text-white " href="{{ route('calendriers.edit', $calendrier) }}" title="Modifier un rôle"><i class="bi bi-pencil-square"></i></a>
                                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $calendrier->id }}"><i class="bi bi-trash" title="Supprimer"></i></a>

                                        <div class="modal fade" id="exampleModal_{{ $calendrier->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <form method="POST" action="{{ route('calendriers.destroy', $calendrier->id) }}" style="display: inline;">
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
                            @else
                            @endif
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