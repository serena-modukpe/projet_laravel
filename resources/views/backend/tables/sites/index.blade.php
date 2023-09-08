@extends("backend.layout.mainlayout")

@section("content")



@include('sweetalert::alert')
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Liste des sites</h5>
        <div class="card-text">
        <h5><a href="{{ route('sites.create') }}" title="Ajouter un site" style="text-decoration: none;">Ajouter un site<i class="bi bi-file-plus-fill"></i></a></h5>
        <div class="row table-responsive">
                <table class="table table-bordered">
                    <thead class="text-black ">
                        <tr>
                                <th scope="cop" class="text-center">Id</th>
                                <th scope="cop" class="text-center">Noms des sites</th>
                                
                                <th scope="cop" class="text-center">Etablissements</th>
                                <th scope="cop" class="text-center">Directeur</th>
                                @if(Auth::user()->getrole->id == 1)
                                <th scope="cop" class="text-center">Statut</th>
                                @else
                                @endif
                                <th scope="cop" class="text-center">Date de modification</th>
                                <th scope="cop" class="text-center" >Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sites as $site)
                        <tr>

                             <td class="text-center">
                                
                                {{ $loop->iteration }}
                            </td>

                            <td class="text-center">
                                
                                {{ $site->nom }}
                            </td>

                            
                            <td class="text-center">
                                {{ $site->getetablissement->nom }} 
                            </td>
                            <td class="text-center">
                                {{ $site->getuser->name }} 
                            </td>


                            @if(Auth::user()->getrole->id == 1) 
                            <td class="text-center">
                                {{ $site->getstatut->libelle }} 
                            </td>
                                @else
                                @endif
                            <td class="text-center">
                                 {{ $site->updated_at->format('d-m-Y')}}
                            </td>

                            

                            <td class="text-center">
                                        <a class="btn bg-success text-white " href="{{ route('sites.edit', $site) }}" title="Modifier un rôle"><i class="bi bi-pencil-square"></i></a>
                                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $site->id }}"><i class="bi bi-trash" title="Supprimer"></i></a>

                                        <div class="modal fade" id="exampleModal_{{ $site->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <form method="POST" action="{{ route('sites.destroy', $site) }}" style="display: inline;">
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