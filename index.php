<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Document</title>
    <link href="style.css" rel="stylesheet">
    <link href="style1.css" rel="stylesheet">

</head>
<body>
    <audio id="pop" src="pop.mp3"></audio>
    <audio id="click" src="click.mp3"></audio>
<nav class="">
    <div class="">GameGalaxy..</div>
    <ul class="">
        <li><a href="#" class="active">Home</a></li>
        <li><a href="#games-section" class="">Games</a></li>
        <li><a href="../help/help.html" class="">Help</a></li>
        <li><a href="../careers/career.php" class="">Careers</a></li>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <li><a href="join/logout.php" class="">Logout</a></li>
        <?php else: ?>
            <li><a href="join/regis.php" class="">Join</a></li>
        <?php endif; ?>
    </ul>
</nav>
<section id="start" >
    <div class="firstSec">
 <div class="txt">
    <p class="txt1">WELCOME TO GAMEGALAZY..</p>
    <p class="txt2">BEST GAMING SITE EVER!</p>
    <div class="wrapper">
        <div class="static-txt">WE PROVIDE</div>
            <ul class="dynamic-txt">
            <li class="item">Tic-Tac-Toe</li>
            <li class="item">Memory Card</li>
            <li class="item">Hangman Game</li>
            <li class="item">Word Scramble </li>
            <li class="item"> Word Guessing</li>
            <li class="item">Classic Snake Game</li>    
            <ul>
    </div>
    <div class="btn">
 <button class="btn1" onclick="document.querySelector('#games-section').scrollIntoView({ behavior: 'smooth' });">
    Explore Games
</button>
</div>
    </div>
    <div class="container">
        <div class="images">
            <img class="img11" src="https://images.pexels.com/photos/3400795/pexels-photo-3400795.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
            <img class="img11" src="https://images.pexels.com/photos/278887/pexels-photo-278887.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
            <img class="img11" src="https://images.pexels.com/photos/256417/pexels-photo-256417.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
            <img class="img11" src="https://images.pexels.com/photos/1500610/pexels-photo-1500610.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
            <img class="img11" src="https://img.freepik.com/premium-photo/ludo-dice-cutout-image-template_798686-173.jpg?w=740">
            <img class="img11" src="https://img.freepik.com/free-vector/dark-hexagonal-background-with-gradient-color_79603-1409.jpg?size=626&ext=jpg&ga=GA1.1.1141335507.1719100800&semt=sph">
    </div>
  </div>
 </div>

</div>

  </section>
 <!-- <div id="prevPlayed" class="recently-viewed-section"></div> -->

 <section id="games-section">
 <div >
<div class="head1">
    <p class="para1">Our Games</p>
</div>
<div class="card-container" id="card-container">
</div>
</div>
</section>

<section id="test">
<h2 class="h2" >Testimonials</h2>
<div id="testContainer">
<div id="testContainer1">
</div>
</div>
</section>

<section id="contact">
        <div class="image">
            <div class="overlay">
                <div class="content">
                    <p class="pp1">Join Our Team</p>
                    <p class="pp2">It takes the world's best talent</p>
                    <p class="pp3">to change the game.</p>
                    <button class="btns" onclick="open1()">Explore Careers</button>
                </div>
                <div class="form">
        <form class="box" action="contact.php" method="POST">
            <p class="pp5">Get in touch</p>
            <label for="name" class="label">Name:</label>
            <div class="error-message" id="fname-error"></div>
            <input class="name" id="name" type="text" name="name" required minlength="2" maxlength="50" >
            <label for="email" class="label">Email:</label>
            <div class="error-message" id="email-error"></div>
            <input id="email" type="email" name="email" required >
            <br>
            <label for="message" class="label">Leave us a message:</label>
            <textarea id="message" name="message" cols="5" rows="3"></textarea>
            <input type="submit" value="Submit">
        </form>
    </div>
            </div>
        </div>
 
</section>
<footer class="footer">
        <div class="footer-content">
            <p>Contact us at: <a href="mailto:kaurprabh6698@gmail.com">kaurprabh6698@gmail.com</a></p>
            <p>Created by Prabhjot Kaur</p>
            <p>© 2024 GameGalaxy. All rights reserved.</p>
        </div>
    </footer>


