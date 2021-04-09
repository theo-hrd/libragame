
const urlgenre = "https://api.rawg.io/api/genres?key=10afd979e0874030811ad36e60da2bda";


async function genre(){
    const req = await fetch(urlgenre);
    const data = await req.json();
    let genres = data.results;
    console.log(genres[0].id);
    genres.forEach(genre => {
        let toto = document.getElementById('game_categories');
        let btn = document.createElement('button');
        btn.innerText = genre.name;
        btn.addEventListener('click', function(){
             // instanciating the ajax object
        var xhr = new XMLHttpRequest();
        //  OPEN - type, url/file, async(true false)
        xhr.open('GET', `https://api.rawg.io/api/games?genres=${genre.id}&key=10afd979e0874030811ad36e60da2bda`,true);

        xhr.onload = function(){
            if(this.status == 200){
                let category = JSON.parse(this.responseText);
                console.log(category);
                var output = '';

                
                for(let i=0; i< category.results.length; i++){
                    output +=
                    '<div class="game">'+
                    '<h2>' +category.results[i].name+ '</h2>'+
                    '<img src="'+category.results[i].background_image+'" class="img_game">'+
                    '</div>'
                }
            }
            document.getElementById('games').innerHTML = output;
        }
        // sends request
        xhr.send();
        });
        toto.appendChild(btn);
        // document.getElementById('game_categories').insertAdjacentHTML('beforeend', ` 
        //     <button id="cat_btn">${genre.name}</button>
        // `)
    })
    // test for only one category
    // document.getElementById('game_categories').insertAdjacentHTML('beforeend', ` 
    //     <button class="cat_btn" id='button'>${genre.name}</button>`);
}
