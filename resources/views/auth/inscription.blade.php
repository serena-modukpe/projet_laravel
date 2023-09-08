@extends("layouts.app")
<main class="signup-form">
    <div class="container col-8">
        <div class="row justify-content-center" >
            <div class="col-8">
                <div class="card"  style="margin-top: 120px;">
                    <h3 class="card-header text-center">Inscription</h3>
                    <div class="card-body ">
                        <form action="{{ route('register.custom') }}" method="POST">
                            @csrf
                            <div class="form-group col-12 mb-3">
                                <input type="text" placeholder="Nom" id="name" class="form-control" name="name"
                                    required autofocus>
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-12 mb-3">
                                <input type="text" placeholder="Prénom" id="prenom" class="form-control" name="prenom"
                                    required autofocus>
                                @if ($errors->has('prenom'))
                                <span class="text-danger">{{ $errors->first('prenom') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-12 mb-3">
                                <input type="text" placeholder="Email" id="email_address" class="form-control"
                                    name="email" required autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-12 mb-3">
                                <input type="text" placeholder="Téléphone" id="telephone" class="form-control" name="telephone"
                                    required autofocus>
                                @if ($errors->has('telephone'))
                                <span class="text-danger">{{ $errors->first('telephone') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-12 mb-3">
                                <input type="password" placeholder="Mot de passe" id="password" class="form-control"
                                    name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-12 mb-3">
                                <input type="password" placeholder="Confirmer mot de passe" id="password_confirmation" class="form-control"
                                    name="password_confirmation" required>
                                @if ($errors->has('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>
                    
                            <div class="form-group col-12 mb-3">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="remember"> Se souvenir de moi</label>
                                </div>
                            </div>
                            
                            <div class="d-flex bg-grid col-8 mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">S'inscrire</button><a class="btn" href="{{ route('login') }}">Se connecter</a>
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

