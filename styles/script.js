
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

const levelSelect = document.getElementById("levelSelect");
const themeSelect = document.getElementById("themeSelect");
const generateGridButton = document.getElementById("generateGrid");
const gridContainer = document.getElementById("memoryGrid");

const cardFaces = {
  Pokemon: {},
  ClashRoyale: {},
  Default: {},
};

for (let i = 1; i <= 72; i++) {
  cardFaces.Pokemon[i] = `Pokemon${i}.webp`;
  cardFaces.ClashRoyale[i] = `ClashRoyale${i}.webp`;
  cardFaces.Default[i] = `Default${i}.webp`;
}

const gridSizeOptions = {
  4: {
    rows: 4,
    cols: 4,
  },
  8: {
    rows: 8,
    cols: 8,
  },
  12: {
    rows: 12,
    cols: 12,
  },
};

let firstCard = null;
let secondCard = null;
let pairsFound = 0;
let canFlip = true; 
let flippedCards = 0; 

let backImage = ""; 

function createMemoryGrid(rows, theme) {
  gridContainer.innerHTML = "";
  commencerChrono();

  const { rows: maxRows, cols: maxCols } = gridSizeOptions[rows];
  const cardWidthPercentage = 100 / maxCols;
  const cardMarginPercentage = 1;


  backImage = getBackImage(theme);

  const themeBackground = document.querySelector(".theme-background");
  themeBackground.style.backgroundImage = `url(${getBackgroundImageForTheme(theme)})`;

  const cards = generateAndShuffleCardList(maxRows * maxCols);

  for (let i = 0; i < maxRows; i++) {
    const row = document.createElement("tr");

    for (let j = 0; j < maxCols; j++) {
      const card = document.createElement("td");
      card.style.width = `${cardWidthPercentage}%`;
      card.style.margin = `${cardMarginPercentage / 2}%`;

      const img = document.createElement("img");
      const cardId = cards.pop();
      img.className = "card-image " + cardId + " face-down";
      img.src = backImage; 

      card.addEventListener("click", () => {
        if (canFlip && img.classList.contains("face-down")) {
          flipCard(img, theme);
        }
      });

      card.appendChild(img);
      row.appendChild(card);
    }
    gridContainer.appendChild(row);
  }
}

generateGridButton.addEventListener("click", () => {
  const selectedTheme = themeSelect.value;
  const selectedLevel = levelSelect.value; 
let level = 0;
if (selectedLevel==='Level I'){
  level = 4;

} else if (selectedLevel==='Level II'){
  level = 8;
}
else {
  level = 12;
}

  createMemoryGrid(level, selectedTheme);
});

function generateAndShuffleCardList(totalCards) {
  const cardList = [];
  for (let i = 1; i <= totalCards / 2; i++) {
    cardList.push(i, i);
  }
  shuffleArray(cardList);
  return cardList;
}

function shuffleArray(array) {
  for (let i = array.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [array[i], array[j]] = [array[j], array[i]];
  }
}

function getBackImage(theme) {
  switch (theme) {
    case "Default":
      return "../../assets/dos_default.png";
    case "Pokemon":
      return "../../assets/dos_pokemon.jpeg";
    case "ClashRoyale":
      return "../../assets/dos_clashRoyale.png";
    default:
      return "../../assets/dos_default.png"; 
  }
}

function flipCard(img, theme) {
  if (flippedCards < 2) {
    if (img.classList.contains("face-down")) {
      img.classList.remove("face-down");
      const cardId = img.classList[1];
      img.style.animation = "flip 0.5s"; // Ajoutez cette ligne pour déclencher l'animation
      img.src = `../../assets/Carte/${cardFaces[theme][cardId]}`;

      if (firstCard === null) {
        firstCard = img;
      } else {
        secondCard = img;
        canFlip = false;
        flippedCards = 2;

        if (firstCard.src === secondCard.src) {
          pairsFound++;
          firstCard = null;
          secondCard = null;
          canFlip = true;
          flippedCards = 0;
          checkWin();
        } else {
          setTimeout(() => {
            firstCard.classList.add("face-down");
            secondCard.classList.add("face-down");
            firstCard.style.animation = "none"; // Arrêtez l'animation
            secondCard.style.animation = "none"; // Arrêtez l'animation
            firstCard.src = backImage;
            secondCard.src = backImage;
            firstCard = null;
            secondCard = null;
            canFlip = true;
            flippedCards = 0;
          }, 1000);
        }
      }
    }
  }
}


