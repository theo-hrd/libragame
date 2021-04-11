// url to fetch all the game genres
const urlgenre = "https://api.rawg.io/api/genres?key=10afd979e0874030811ad36e60da2bda";

async function genre(){
    const req = await fetch(urlgenre); // request
    const data = await req.json(); // declaring our data as json
    let genres = data.results;

    genres.forEach(genre => {
        let gameCategories = document.getElementById('game_categories');
        let btn = document.createElement('button');
        btn.classList.add('category_btn');
        btn.innerText = genre.name; // saying that the button will retrieve the name of the category
        
        // let's load the games after the click
        btn.addEventListener('click', function(){ // when clicking on the button, fetching the games categories
                // instanciating the ajax object
            var xhr = new XMLHttpRequest();
            //  OPEN - type, url/file, async(true false)
            xhr.open('GET', `https://api.rawg.io/api/games?genres=${genre.id}&key=10afd979e0874030811ad36e60da2bda`,true);

            xhr.onload = function(){
                if(this.status == 200){
                    let category = JSON.parse(this.responseText);

                    var output = '';

                    for(let i=0; i< category.results.length; i++){
                        output +=
                        '<div class="game">'+
                        '<a href="index.php?action=game">'+
                        '<h2>' +category.results[i].name+ '</h2>'+
                        '<img src="'+category.results[i].background_image+'" class="img_game">'+
                        '</a>'+
                        '</div>'
                    }
                }
                document.getElementById('games').innerHTML = output;
            }
            // sends request
            xhr.send();
        });
        gameCategories.appendChild(btn);
        
    })
}
//genre();
