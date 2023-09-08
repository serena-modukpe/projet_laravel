@extends("backend.layout.mainlayout")

@section("content")

@include('sweetalert::alert')

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Liste des matières</h5>
        <div class="card-text">
          <h5><a href="{{ route('etablissements.create') }}" title="Ajouter un établissement" style="text-decoration: none;">Ajouter un établissement<i class="bi bi-file-plus-fill"></i></a></h5>
          <div class="row table-responsive">
            <table class="table table-bordered">
              <thead class="text-black ">
                <tr>
                  <th scope="col" class="text-center">N°</th>
                  <th scope="col" class="text-center">Sigle</th>
                  <th scope="col" class="text-center">Nom</th>
                  <th scope="col" class="text-center">Adresse</th>
                  <th scope="col" class="text-center">Année de création</th>
                  <th scope="col" class="text-center">Logo</th>
                  <th scope="col" class="text-center">Téléphone</th>
                  @if(Auth::user()->getrole->id == 1)
                  <th scope="cop" class="text-center">Statut</th>
                  @else
                  @endif
                  <th scope="col" class="text-center">Date de modification</th>
                  <th scope="col" class="text-center">Actions</th>
                </tr>
              </thead>
              
              <tbody>
                @foreach ($etablissements as $etablissement)
                <tr>
                  <td class="text-center">
                    {{ $loop->iteration }}
                  </td>

                  <td class="text-center">
                    {{ $etablissement->sigle }}
                  </td>

                  <td class="text-center">
                    {{ $etablissement->nom }}
                  </td>

                  <td class="text-center">
                    {{ $etablissement->adresse }}
                  </td>

                  <td class="text-center">
                    {{ $etablissement->anneecreation }}
                  </td>

                  <td class="text-center">
                    <img src="{{ asset('storage/etablissements/'.$etablissement->logo) }}" alt="Logo {{ $etablissement->nom }}" width="50" height="50">
                  </td>

                  <td class="text-center">
                    {{ $etablissement->telephone }}
                  </td>


                  @if(Auth::user()->getrole->id == 1)
                  <td class="text-center">
                    {{ $etablissement->getstatut->libelle  }}
                  </td>
                  @else
                  @endif

                  <td class="text-center">
                      {{ $etablissement->updated_at->format('d-m-Y')}}
                  </td>

                  <td class="text-center">
                    <a class="btn bg-success text-white" href="{{ route('etablissements.edit', $etablissement) }}" title="Modifier un rôle"><i class="bi bi-pencil-square"></i></a>
                    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $etablissement->id }}"><i class="bi bi-trash" title="Supprimer"></i></a>

                                <div class="modal fade" id="exampleModal_{{ $etablissement->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <form action="{{ route('etablissements.destroy', $etablissement->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>

                                @endforeach
                            </tbody>
                            </table>
                        </div>
                        </div>
      </div>
    </div>
  </div>
</div>

@endsection
