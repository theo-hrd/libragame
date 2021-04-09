// async function gamesFromCategory(){
//     await genre();

//     document.getElementById('button').addEventListener('click', loadGameFromCategory);

//     function loadGameFromCategory(){
//         // instanciating the ajax object
//         var xhr = new XMLHttpRequest();
//         //  OPEN - type, url/file, async(true false)
//         xhr.open('GET', 'https://api.rawg.io/api/games?genres=4&key=10afd979e0874030811ad36e60da2bda',true);

//         xhr.onload = function(){
//             if(this.status == 200){
//                 let category = JSON.parse(this.responseText);
//                 console.log(category);
//                 var output = '';

                
//                 for(let i=0; i< category.results.length; i++){
//                     output +=
//                     '<div class="game">'+
//                     '<h2>' +category.results[i].name+ '</h2>'+
//                     '<img src="'+category.results[i].background_image+'" class="img_game">'+
//                     '</div>'
//                 }
//             }
//             document.getElementById('games').innerHTML = output;
//         }
//         // sends request
//         xhr.send();
//     }
// }
// gamesFromCategory();

// NEED TO DO IT FOR EACH CATEGORY.
// dictionary of all the ids ?
// loop ?