    <!DOCTYPE html>
    <html>
    <head>
        <link rel="icon" href="{{ asset('img/vg2.png') }}" type="image/x-icon">

        <title>Iniciar Sesión</title>
        <style>
            * {
                box-sizing: border-box;
            }

            body {
                font-family: 'Segoe UI', sans-serif;
                margin: 0;
                padding: 0;
                background-color: #0c0b10;
                color: #ffffff;
                display: flex;
                height: 100vh;
            }
        
            .card {
                position: relative;
                overflow: hidden;
                border-radius: 20px;
                display: flex;
                flex-direction: column;
                place-items: center;
                background: rgb(25, 5, 5);
                padding: 40px 30px;
                box-shadow: 0 0 10px rgba(255, 88, 88, 0.2);
                max-width: 400px;
                width: 100%;
                z-index: 0;
            }

            .card::before {
                content: '';
                position: absolute;
                top: -50%;
                left: -50%;
                width: 200%;
                height: 200%;
                background-image: linear-gradient(180deg, rgb(255, 247, 0), rgb(121, 0, 0));
                animation: rotBGimg 3s linear infinite;
                z-index: -1;
            }

            .card::after {
                content: '';
                position: absolute;
                inset: 5px;
                background: rgb(25, 5, 5);
                border-radius: 15px;
                z-index: -1;
            }

            @keyframes rotBGimg {
                from {
                    transform: rotate(0deg);
                }
                to {
                    transform: rotate(360deg);
                }
            }
            h1 {
                width: 42ch;
                font-family: monospace;
                text-wrap: nowrap;
                overflow: hidden;
                text-align: center;
                animation: typing 3s steps(42) 1 forwards;
                margin: 40px auto 20px auto; 
            }
            
            @keyframes typing {
                0% {
                    width: 0ch;
                }
            }
            
            .container {
                display: flex;
                width: 100%;
            }

            .left {
                flex: 1;
                background-color:rgb(0, 0, 0);
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                padding: 40px;
            }

            .left h1 {
                font-size: 32px;
                margin-bottom: 10px;
                color: rgb(255, 255, 255);
            }

            .left p {
                font-size: 16px;
                color: #c9d1d9;
            }

            .right {
                flex: 1;
                background-color: rgb(0, 0, 0);
                display: flex;
                justify-content: center;
                align-items: center;
            }

            form {
                background: rgb(25, 5, 5);
                padding: 30px;
                width: 100%;
                max-width: 400px;
            }

            label {
                display: block;
                margin-bottom: 6px;
                font-weight: bold;
                color: #c9d1d9;
            }

            input {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid rgb(61, 48, 48);
                background-color: rgb(0, 0, 0);
                color: white;
                border-radius: 5px;
            }

            input:focus {
                outline: none;
                border-color: rgb(177, 1, 1);
            }

            button {
                width: 100%;
                padding: 10px;
                background-color: rgb(255, 30, 0);
                color: white;
                font-weight: bold;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            button:hover {
                background-color: rgb(203, 86, 18);
            }

            a {
                color: rgb(255, 0, 0);
                text-decoration: none;
            }

            a:hover {
                text-decoration: underline;
            }

            .error {
                color: rgb(255, 17, 0);
                font-size: 14px;
            }

            .register {
                text-align: center;
                margin-top: 15px;
            }

            .logo-gif {
            width: 250px;
            height: auto;
            margin-bottom: 20px;
        
    }
    </style>
    </head>

<body>

    <div class="container">
        <div class= "left">
            <img src="{{ asset('img/logovicegamess.gif') }}" alt="Logo ViceGames" class="logo-gif"> 
            <h1>¡Bienvenido a ViceGames!</h1>     
        </div>

        <div class="right">
            <div class="card">
                @if(session('error'))
                <p style="color: red;">{{ session('error') }}</p>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf <!-- Token de seguridad de Laravel -->
            
            <h2 style="text-align:center; margin-bottom: 20px;">Iniciar Sesión</h2>
            <div>
                <label for="email">Correo electrónico:</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    required 
                    value="{{ old('email') }}"
                >
                @error('email')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="password">Contraseña:</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    required
                >
                @error('password')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit">Ingresar</button>
            <!-- enlace a registro -->
        <p>¿No tienes cuenta? <a href="{{ route('registro.create') }}">Regístrate aquí</a></p>
         </form>  
        </div>
    
        </div>
    </div>
</body>
</html>