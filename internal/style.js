document.addEventListener('DOMContentLoaded',() => {
    const success= document.getElementById('upload-success');
    if(!success) return;

    // creation of the tick sign

    const tick = document.createElement('img');
    tick.src = 'image copy 2.png';
    tick.style.position = 'fixed';
    // to make the tick picture in the center
    tick.style.top = '50%';
    tick.style.left = '50%';
    tick.style.transform = 'translate(-50%,-50%)';
    tick.style.width = '400px';
    tick.style.height = '400px';
    // to make the picture above the main page and have some attention there
    tick.style.zIndex = '9999';

    document.body.appendChild(tick);

    //time duration of the tick sign
    setTimeout(() =>{
        tick.remove();
        const path = success.getAttribute('data-file-path');
        const title = success.getAttribute('data-file-name');

        displayCertificate(path,title);
    },2600);
});