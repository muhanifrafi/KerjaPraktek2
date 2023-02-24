const loginForm = document.getElementById('login-form');

if (loginForm) {
    loginForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        if (!email) {
            alert('Please enter your email address.');
            return;
        }

        if (!password) {
            alert('Please enter your password.');
            return;
        }

        fetch('{{ route('login') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                email: email,
                mypassword: password
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Authentication succeeded
                window.location.href = '/';
            } else {
                // Authentication failed
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('There was a problem with the login request:', error);
        });
    });
}