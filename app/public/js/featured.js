// This js file is used on the homepage to show 3 games 

const url = "https://api.rawg.io/api/games?key=10afd979e0874030811ad36e60da2bda";

async function featured(){
    const req = await fetch(url);
    const data = await req.json();
    let games = data.results;

    // slicing so I only get 3 games
    games.slice(0,3).forEach(game => {
        document.getElementById('featured_game_card').insertAdjacentHTML('beforeend', `
            <div class="flex_game" data-aos="zoom-in">
            <h3> ${game.name} </h3>   
            <img src="${game.background_image}" alt="featured game">
            </div>
        `)
    });

}
featured();