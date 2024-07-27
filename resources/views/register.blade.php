<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .register-container {
            max-width: 400px;
            margin: auto;
            margin-top: 50px;
        }
        .register-card {
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .center-img {
            text-align: center;
        }
        .form-label {
            font-weight: bold;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.8em;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-container">
          <div class="center-img"> 
            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg" alt="Amazon Logo" width="100">
          </div>
            <div class="register-card card mt-3">
                <div class="card-body">
                    <h2 class="card-title">Crear cuenta</h2>
                    <form id="register-form">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tu nombre</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <div class="form-text">Debe tener al menos 6 caracteres</div>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Vuelve a escribir la contraseña</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-warning w-100">Crear tu cuenta de Amazon</button>
                    </form>
                    <div id="message" class="mt-3"></div>
                    <p class="mt-3 text-center">
                        Al crear una cuenta, aceptas las <a href="#">Condiciones de Uso</a> y el <a href="#">Aviso de Privacidad</a> de Amazon.
                    </p>
                    <p class="text-center">
                        ¿Ya tienes una cuenta? <a href="#">Iniciar sesión</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <footer>
        Página creada por @Juan David Arias
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#register-form').on('submit', function(event) {
                event.preventDefault();
                let formData = {
                    name: $('#name').val(),
                    email: $('#email').val(),
                    password: $('#password').val(),
                    password_confirmation: $('#password_confirmation').val()
                };
                $.ajax({
                    url: "{{ route('register.store') }}",
                    method: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#message').html('<div class="alert alert-success">' + response.success + '</div>');
                    },
                    error: function(response) {
                        let errors = response.responseJSON.errors;
                        let errorHtml = '<div class="alert alert-danger"><ul>';
                        $.each(errors, function(key, value) {
                            errorHtml += '<li>' + value[0] + '</li>';
                        });
                        errorHtml += '</ul></div>';
                        $('#message').html(errorHtml);
                    }
                });
            });
        });
    </script>
</body>
</html>