<script>
let popSound=document.getElementById('pop');
let click=document.getElementById('click');

function playsound(){
    click.play();
}

document.querySelectorAll('a,button').forEach(link=>{
    link.addEventListener('click',playsound);
})
   const cards = [
    {
        image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHG-MWTOtLxhH2vWIHZw7_36ugES8svpDUAw&usqp=CAU",
        title: "Tic-Tac-Toe",
        description: "A classic two-player game on a 3x3 grid where players aim to get three in a row with 'X' or 'O'.",
        link: "../gme2/gme2.html",
    },
    {
        image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTGKjaghrPp1QwsPSwLxEZfzOdZq8MJcquapM5_j57Zlax0G7JpfeD5elSyN7KwwT6kjIs&usqp=CAU",
        title: "Word Scrabble",
        description: "A word game where players score points by forming words on a 15x15 grid board using lettered tiles.",
    },
    {
        image: "https://howlongtobeat.com/games/40122_Snake_Classic.jpg",
        title: "Classic Snake",
        description: "Control a growing snake that consumes food while avoiding walls and its own body.",
        link: "../gme1/gme1.html",
    },
    {
        image: "https://i.pinimg.com/736x/21/f7/45/21f7459e74169683cb09af9227affc32.jpg",
        title: "Memory Card",
        description: "Flip over pairs of cards to find matching pairs in this game that tests memory and concentration.",
        link: "../gme4/gme4.html",
    },
    {
        image: "https://store-images.s-microsoft.com/image/apps.20362.13520227209191089.fb437ca7-5281-4f27-b81d-1b598db4e15a.bc2ef2ae-292a-47c0-ba77-f83bb08b8fa6",
        title: "Hangman Game",
        description: "Guess the letters of a word while avoiding having the stick figure fully drawn.",
        link:"../gme3/gme3.html",
    },
    {
        image: "https://rankdle.io/data/image/game/unnamed-91.png",
        title: "Word Guessing",
        description: "Guess a word or phrase based on clues or limited information provided.",
        link:"../gme5/gme5.html",
    },
];
function showlogin(){
    popSound.play();
    const overlay = document.createElement('div');
    overlay.className = 'modal-overlay';
   
    let pop=document.createElement('div');
    pop.classList.add('pop');
    pop.innerHTML=`
    <button class="close-btn" onclick="closeModal()">X</button>
    <div class="text">
    <p class="ptext">Login to play the game</p>
    <button class="pbtn" onclick='login()'>Login</button>
    </div>
    `
    document.body.appendChild(overlay);
    overlay.appendChild(pop);
    document.body.style.overflow = 'hidden';
}

function login() {
    click.play();
    closeModal();
window.location.href='join/signin.php';
}

function closeModal() {
    click.play();
    const overlay = document.querySelector('.modal-overlay');
    if (overlay) {
        overlay.remove();
        document.body.style.overflow = '';
    }
}

// function trackRecentlyViewed(game){
// let recentlyViewed=JSON.parse(localStorage.getItem('recentlyViewed'))||[];
// recentlyViewed=recentlyViewed.filter(item=>item.title!==game.title);
// recentlyViewed.unshift(game);
// if(recentlyViewed.length()>3){
//     recentlyViewed.pop();
// }
// localStorage.setItem('recentlyViewed',JSON.stringify(recentlyViewed));
// }

// function displayRecentlyViewed(){
//     let RecentlyViewed=JSON.parse(localStorage.getItem('recentlyViewed')) || [];
//     const prevPlayedContainer = document.getElementById('prevPlayed');
//     prevPlayedContainer.innerHTML="Recently Played";

//     RecentlyViewed.forEach(game=>{
//         const gameElement = document.createElement('div');
//         gameElement.classList.add('card');
//         gameElement.innerHTML = `
//             <a href="${game.link}">
//                 <div class="img">
//                     <div class="img1" style="background-image: url('${game.image}');"></div>
//                 </div>
//                 <div class="card-content">
//                     <div class='card-title'>${game.title}</div>
//                 </div>
//             </a>`;
//         prevPlayedContainer.appendChild(gameElement);
//     });

