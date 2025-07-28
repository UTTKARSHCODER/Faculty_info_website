function upload_file(upload_file_id, upload_button_id, uploaded_file_nameforPHP) {
    const upload_button = document.getElementById(upload_button_id);
    const documentFileInput = document.getElementById(uploaded_file_nameforPHP);
    
    function uploadFileHandler() {
        const file = documentFileInput.files[0];

        if (!file) {
            console.error("Unable to retrive the file!");
            return;
        } else {
            console.log(file.name);
        }

        const formData = new FormData();
        formData.append(uploaded_file_nameforPHP, file);
        formData.append('button_id', upload_button_id);
        formData.append('row_id', upload_file_id);

        fetch("/project/root/assets/php/form_info.php", {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if(!response.ok) {
                console.log("Error!");
            }
            return response.text();
        })
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.error('Error during uploading:', error);
        })
    }
    upload_button.addEventListener('click', uploadFileHandler)
}

