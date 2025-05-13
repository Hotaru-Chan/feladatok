document.getElementById('torolForm').addEventListener('submit', function(event){
    event.preventDefault()
    id = document.getElementById('id').value
    fetch(`./API/ingatlanok.php?id=${id}`,{
        method: 'DELETE'
    })
    .then(valasz => valasz.json())
    .then(valasz => {
        alert(valasz.uzenet)
        window.location.href = "index.html"
    })
})