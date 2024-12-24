document.querySelector('form').addEventListener('submit', function(event) {
    const instagramHandle = document.getElementById('instagram').value;
    if (!instagramHandle.startsWith('@')) {
        alert('Akun Instagram harus diawali dengan "@"');
        event.preventDefault(); // Cegah pengiriman form jika tidak valid
    }
});
