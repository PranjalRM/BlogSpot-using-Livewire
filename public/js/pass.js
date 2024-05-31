document.getElementById('togglePassword').addEventListener('click', function (e) {
    // Toggle the type attribute
    const password = document.getElementById('password');
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);

    // Toggle the button text
    this.textContent = type === 'password' ? 'Show' : 'Hide';
});
