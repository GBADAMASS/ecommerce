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


    <form method="post" class="register-form" style=" align-item:center; width: 350px; margin: auto;  margin-top: 2rem; margin-left: 2rem;  padding: 20px; border-radius: 20px; background-color: #cea7a76b;">
        @csrf
    <div class="text-center mb-4">
        <h2 style="width: 100%; color: #000000; font-size: xx-large; ">Connexion</h2>
      </div>
  <div class="form-group ">
    <label for="Email" class="form-label" style="font-size: 14px;margin-bottom: 5px;display: block;color: #000000;">Adresse email</label>
    <input type="email" name="email" class="form-control" id="Email" aria-describedby="emailHelp" placeholder="Entrez votre email">
  </div>
  <div class="form-group ">
    <label for="Password" class="form-label" style="font-size: 14px;margin-bottom: 5px;display: block;color: #000000;">Mot de passe</label>
    <input type="password" name="password" class="form-control" id="Password" placeholder="Entrez votre mot de passe" style="font-size: 14px;margin-bottom: 5px;display: block;color: #000000;">
  </div>

  <div class="form-group ">
   <P> <a href="{{route('client.register')}}">créer un compte</a></P>
    </div>

  </div>

  <button type="submit" name="valider" style.display = 'none'; class="btn btn-primary">Connexion</button>
</form>

   <script src="./script/script.js"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>


  </body>
</html>
