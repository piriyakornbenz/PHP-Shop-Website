document.getElementById('togglePassword').addEventListener('click', function () {
    const passwordField = document.getElementById('password');
    const passwordFieldType = passwordField.getAttribute('type');
    
    if (passwordFieldType === 'password') {
        passwordField.setAttribute('type', 'text');
        this.textContent = 'Hide Password';
    } else {
        passwordField.setAttribute('type', 'password');
        this.textContent = 'Show Password';
    }
});