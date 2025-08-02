document.addEventListener('DOMContentLoaded', function() {
    const allNavItems = document.querySelectorAll('.nav-item');
    const currentPath = window.location.pathname.split('/').pop();

    allNavItems.forEach(item => {
        item.classList.remove('active');

        if(currentPath === 'home.php') {
            item.classList.add('active');
        } else if(currentPath === 'profile_page.php') {
            item.classList.add('active');
        } else if(currentPath === 'qualification.php') {
            item.classList.add('active');
        } else if(currentPath === 'report_data.php') {
            item.classList.add('active');
        }
    })
})