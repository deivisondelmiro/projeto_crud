<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Certificado de {{ $curso->title_curso }}</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            padding: 40px;
        }

        .certificado {
            background: white;
            border: 8px solid;
            border-image: linear-gradient(90deg, #4F46E5, #7C3AED) 1;
            padding: 50px;
            text-align: center;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            color: #4F46E5;
            margin-bottom: 20px;
        }

        .logo_assinatura {
            max-width: 100px;
            width: 100px;
        }

        h1 {
            color: #4F46E5;
            font-size: 42px;
            margin-bottom: 20px;
        }

        .texto {
            font-size: 18px;
            color: #555;
        }

        .nome {
            font-size: 34px;
            font-weight: bold;
            margin: 20px 0;
            color: #111;
        }

        .curso {
            font-size: 26px;
            color: #7C3AED;
            margin-bottom: 20px;
        }

        .info {
            margin-top: 30px;
            font-size: 16px;
            color: #666;
        }

        .rodape {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            color: #777;
        }

        .assinatura {
            text-align: center;
        }

        .linha {
            border-top: 1px solid #999;
            width: 200px;
            margin: 10px auto 0;
        }
    </style>
</head>

<body>

    <div class="certificado">

        <div class="logo">
            <img src="{{ public_path('css/img/logo_course_hub_dark.svg') }}" style="max-width: 150px;">
        </div>

        <h1>Certificado de Conclusão</h1>

        <p class="texto">Certificamos que</p>

        <div class="nome">
            {{ $usuario->name }}
        </div>

        <p class="texto">Concluiu com sucesso o curso intitulado</p>

        <div class="curso">
            {{ $curso->title_curso }}
        </div>

        <div class="info">
            Carga horária: {{ $curso->duration }}
        </div>

        <div class="info">
            Emitido em {{ date('d/m/Y') }}
        </div>

        <div class="rodape">

            <div class="assinatura">
                <img class="logo_assinatura" src="{{ public_path('css/img/logo_course_hub_dark.svg') }}" style="max-width: 150px;">
                <div class="linha"></div>
            </div>
        </div>

    </div>

</body>
</html>