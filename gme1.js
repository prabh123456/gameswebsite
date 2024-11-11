const audio = document.getElementById('background-music');
const click = document.getElementById('click-music');
const cnt = document.getElementById('cnt');
const ctn1 = document.getElementById('ctn1');
const vlmon = document.getElementById('volumeon');
const vlmoff = document.getElementById('volumeoff');

window.onload = function() {
    document.body.addEventListener('click', () => {
        audio.play();
    }, { once: true });
};
function openCnt(){
    let start=document.getElementById('start-sound');
    start.play()
    let btn=document.getElementById('btn');
    btn.classList.add('hidden');
    setInterval(startGame(),8000);
    generatefood();
}

function toggleVolume() {
    if (audio.muted) {
        click.play();
        audio.muted = false;
        vlmon.style.display = 'block';
        vlmoff.style.display = 'none';
    } else {
        click.play();
        audio.muted = true;
        vlmon.style.display = 'none';
        vlmoff.style.display = 'block';
    }
}

const gridsize = 20;
let gridarr = [];
let snake = [];
let cells;

function initGrid() {
    let board = document.getElementById('board');
    board.style.display = 'grid';
    board.style.gridTemplateRows = `repeat(${gridsize}, 30px)`;
    board.style.gridTemplateColumns = `repeat(${gridsize}, 30px)`;

    for (let i = 0; i < gridsize; i++) {
        for (let j = 0; j < gridsize; j++) {
            let cell = document.createElement('div');
            cell.classList.add('cell');
            cell.setAttribute('data-x', j);
            cell.setAttribute('data-y', i);
            board.appendChild(cell);
        }
    }

    cells = document.querySelectorAll('#board .cell');

    initarray(); 
    initsnake();
}

function initarray() {
    gridarr = Array.from({ length: gridsize }, () => Array(gridsize).fill(0));
}


function initsnake() {
    let startX = Math.floor(gridsize / 2);
let startY = Math.floor(gridsize / 2);
    snake = [
        { x: startX, y: startY },
        { x: startX - 1, y: startY },
        { x: startX - 2, y: startY }
    ];
    placesnake();
}
function placesnake() {
    snake.forEach(segment => {
        gridarr[segment.y][segment.x] = 1; 
    });
    updateBoardDisplay(); 
}

function generatefood() {
    let foodposition;
    let validposition = false;

    while (!validposition) {
        const randomrows = Math.floor(Math.random() * gridsize);
        const randomcols = Math.floor(Math.random() * gridsize);

        const onSnake = snake.some(segment => segment.x === randomcols && segment.y === randomrows);

        if (!onSnake) {
            foodposition = { row: randomrows, col: randomcols };
            validposition = true;
        }
    }

    gridarr[foodposition.row][foodposition.col] = 2;

    updateBoardDisplay();
}

function updateBoardDisplay() {
    cells.forEach(cell => {
        let x = parseInt(cell.getAttribute('data-x')); 
        let y = parseInt(cell.getAttribute('data-y'));
        cell.classList.remove('snake');
        cell.classList.remove('snakebdy');
        cell.classList.remove('food');
      
        if (gridarr[y][x] === 1) { 
            cell.classList.add('snakebdy'); 
        } else if (gridarr[y][x] === 2) {
            cell.classList.add('food'); 
        }
    });
    let head=snake[0];
    let headcell=document.querySelector(`[data-x="${head.x}"][data-y="${head.y}"]`);
    if(headcell){
        headcell.classList.add('snake');
    }
}
let direction={x:1,y:0};
let speed=400;
let moveInterval;
document.addEventListener('keydown',changeDirection)
let score=0;
function changeDirection(event){
    const key=event.key;
    switch(key){
        case 'ArrowUp':
            if(direction.y !==1){
                direction={x:0,y:-1};
            }
            break;
            case 'ArrowDown':
                if(direction.y !==-1){
                    direction={x:0,y:1};
                }
                break;
                case 'ArrowLeft':
                    if(direction.x!==1){
                        direction={x:-1,y:0};
                    }
                    break;
                    case 'ArrowRight':
                    if(direction.x!==-1){
                        direction={x:1,y:0};
                    }
                    break;

    }
}
function movesnake() {
    let coin=document.getElementById('coin-sound');
    let head = { x: snake[0].x + direction.x, y: snake[0].y + direction.y };

    if (head.x < 0 || head.x >= gridsize || head.y < 0 || head.y >= gridsize ) {
        clearInterval(moveInterval);
        gameover();
        return;
    }
    if(gridarr[head.y][head.x]===1){
        let loss=document.getElementById('loss-sound');
        loss.play();
        clearInterval(moveInterval);
        gameover();
        return;
       }
    if (gridarr[head.y][head.x] === 2) {
         score=score+1;
        snake.unshift(head);
        coin.play();
        generatefood();
    } else {
        snake.unshift(head);
        let tail = snake.pop();
        gridarr[tail.y][tail.x] = 0;
      
    }

    gridarr[head.y][head.x] = 1;

    placesnake();
}

function gameover(){
    let loss=document.getElementById('loss-sound');
    let pop=document.getElementById('pop-sound');
    pop.play();
    loss.play();
    let scoreButton = document.getElementById('score');
    scoreButton.textContent = "Score: " + score;
    document.getElementById('gameover-popup').style.display = 'block';
    let box=document.getElementById('cnt1');
    box.classList.add('popup-overlay');
}
function ok(){
    click.play();
    document.getElementById('gameover-popup').style.display ='none';
    let box=document.getElementById('cnt1');
    box.classList.remove('popup-overlay');
    restartGame();
}
function closeModal(){
    window.location.href='../hero/first1.php';
}
function startGame() {
    moveInterval = setInterval(movesnake, speed);
}
function restartGame() {
    let start=document.getElementById('start-sound');
    start.play();
    score=0;
    direction = {x: 1, y: 0};
    initarray();
    initsnake();
    generatefood();
    startGame();
}
initGrid();



