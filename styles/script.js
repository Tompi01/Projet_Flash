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

  const { rows: maxRows, cols: maxCols } = gridSizeOptions[rows];
  const cardWidthPercentage = 100 / maxCols;
  const cardMarginPercentage = 1;


  backImage = getBackImage(theme);

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
  const selectedLevel = parseInt(levelSelect.value, 10); 
  createMemoryGrid(selectedLevel, selectedTheme);
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
  

    alert("Félicitations, vous avez gagné !");
  }