@extends("layouts.app")

@section("content")
<main class="login-form">
    <div class="container col-8">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card "style="margin-top: 120px; align-items:center;">
                    <h3 class="card-header text-center">Se connecter</h3>
                    <div class="card-body ">
                        <form method="POST" action="{{ route('login.custom') }}">
                            @csrf
                            <div class="form-group col-12 mb-3">
                                <input type="text" placeholder="Votre email" id="email" class="form-control" name="email" required
                                    autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group  col-12 mb-3">
                                <input type="password" placeholder="Mot de passe" id="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            
                            <div class="form-group  col-12 mb-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Se souvenir de moi
                                    </label>
                                </div>
                            </div>
                            <div class="d-flex bg-grid col-12">
                                <div class="form-group mr-3">
                                    <button type="submit" class="btn btn-dark btn-block">Se connecter</button>
                                </div>
                                <div class="form-group d-flex ">
                                    <h6>vous n'avez pas de compte? <a href="{{ route('register-user') }}">
                                    S'inscrire
                                    </a></h6>
                                   
                                </div>
                            </div>
                                  
                                    
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</main>


@if ($errors->has('auth'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Erreur de connexion',
            text: '{{ $errors->first('auth') }}',
        });
    </script>
@endif


@endsection
