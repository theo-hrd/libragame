// let allGames;

// function getGames(json){
//     allGames = json;
// }

// fetching all the game for the search
// async function search(){
//     // const req = await fetch(urlSearchGame); // request
//     // const data = await req.json(); // declaring our data as json
//     // let game = data.results;
//     // console.log(game);

//     // search input
//     let input = document.getElementById("searchGame");

//     var xhr = new XMLHttpRequest();

//     xhr.open('GET', `https://api.rawg.io/api/games?key=10afd979e0874030811ad36e60da2bda`,true);

//     xhr.onload = function retrieve(){
//         if(this.status == 200){
//             getGames(JSON.parse(this.responseText));
//         }
//     }

//     console.log(allGames);

//     input.addEventListener("keyup", e => {
    
//         let result = document.getElementById('games');
//         let searchString = e.target.value; // I get the value of my input
//         searchString = searchString.replace(/\s/g,"-"); // replacing the spaces with "-" 

//         // var filter = articles.filter(function (article) {
//         //     var tagInArray = false;
//         //     article.tags.forEach(function(tag){
//         //         if(tag === req.params.tag){
//         //             tagInArray = true;
//         //         }
//         //     });
//         //     return tagInArray;
//         // });
            
        


//         //console.log(searchString);
        
//         // var xhr = new XMLHttpRequest();
    
//         // xhr.open('GET', `https://api.rawg.io/api/games/${this.searchString}&key=10afd979e0874030811ad36e60da2bda`,true);
//         // // console.log(xhr.open)
//         // xhr.onload() = function(){
//         //     if(this.status == 200){
//         //         let game = JSON.parse(this.responseText);
//         //         var output = 
//         //         '<div class="game" data-aos="fade-up" data-aos-delay="150" data-aos-duration="500">'+
//         //         '<a href="index.php?action=game&id='+game.id+'" id="link_to_game">'+
//         //         '<h2>' +game.name+ '</h2>'+
//         //         '<img src="'+game.background_image+'" class="img_game">'+
//         //         '</a>'+
//         //         '</div>';
                
//         //     }
//         // }

//     });

// }
// search();