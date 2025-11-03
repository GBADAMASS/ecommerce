<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
     <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

     <img src="{{asset('client/image/fille.jpg')}}"/>
  <link rel="stylesheet" href="{{asset('/client/styles/style.css')}}">
    <title>Formulaire de connexion</title>

  </head>

  <body>


    <form action="{{ route('client.login.post') }}" method="post" class="register-form" style="align-items:center; width: 350px; margin: auto; margin-top: 2rem; margin-left: 2rem; padding: 20px; border-radius: 20px; background-color: #cea7a76b;">
        @csrf
        
        <div class="text-center mb-4">
            <h2 style="width: 100%; color: #000000; font-size: xx-large;">Connexion</h2>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session()->get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="form-group mb-3">
            <label for="Email" class="form-label" style="font-size: 14px; margin-bottom: 5px; display: block; color: #000000;">Adresse email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="Email" aria-describedby="emailHelp" placeholder="Entrez votre email" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="Password" class="form-label" style="font-size: 14px; margin-bottom: 5px; display: block; color: #000000;">Mot de passe</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="Password" placeholder="Entrez votre mot de passe" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember" style="color: #000000;">
                    Se souvenir de moi
                </label>
            </div>
        </div>

        <div class="form-group mb-3">
            <p><a href="{{ route('client.register') }}" style="color: #000000;">Créer un compte</a></p>
        </div>

        <button type="submit" name="valider" class="btn btn-primary w-100">Connexion</button>
    </form>

   <script src="./script/script.js"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>


  </body>
</html>
