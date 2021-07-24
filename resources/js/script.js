window.addEventListener("load",()=>{
    console.log("LOADED")
    deleteButton = document.getElementById('delete');
    console.log(deleteButton)
    deleteButton.addEventListener("click",(event)=>{
        if(!confirm('Sei sicuro di voler eliminare il profilo?')){
            event.preventDefault();
        }
    })
})
