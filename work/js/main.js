$(document).ready(function () {
    $('#signup').prop('disabled', true);

    function validatePasswords() {
        const password = $('#password').val();
        const confirmPassword = $('#confirmpassword').val();

        if (password === confirmPassword && password.length >= 8 && confirmPassword !== "") {
            $('#signup').prop('disabled', false);
        } else {
            $('#signup').prop('disabled', true);
        }
    }
    $('#password, #confirmpassword').on('keyup', function () {
        validatePasswords();
    });

    
});
