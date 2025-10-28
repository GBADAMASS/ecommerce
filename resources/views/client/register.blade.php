
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
     <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link rel="stylesheet" href="style.css">
    <title>Formulaire d'inscription</title>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
  </head>

  <body style="background: url(./image/3d-illustration-smartphone-with-delivery-scooter-boxes-paper-bags.jpg) no-repeat center center fixed; background-size: cover;">

<form method="post" class="register-form">
    @csrf
  <h2 >Créer un compte</h2>
  <div  class="form-group " >
     <label for="nom">Nom</label>
     <input type="text" name="nom" id="Nom" placeholder="Entrez votre nom complet">
  </div>
  <div  class="form-group ">
     <label for="telephone">Téléphone</label>
     <input type="text" name="telephone" id="telephone" placeholder="Entrez votre numéro">
  </div>

  <div  class="form-group ">
     <label for="email">Adresse email</label>
     <input type="email" name="email" id="Email" placeholder="Entrez votre email">
  </div>
  <div   class="form-group ">
     <label for="Password">Mot de passe</label>
     <input type="password" name="password" id="Password" placeholder="Entrez votre mot de passe">
  </div>
  <div style="margin-bottom: 18px;">
     <label for="ConfirmPassword">Confirmer le mot de passe</label>
     <input type="password" id="ConfirmPassword" placeholder="Confirmez votre mot de passe">
  </div>
    <button type="submit" name="submit">S'inscrire</button>
    <div class="register-links">
     <a href="#">mot de passe oublié ?</a>
     <a href="login.html">Connexion</a>
    </div>
  </form>
</form>



  </body>
</html>
