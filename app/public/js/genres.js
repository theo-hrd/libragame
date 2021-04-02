// let rendergenres = document.getElementById('game_categories')
const urlgenre = "https://api.rawg.io/api/genres?key=10afd979e0874030811ad36e60da2bda";

// async function genre(){
//     const req = await fetch(urlgenre);
//     const data = await req.json();
//     let genres = data.results;

//     for(let i = 0 ; i < genres.length ; i++ ){
        
//         let a = document.createElement('a.cat_btn');
//         a.innerText = genres[i].name;
//         rendergenres.appendChild(a);
//     }

//         // console.log(data.results[0].name); bon retour de la request avec just le nom
// }
// genre();

async function genre(){
    const req = await fetch(urlgenre);
    const data = await req.json();
    let genres = data.results;

    genres.forEach(genre => {
        document.getElementById('game_categories').insertAdjacentHTML('beforeend', ` 
            <a href="" class="cat_btn">${genre.name}</a>
        `)
    })
}
genre();