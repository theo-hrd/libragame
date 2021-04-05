
const urlgenre = "https://api.rawg.io/api/genres/4?key=10afd979e0874030811ad36e60da2bda";


async function genre(){
    const req = await fetch(urlgenre);
    const data = await req.json();
    let genres = data;
    console.log(genres.name);
    // genres.forEach(genre => {
    //     document.getElementById('game_categories').insertAdjacentHTML('beforeend', ` 
    //         <button id="cat_btn">${genre.name}</button>
    //     `)
    // })
    // test for only one category
    document.getElementById('game_categories').insertAdjacentHTML('beforeend', ` 
        <button class="cat_btn" id='button'>${genre.name}</button>`);
}
