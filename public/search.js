document.querySelector('#search').addEventListener('keyup',function () {
   
    let input = this.value
     
   fetch('homeController.php', 'home.php', 'dao.php' ,  {
   method:'GET',
   headers: {
       'content-type': 'application/json'
   },
   body: JSON.stringify({input: input}) 
})
.then(  function(res){
 console.log(res)
  return res.json()
}) 
.then(function(data){

 
}) 
} )