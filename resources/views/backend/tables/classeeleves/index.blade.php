@extends("backend.layout.mainlayout")

@section("content")

@include('sweetalert::alert')

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Liste des classes</h5>
        <div class="card-text">
        <h5><a href="{{ route('classeeleves.create') }}"  style="text-decoration: none;">Ajouter une classe et son élève<i class="bi bi-file-plus-fill"></i></a></h5>
        <div class="row table-responsive">
                <table class="table table-bordered">
                    <thead class="text-black ">
                        <tr>
                                <th scope="cop" class="text-center">N°</th>
                                <th scope="cop" class="text-center">Eleves</th>
                                <th scope="cop" class="text-center">Classes</th>
                                <th scope="cop" class="text-center">Sites</th>
                                <th scope="cop" class="text-center">Année</th>
                                @if(Auth::user()->getrole->id == 1)
                                <th scope="cop" class="text-center">Statut</th>
                                @else
                                @endif
                                <th scope="cop" class="text-center">Date de modification</th>
                                <th scope="cop" class="text-center">Actions</th>
                                
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classeeleves as $classeeleve)
                        <tr>

                            <td class="text-center">
                                
                                {{ $loop->iteration }}
                            </td>

                            <td class="text-center">
                                {{ $classeeleve->geteleve->nom }}   {{ $classeeleve->geteleve->prenom }}
                            </td>

                            <td class="text-center">
                                {{ $classeeleve->getclassesite->getclasse->sigle}}
                            </td>

                            <td class="text-center">
                                {{ $classeeleve->getclassesite->getsite->nom}}
                            </td>

                            

                            <td class="text-center">
                                {{ $classeeleve->annees }}
                            </td>

                            @if(Auth::user()->getrole->id == 1)
                            <td class="text-center">
                                {{ $classeeleve->getstatut->libelle }}
                            </td>
                            @else
                            @endif

                            <td class="text-center">
                                {{ $classeeleve->updated_at->format('d-m-Y')}}
                            </td>

                            <td class="text-center">
                            <div class="d-inline">
                                <a class="btn bg-success btn-sm text-white " href="{{ route('classeeleves.edit', $classeeleve) }}" title="Modifier une classe"><i class="bi bi-pencil-square"></i></a>
                                <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $classeeleve->id }}"><i class="bi bi-trash" title="Supprimer"></i></a>

                                <div class="modal fade" id="exampleModal_{{ $classeeleve->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Fermer</button>
                                            <form action="{{ route('classeeleves.destroy', $classeeleve->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
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
