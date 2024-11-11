function playAudio(id) {
    const audio = document.getElementById(id);
    if (audio) {
        audio.play().catch(e => console.error("Audio playback error:", e));
    } else {
        console.error(`Audio element with ID ${id} not found!`);
    }
}

function startGame1() {
    // Hide the Play Now button
    document.getElementById('play-now-container').style.display = 'none';
    
    // Show the game container
    document.getElementById('game-container').style.display = 'block';
    playAudio('start-sound');
    // Start the game logic
    startGame(); 
}

let selectedWord = '';
let selectedHint = '';
let guessedLetters = [];
let remainingGuesses = 6;
const images = [
    '../gme3/images/hangman-0.svg', 
    '../gme3/images/hangman-1.svg', 
    '../gme3/images/hangman-2.svg', 
    '../gme3/images/hangman-3.svg', 
    '../gme3/images/hangman-4.svg', 
    '../gme3/images/hangman-5.svg', 
    '../gme3/images/hangman-6.svg'
];

function createAlphabetBtns() {
    const container = document.getElementById('btncreate');
    for (let i = 65; i <= 90; i++) {
        const letter = String.fromCharCode(i);
        const button = document.createElement('button');
        button.className = 'alphabtn';
        button.textContent = letter;

        button.addEventListener('click', function() {
            playAudio('click-music');
            handleGuess(letter);
        });
        
        container.appendChild(button);
    }
}

function getRandomWords() {
    const wordHints = [
        { word: "elephant", hint: "A large mammal with a trunk." },
        { word: "python", hint: "A programming language named after a comedy group." },
        { word: "sahara", hint: "The largest hot desert in the world." },
        { word: "beach", hint: "A sandy shore by the ocean." },
        { word: "giraffe", hint: "An African animal with a long neck." },
        { word: "turing", hint: "A famous mathematician who is considered the father of computer science." },
        { word: "everest", hint: "The highest mountain on Earth." },
        { word: "react", hint: "A JavaScript library for building user interfaces." },
        { word: "shakespeare", hint: "Famous playwright known for works like Hamlet and Romeo & Juliet." },
        { word: "dinosaur", hint: "A prehistoric animal that once roamed the Earth." },
        { word: "mercury", hint: "The closest planet to the Sun." },
        { word: "vaccine", hint: "A medical solution that helps protect against disease." },
        { word: "neptune", hint: "The eighth planet from the Sun." },
        { word: "koala", hint: "An Australian marsupial known for its bear-like appearance." },
        { word: "universe", hint: "All of space and everything in it." },
        { word: "harmony", hint: "The quality of forming a pleasing or consistent whole." },
        { word: "galaxy", hint: "A large system of stars, gas, and dust bound together by gravity." },
        { word: "volcano", hint: "A mountain that erupts with lava, ash, and gases." },
        { word: "sudoku", hint: "A number puzzle game that involves placing digits in a grid." },
        { word: "telescope", hint: "A tool used to observe distant objects in space." },
        { word: "robot", hint: "A machine that performs tasks automatically." },
        { word: "apple", hint: "A fruit that is often associated with a technology company." },
        { word: "paris", hint: "The capital of France, known for the Eiffel Tower." },
        { word: "sushi", hint: "A Japanese dish consisting of rice, seafood, and vegetables." }
    ];
    
    const randomIndex = Math.floor(Math.random() * wordHints.length);
    return wordHints[randomIndex];
}

function handleGuess(letter) {
    if (guessedLetters.includes(letter)) {
        return;
    }
    guessedLetters.push(letter);

    if (selectedWord.includes(letter)) {
        playAudio('coin');
        updateWordDisplay();
    } else {
        remainingGuesses--;
        document.getElementById('incorrect').textContent = `Incorrect: ${6 - remainingGuesses}/6`;

        const imageIndex = 6 - remainingGuesses; 
        document.querySelector('.box img').src = images[imageIndex];
    }

    if (remainingGuesses <= 0) {
        endGame(false);
    } else if (checkWin()) {
        endGame(true);
    }
}

function checkWin() {
    return selectedWord.split('').every(char => guessedLetters.includes(char));
}

function endGame(won) {
    let win = document.getElementById('win-sound');
    let loss = document.getElementById('loss-sound');

    if (!win || !loss) {
        console.error("Audio elements not found!");
        return;
    }

    const message = won ? 'Congratulations! You guessed the word!' : `Game over! The word was ${selectedWord}.`;
    document.getElementById('game-message').textContent = message;

    if (won) {
        playAudio('win-sound');
    } else {
        playAudio('loss-sound');
    }

    gameover();
}

function updateWordDisplay() {
    let displayWord = '';

    for (let char of selectedWord) {
        displayWord += guessedLetters.includes(char) ? `${char} ` : '_ ';
    }
    document.getElementById('word').textContent = displayWord.trim();
}

function gameover() {
    playAudio('pop');
    document.getElementById('gameover-popup').style.display = 'block';
    let box = document.getElementById('box');
    box.classList.add('popup-overlay');
    document.body.style.pointerEvents = 'none';
    box.style.pointerEvents = 'auto';
}
function ok() {
    const gameoverPopup = document.getElementById('gameover-popup');
    const box = document.getElementById('box');

    if (gameoverPopup) {
        gameoverPopup.style.display = 'none';
    } else {
        console.error("Element with ID 'gameover-popup' not found!");
    }

    if (box) {
        box.classList.remove('popup-overlay');
    } else {
        console.error("Element with ID 'box' not found!");
    }

    resetGameContent();
}

function resetGameContent() {
    selectedWord = '';
    selectedHint = '';
    document.querySelector('.box img').src = images[0];
    startGame();
}

function closeModal() {
    window.location.href = '../hero/first1.php';
}

function startGame() {
    const { word, hint } = getRandomWords();
    selectedWord = word.toUpperCase();
    selectedHint = hint;
    guessedLetters = [];
    remainingGuesses = 6;

    document.getElementById('word').textContent = '_ '.repeat(word.length);
    document.getElementById('hint').textContent = `Hint: ${hint}`;
    document.getElementById('incorrect').textContent = `Incorrect: 0/6`;
}

// Initialize game on page load
startGame();
createAlphabetBtns();