function checkWin() {
  const cards = document.querySelectorAll(".card-image");

  for (const card of cards) {
    if (card.classList.contains("face-down")) {
      return;
    }
  }


  const victoryMessage = document.getElementById("victoryMessage");
  victoryMessage.style.display = "block";


  send_data();

  gameIsFinished = true;
  clearInterval(chrono);
}


  let gameIsFinished = false;

  let hours = 0;
  let minutes = 0;
  let seconds = 0;
  let ms = 0;
  let timer;
  let chrono;
 
  
  function commencerChrono() {
    if (chrono) {
      clearInterval(chrono); // Arrête le chrono s'il était déjà en cours
    }
    hours = 0;
    minutes = 0;
    seconds = 0;
    chrono = setInterval(actualiserChrono, 100);
    timer = document.querySelectorAll("#hours, #minutes, #seconds");
  }
  
  
  function actualiserChrono() {
    if (gameIsFinished) {
      clearInterval(chrono);
      return;
    }
  
    ms += 1;
    if (ms == 10) {
      ms = 0;
      seconds += 1;
    }
    if (seconds == 60) {
      seconds = 0;
      minutes += 1;
    }
    if (minutes == 60) {
      minutes = 0;
      hours += 1;
    }
  
    timer[0].innerHTML = hours;
    timer[1].innerHTML = minutes;
    timer[2].innerHTML = seconds;
  }
  
  function reinitialiserChrono() {
    clearInterval(chrono);
    (seconds = 0), (minutes = 0), (hours = 0);
    timer[0].innerHTML = hours;
    timer[1].innerHTML = minutes;
    timer[2].innerHTML = seconds;
  }

  function send_data(){
    var hours = document.getElementById('hours').innerText;
    var minutes = document.getElementById('minutes').innerText;
    var seconds = document.getElementById('seconds').innerText;
    var level = document.getElementById('levelSelect').value;
   
      const formData = new FormData();

      formData.append("hours",hours);
      formData.append("minutes",minutes);
      formData.append("seconds",seconds);
      formData.append("level",level);
      const request = new XMLHttpRequest();
      request.open('POST',"../../games/memory/index1.php");
      request.send(formData);
    }

    document.getElementById('modal').style.display = 'block'
    window.addEventListener('scroll', function(e) {
      setTimeout( () => {
        document.getElementById('modal').style.display = 'block'
      }, 2000 )
    });
    let modalAlreadyShowed = false

window.addEventListener('scroll', function(e) {
  if( ! modalAlreadyShowed ) {
    setTimeout( () => {
      document.getElementById('modal').style.display = 'block'
    }, 2000 )
    modalAlreadyShowed = true
  }
});
document.getElementById('modal-close').addEventListener('click', function(e) {
  document.getElementById('modal').style.display = 'none'
  location.reload
})

window.addEventListener('beforeunload', function (e) {
  if( confirmExiting ) {
    e.preventDefault();
    e.returnValue = '';
  }
});


  function getBackgroundImageForTheme(theme) {
    switch (theme) {
      case "Default":
        return "../../assets/fond_default.webp";
      case "Pokemon":
        return "../../assets/fond_pokemon.jpg"; 
      case "ClashRoyale":
        return "../../assets/fond_clashRoyale.jpg"; 
      default:
        return "../../assets/fond_default.webp"; 
    }
  }

