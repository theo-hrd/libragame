function retrieveGames(likedGames){
    likedGames.forEach(element => {
    
        async function likedGame(element){
            const requestGame = 'https://api.rawg.io/api/games/'+ element.gameid + '?key=10afd979e0874030811ad36e60da2bda';
            const req = await fetch(requestGame);
            const data = await req.json();
            let game = data;
                // result: game object from api
    
            document.getElementById('liked_game_profile').insertAdjacentHTML('beforeend',
                `   
                    <div class="game_display">
                        <h2> ${game.name} </h2>
                        <img src="${game.background_image}" alt="game image">
                    </div>
    
                    <div class="game_description">
                        <h3> Game Description </h3>
                        <p> ${game.description} </p>
                    </div>
    
            `)
    
    
        }
        likedGame(element);
    })
}



