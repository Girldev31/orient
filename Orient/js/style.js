document.querySelectorAll('.toggle-password').forEach(item => {
    item.addEventListener('click', function () {
        const target = document.getElementById(this.getAttribute('data-target'));
        const type = target.getAttribute('type') === 'password' ? 'text' : 'password';
        target.setAttribute('type', type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
});