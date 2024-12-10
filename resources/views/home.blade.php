<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" crossorigin="anonymous"></script>
</head>

<body>
    <form>
        <label for="mobile">Enter Mobile Number</label>
        <input type="text" name="" id="number">
        <br>
        <div id="recaptcha-container"></div>
        <button type="button" onclick="sendCode()">Send Code</button>
    </form>

    <div id="error" style="color:red"></div>
    <div id="success" style="color:green;display:none"></div>

    <script src="https://www.gstatic.com/firebasejs/5.0.0/firebase.js"></script>

    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyAm1M6gztQ9PeRzEgHjv6y74_4QUeepWTo",
            authDomain: "otp-verification-project-ee8e7.firebaseapp.com",
            projectId: "otp-verification-project-ee8e7",
            storageBucket: "otp-verification-project-ee8e7.firebasestorage.app",
            messagingSenderId: "372174715797",
            appId: "1:372174715797:web:b58b5417106ab3ed07949c",
            measurementId: "G-335YLCZV19"
        }

        firebase.initializeApp(firebaseConfig);
    </script>

    <script type="text/javascript">
        window.onload = function() {
            render();
        }

        function render() {
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
            recaptchaVerifier.render();
        }

        function sendCode() {
            var number = $('#number').val();
            firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {
                window.confirmationResult = confirmationResult;
                coderesult = confirmationResult;
                $('#success').text('Message Sended Successfully');
                $('#success').show();
            }).catch(function(error) {
                $('#error').text(error.message);
                $('#error').show();
            });
        }
    </script>

</body>

</html>
