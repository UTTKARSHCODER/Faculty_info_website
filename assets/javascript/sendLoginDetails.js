function sendDetails() {
    const email = document.getElementById('email').value;
    const password = document.getElementById('pwd').value;

    const formData = new FormData();
    formData.append('loginEmail',email);
    formData.append('loginPassword',password);

    fetch('../php/login.php', {
        method: 'POST',
        body : formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        alert(data);
    })
    .catch(error => {
        console.error('Error: ', error);
    });
    
}