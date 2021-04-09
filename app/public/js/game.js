const urlgame = `https://api.rawg.io/api/games/${game.id}&key=10afd979e0874030811ad36e60da2bda`;

async function game(){
    await genre();

    const req = await fetch(urlgame);
    const data = await req.json();
    let game = data;

    let linkGame = document.getElementsByTagName('a');

    linkGame.addEventListener('click', function() {
        var xhr = new XMLHttpRequest();
            //  OPEN - type, url/file, async(true false)
            xhr.open('GET', `https://api.rawg.io/api/games?genres=${game.id}&key=10afd979e0874030811ad36e60da2bda`,true);

            xhr.onload = function(){
                if(this.status == 200){
                    let category = JSON.parse(this.responseText);

                    var output = '';

                    
                        output +=
                        '<div class="game">'+
                        '<h2>' +game.name+ '</h2>'+
                        '<img src="'+category.background_image+'" class="img_game">'+
                        '</div>'
                    
                }
                document.getElementById('games').innerHTML = output;
            }
            // sends request
            xhr.send();
    });
    
    gameCategories.appendChild(btn);
        
};

game();