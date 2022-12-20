



$(document).ready(function() {
    $("#formpeng").submit(function(e) {
        e.preventDefault();
        let nama = $("#transpeng").val();
        $("#contpeng").load("searchtranspeng.php", {
            input : nama
        });
    });
});






// caripeng.addEventListener('click',function(e){
//     e.preventDefault();
    
// });

// keyword.addEventListener('keyup',function(e){
//     e.preventDefault
//     console.log(keyword.value);

//     let xhr = new XMLHttpRequest();

//     xhr.onreadystatechange = function(){
//         if(xhr.readyState == 4 && xhr.status == 200){
//             container.innerHTML = xhr.responseText;
//             // console.log(xhr.responseText);
//         }
//     }

//     xhr.open('GET','searchtranspeng.php',true)
//     xhr.send();
// })











