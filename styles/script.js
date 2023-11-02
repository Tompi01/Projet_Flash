function passwordCheck() {
    var password = document.getElementById("password").value;
    var easy = document.getElementById("easy");
    var medium = document.getElementById("medium");
    var difficult = document.getElementById("difficult");
    var hardDifficult = document.getElementById("hardDifficult");
  
    var strength = 0;
    var tips = "";
  
    if (password.length < 8) {
      tips += "Mot de passe pas assez long.";
    } else {
      strength += 1;
    }
  
    if (password.match(/[a-z]/) && password.match(/[A-Z]/)) {
      strength += 1;
    } else {
      tips += "Une majuscule et une minuscule ";
    }
  
    if (password.match(/\d/)) {
      strength += 1;
    } else {
      tips += "Au moins un nombre. ";
    }
  
    if (password.match(/[^a-zA-Z\d]/)) {
      strength += 1;
    } else {
      tips += "Inclus un charactère spécial. ";
    }
  
    if 
    (strength === 3) {
      document.getElementById("medium").innerHTML='';
      document.getElementById("easy").innerHTML='';
      document.getElementById("hardDifficult").innerHTML='';
      difficult.textContent = "Mot de passe difficile " + tips;
      difficult.style.color = "orange";
  } else if 
  (strength === 2) {
      document.getElementById("easy").innerHTML='';
      document.getElementById("hardDifficult").innerHTML='';
      document.getElementById("difficult").innerHTML='';
      medium.textContent = "Mot de passe moyen. " + tips;
      medium.style.color = "yellow";
    } else if (strength < 2) {
      document.getElementById("hardDifficult").innerHTML='';
      document.getElementById("difficult").innerHTML='';
      document.getElementById("medium").innerHTML='';
      easy.textContent = "Mot de passe facile " + tips;
      easy.style.color = "red";
    } else {
      document.getElementById("difficult").innerHTML='';
      document.getElementById("medium").innerHTML='';
      document.getElementById("easy").innerHTML='';
      hardDifficult.textContent = "Mot de passe très difficile. " + tips;
      hardDifficult.style.color = "green";
    }
  }