// }
// displayRecentlyViewed();

    function displaycards(cards){
        const container=document.querySelector('.card-container');
        cards.forEach(card => {
            const cardElement=document.createElement('div');
            cardElement.classList.add('card');
            const isLoggedIn = <?php echo isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true ? 'true' : 'false'; ?>;
            if(isLoggedIn){
            cardElement.innerHTML=`
            <a href="${card.link || '#'}" onclick="trackRecentlyViewed({ title: '${card.title}', image: '${card.image}', link: '${card.link}' })">
            <div class="img">
            <div class="img1" style="background-image: url('${card.image}');"></div>
            </div>
                <div class="card-content">
                    <div class='card-title'>${card.title}</div>
                    <div class='card-description'>${card.description}</div>
                    </div>
                </a>`;
                    container.appendChild(cardElement);
            }
            else{
                cardElement.innerHTML=`
                <a href="javascript:void(0)" onclick="showlogin()">
                <div class="img">
            <div class="img1" style="background-image: url('${card.image}');"></div>
            </div>
                <div class="card-content">
                    <div class='card-title'>${card.title}</div>
                    <div class='card-description'>${card.description}</div>
                    </div>
                </a>`;
                    container.appendChild(cardElement);
            } 
        });
    }
    displaycards(cards);

    const testimonials = [
    {
        content: "Amazing game! The graphics are top-notch, and the gameplay is incredibly smooth. I can't stop playing!",
        writer: "John Doe",
        ratings: "★★★★★"
    },
    {
        content: "This game is so addictive! I love the challenges and the overall design. Kudos to the developers!",
        writer: "Jane Smith",
        ratings: "★★★★☆"
    },
    {
        content: "A well-crafted game with just the right amount of difficulty. Keeps me coming back for more!",
        writer: "Michael Brown",
        ratings: "★★★★★"
    },
    {
        content: "Great experience! The levels are creative and engaging. Definitely one of the best games I've played recently.",
        writer: "Emily Johnson",
        ratings: "★★★★★"
    },
    {
        content: "I'm impressed with how intuitive the controls are. It's easy to pick up but hard to master just how I like my games.",
        writer: "Chris Lee",
        ratings: "★★★★☆"
    },
    {
        content: "Fun and challenging! The game mechanics are solid, and I appreciate the attention to detail.",
        writer: "Sarah Davis",
        ratings: "★★★★☆"
    },
    {
        content: "Absolutely love this game! It's perfect for quick sessions and also for long playthroughs when I have more time.",
        writer: "David Wilson",
        ratings: "★★★★★"
    },
    {
        content: "The sound effects and music are fantastic. They really add to the immersive experience.",
        writer: "Laura Martinez",
        ratings: "★★★★☆"
    },
    {
        content: "I've recommended this game to all my friends. It's fun, engaging, and has a great community feel.",
        writer: "James Anderson",
        ratings: "★★★★★"
    },
    {
        content: "The updates keep getting better and better. I'm excited to see what comes next!",
        writer: "Sophia Taylor",
        ratings: "★★★★★"
    },
    
];
function displaytestimonials(testimonials) {
    const testContainer = document.getElementById('testContainer');
    const scrollWrapper = document.createElement('div');
    scrollWrapper.classList.add('scroll-wrapper');
    
    testimonials.forEach(testCard => {
        const cardElement = document.createElement('div');
        cardElement.classList.add('testCard');
        cardElement.innerHTML = `
        <div class="card-inner">
            <div class="mainContent">${testCard.content}</div>
            <div class="other">${testCard.writer}</div>
            <div class="ratings">${testCard.ratings}</div>
        </div>`;
        scrollWrapper.appendChild(cardElement);
    });

    testContainer.appendChild(scrollWrapper);
}
function open1(){
    location.href="../careers/career.php";
}
displaytestimonials(testimonials);
</script>
</body>
</html>



