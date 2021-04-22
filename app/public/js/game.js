// fetching all details for a specing game for the game.php page
const urlgame = window.location.search;
// example: ?action=game&id=3388

// parse the query string's parameters using URLSearchParams
const urlParams = new URLSearchParams(urlgame);

// now I use the method get to get the id of that game
const gameId = urlParams.get('id');
// example: id=3388 => urlParams.get('id') -> 3388

const requestGame = 'https://api.rawg.io/api/games/'+ gameId + '?key=10afd979e0874030811ad36e60da2bda';
// example: https://api.rawg.io/api/games/3388?key=10afd979e0874030811ad36e60da2bda


async function game(){
    
    const req = await fetch(requestGame);
    const data = await req.json();
    let game = data;
    // result: game object from api

    let likeLink = document.getElementById('like_link');
    
    likeLink.href = `index.php?action=like&id=${game.id}`;
    // .reduce lets you iterate and concatenate at the same time in your array 
    const platformList = game.parent_platforms.reduce((list, p)=>{
        return `${list} <p>${p.platform.name}</p>`},"")
        
    document.getElementById('game_details').insertAdjacentHTML('beforeend',
        `   
            <div class="game_display" data-aos="zoom in">
                <h2 class="game_title"> ${game.name} </h2>
                <img src="${game.background_image}" alt="game image">
            </div>
            <div class="flex_dev_meta">
                <div class="developers" data-aos="fade-right">
                    <h3> Developed by: </h3>
                    <p> ${game.developers[0].name} </p>
                </div>
                <div class="metacritic"  data-aos="fade-left">
                    <h3> Metacritic Ranking: </h3>
                    <p> ${game.metacritic} </p>
                </div>
            </div>

            <div class="game_description">
                <h3> Game Description: </h3>
                <p> ${game.description} </p>
            </div>

            <div class="game_description">
                <h3> Platforms: </h3>
                ${platformList}
            </div>
    `)
}
game();