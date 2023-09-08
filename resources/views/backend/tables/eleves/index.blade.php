@extends("backend.layout.mainlayout")

@section("content")

@include('sweetalert::alert')
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Liste des elèves</h5>
        <div class="card-text">
        <h5><a href="{{ route('eleves.create') }}" title="Ajouter un élève" style="text-decoration: none;">Ajouter un élève<i class="bi bi-file-plus-fill"></i></a></h5>
        <div class="row table-responsive">
                <table class="table table-bordered " id="table-eleves">
                    <thead class="text-black ">
                    
                    <style>
                   
                    </style>

                        <table class=table-bordered >
                        <tr>
                            <th scope="col" class="text-center"   rowspan="2">N°</th>
                            <th scope="col" class="text-center"  rowspan="2">Numéro matricule</th>
                            <th scope="col" class="text-center"  colspan="2">Elève</th>
                            <th scope="col" class="text-center" rowspan="2">Date de naissance</th>
                            <th scope="col" class="text-center" rowspan="2">Téléphones</th>
                            @if(Auth::user()->getrole->id == 1)
                            <th scope="col" class="text-center"rowspan="2">Statut</th>
                            @endif
                            <th scope="col" class="text-center"rowspan="2">Date de modification</th>
                            <th scope="col" class="text-center"rowspan="2">Actions</th>
                        </tr>
                        <tr>
                            <th scope="col" class="text-center">Noms</th>
                            <th scope="col" class="text-center">Prénoms</th>
                        </tr>
                        <tbody>
                        @foreach ($eleves as $eleve)
                        <tr>

                            <td class="text-center">
                                
                                {{ $loop->iteration }}
                            </td>

                            <td class="text-center">
                                
                                {{ $eleve->numat }}
                            </td>

                            <td class="text-center">
                                
                                {{ $eleve->nom }}
                            </td>

                            <td class="text-center">
                                
                                {{ $eleve->prenom }}
                            </td>

                            <td class="text-center">
                                
                                {{ $eleve->date_naissance }}
                            </td>

                            <td class="text-center">
                                
                                {{ $eleve->telephone }}
                            </td>

                            
                            @if(Auth::user()->getrole->id == 1)
                            <td class="text-center">
                                {{ $eleve->getstatut->libelle }}
                            </td>

                                @else
                                @endif
                            
                            <td class="text-center">
                                 {{ $eleve->updated_at->format('d-m-Y')}}
                            </td>
   
                            
                            

                            <td class="text-center">
                                        <!-- ... Le contenu actuel de la vue index ... -->
                                        

                                        <a class="btn bg-success text-white " href="{{ route('eleves.edit', $eleve) }}" title="Modifier un rôle"><i class="bi bi-pencil-square"></i></a>
                                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $eleve->id }}"><i class="bi bi-trash" title="Supprimer"></i></a>

                                        <div class="modal fade" id="exampleModal_{{ $eleve->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <form method="POST" action="{{ route('eleves.destroy', $eleve->id) }}" style="display: inline;">
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

<script type="text/javascript">
  $(function () {
      
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('eleves.index') }}",
        columns: [
            {data: 'Numero', name: 'numat'},
            {data: 'nom', name: 'nom'},
            {data: 'prenom', name: 'prenom'},
            {data: 'date de naissance', name: 'date_naissance'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
      
  });
</script>
@endsection