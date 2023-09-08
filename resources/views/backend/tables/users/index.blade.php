@extends("backend.layout.mainlayout")

@section("content")

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Liste des utilisateurs</h5>
        <div class="card-text">
        <h5><a href="{{ route('users.create') }}"  style="text-decoration: none;">Ajouter un users<i class="bi bi-file-plus-fill"></i></a></h5>
        <div class="row table-responsive">
                <table class="table table-bordered">
                    <thead class="text-black ">
                        <tr>
                                <th scope="cop" class="text-center">N°</th>
                                <th scope="cop" class="text-center">Nom</th>
                                <th scope="cop" class="text-center">Prenoms</th>
                                <th scope="cop" class="text-center">Email</th>
                                <th scope="cop" class="text-center">Telephone</th>
                                <th scope="cop" class="text-center">Role</th>
                               
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>

                            <td class="text-center">
                                
                                {{ $loop->iteration }}
                            </td>
                            
                            <td class="text-center">
                                {{ $user->name }}
                            </td>

                            <td class="text-center">
                                {{ $user->prenom}}
                            </td>

                            <td class="text-center">
                                {{ $user->email}}
                            </td>

                            <td class="text-center">
                                {{ $user->telephone}}
                            </td>

                            <td class="text-center">
                                {{ $user->getrole->libelle }}
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