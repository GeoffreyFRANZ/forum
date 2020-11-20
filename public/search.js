document.querySelector('#search').addEventListener('keyup',function () {
   
    let input = this.value
     
   fetch(`?ctrl=Home&method=index&search=${input}` ,  {
   method:'GET',
   headers: {
       'content-type': 'application/json'
   },
  
})
.then(  function(res){
 console.log(res)
  return res.text()
}) 
.then(function(data){

    
    let results = JSON.parse(data)
    console.log(results)
    results.forEach( function(elem) {
        document.querySelector('#suggestions').innerHTML += ` <li id="${elem.id}">coucou</li>`
    });
 
}) 
} )