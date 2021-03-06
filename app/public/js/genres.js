// fetching all the games here on the allgames.php page
// url to fetch all the game genres
const urlgenre = "https://api.rawg.io/api/genres?key=10afd979e0874030811ad36e60da2bda";

// getting the game genres
async function getGenres(){
    
    const req = await fetch(urlgenre); // request
    const data = await req.json(); // declaring our data as json
    let genres = data.results;

    genres.forEach(genre => { // for each genre we create a button 
        let gameCategories = document.getElementById('game_categories');
        let btn = document.createElement('button');
        btn.classList.add('category_btn');
        btn.setAttribute('data-aos', 'flip-up');
        btn.innerText = genre.name; // content of the button (retrieving the name of the category inside)
        
        // let's load the games after the click
        btn.addEventListener('click', function(){ // when clicking on the button, fetching the games categories
            // by default the page is 1 (so no conflict if there is no page before) 
            let page = 1;
            
            // get games of the genre with page selected
            getGames(genre, page);

            // creating previous and next buttons
            document.getElementById('pagination').innerHTML = `
            <button id="previous" style="display:none;">Previous</button>
            <button id="next">Next</button> 
            `;
            //next is displayed by default (page 1) and previous is hidden because there is no page 0 

            // declaring variables previous/next 
            const previous = document.getElementById('previous');
            const next = document.getElementById('next');
            
            // adding class for styling and attribute for js animation (more readable here than putting in the innerHTML line 27)
            previous.classList.add('pagination_btn');
            previous.setAttribute('data-aos','zoom-in');
            
            // adding class for styling and attribute for js animation (more readable here than putting in the innerHTML line 27)
            next.classList.add('pagination_btn');
            next.setAttribute('data-aos','zoom-in');
            next.setAttribute('data-aos-delay','1000');
            // previous button on eventListener
            previous.addEventListener('click', function(){
                
                // preventing the page to be less than 1
                if(page > 1){
                    page = page - 1;
                }

                getGames(genre, page);

                if(page == 1){
                    previous.setAttribute("style", "display:none;");

                    // if the next button is hidden
                    if(next.getAttribute("style") != null){
                        next.setAttribute("style", "");//show the button
                        
                    }
                }
            });

            // next button on eventListener
            next.addEventListener('click', function(){
                // next page
                page = page + 1;

                // get games of next page
                getGames(genre, page);

                // if the page is more than 1, show the previous button
                if(page > 1){
                    previous.setAttribute("style", ""); 
                }
                
                // checking if the next page exists
                // instanciating the ajax object
                var xhr = new XMLHttpRequest();
                //  OPEN - type, url/file, async(true false)
                xhr.open('GET', `https://api.rawg.io/api/games?genres=${genre.id}&key=10afd979e0874030811ad36e60da2bda&page=${page+1}`,true);

                xhr.onload = function(){
                    if(this.status == 200){
                        let response = JSON.parse(this.responseText);
                        if(response.detail){
                            next.setAttribute("style", "display:none;");
                        }
                        
                    }
                }
            });

            document.getElementById('next').setAttribute('style', '');
        });

        gameCategories.appendChild(btn);
        
    });
}
getGenres();



// Pagination

// getting the games from a specific genre
async function getGames(genre, page){
    // instanciating the ajax object
    var xhr = new XMLHttpRequest();
    //  OPEN - type, url/file, async(true false)
    xhr.open('GET', `https://api.rawg.io/api/games?genres=${genre.id}&key=10afd979e0874030811ad36e60da2bda&page=${page}`,true);

    xhr.onload = function(){
        if(this.status == 200){
            let game = JSON.parse(this.responseText);

            var output = '';

            for(let i=0; i< game.results.length; i++){
                output +=
                '<div class="game" data-aos="fade-up" data-aos-delay="150" data-aos-duration="500">'+
                '<a href="index.php?action=game&id='+game.results[i].id+'" id="link_to_game">'+
                '<h2>' +game.results[i].name+ '</h2>'+
                '<img src="'+game.results[i].background_image+'" class="img_game" alt="game image">'+
                '</a>'+
                '</div>'
            }
            window.scrollTo({
                top: 0,
                left: 0,
                behavior: 'smooth'
            });
        } else {
            var output = "Warning! There is no game on this page.";
            next.setAttribute("style", "display:none;");
        }
        document.getElementById('games').innerHTML = output;

    }
    // sends request
    xhr.send();
}