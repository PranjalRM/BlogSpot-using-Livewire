function togglePasswordVisibility(inputId) {
    const input = document.getElementById(inputId);
    const show = input.type === 'password';

    input.type = show ? 'text' : 'password';
    document.getElementById('closed-eye').classList.toggle('hidden');
    document.getElementById('open-eye').classList.toggle('hidden');
}

function togglePasswordVisibilityEnd(inputId) {
    const input = document.getElementById(inputId);
    input.type = 'password';
    document.getElementById('closed-eye').classList.remove('hidden');
    document.getElementById('open-eye').classList.add('hidden');
}
