<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Envio de arquivo de log</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <style>
        body{
            background-color: #dadada;
            font-family: 'Roboto', sans-serif;
        }
        ul,li{
            list-style: none;
            padding: 0;
            margin: 0;
        }
        form{
            display: block;
            width: 400px;
            margin: 100px auto 0;
            background: #7c7b7b;
            text-align: center;
            padding: 20px;
            border-radius: 20px;            
        }
        label{
            color: white;
            display: block;
            margin-bottom: 20px;
            text-transform: uppercase;
        }
        p{
            color: white;
        }
        button{
            display: block;
            background-color: #636262;
            height: 40px;
            cursor: pointer;
            width: 100px;
            font-size: 18px;
            margin: 20px auto 0;
            color: #e6a62b;
        }
    </style>
</head>
<body>
    <form action="parser.php" method="post" enctype="multipart/form-data" >
        <?php if(@$_GET['feedback']){ ?><p><small><?php echo $_GET['feedback']; ?></small></p><?php }?>
        <ul>
            <li>
                <label for="log_file">Selecione o arquivo de log</label>
                <input required type="file" id="log_file" name="log_file">
            </li>
            <li>
                <button>Enviar</button>
            </li>
        </ul>        
    </form>
</body>
</html>