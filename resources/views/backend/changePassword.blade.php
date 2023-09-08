@extends('backend.layout.mainlayout')
@section('content')

@include('sweetalert::alert')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top: 60px;">
                <div class="card-header" style='text-align:center'> Changer mot de passe</div> </br>
   
                <div class="card-body">
                    <form method="POST" action="{{ route('changepassword.store') }}">
                        @csrf 
   
                         @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                         @endforeach 
  
                        <div class="form-group row">
                            <label for="password" class="col-md-6 col-form-label text-md-right">Ancien mot de passe</label>
  
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                            </div>
                        </div> </br>
  
                        <div class="form-group row">
                            <label for="password" class="col-md-6 col-form-label text-md-right">nouveau mot de passe</label>
  
                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                            </div>
                        </div></br>
  
                        <div class="form-group row">
                            <label for="password" class="col-md-6 col-form-label text-md-right"> Confirmer mot de passe</label>
    
                            <div class="col-md-6">
                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                            </div>
                        </div> </br>
   
                        <div class="form-group row mb-0">
                            <div class="col-md-6 ">
                                <button type="submit" class="btn btn-primary">
                                    Changer mot de passe
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection