window.addEventListener("load", () => {
    deleteButton = document.getElementById('delete');
    deleteButton.addEventListener("click", (event) => {
        if (!confirm("Sei sicuro di voler eliminare l'account?")) {
            event.preventDefault();
        }
    })
})
