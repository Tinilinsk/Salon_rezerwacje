document.getElementById('rezerwacjaForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('rezerwacja.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('msg').innerHTML = data;
        this.reset();
    })
    .catch(error => {
        document.getElementById('msg').innerHTML = "Błąd wysyłania!";
    });
});