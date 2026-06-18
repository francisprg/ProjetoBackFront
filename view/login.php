<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>

<body>


    <?php if (!empty($erros)): ?>
        <div class="erro">
            <?php foreach ($erros as $erro): ?>
                <p><?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8'); ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>



    <section class="containerpai">
        <div class="card loginactive">
            <div class="esquerda">
                <div class="formlogin">
                    <h2>Fazer login</h2>
                    <form action="../index.php?acao=login" method="POST">
                        <input type="text" placeholder="Digite o seu email" name="email">
                        <input type="text" placeholder="Digite a sua senha" name="senha">
                        <button >Entrar</button>
                    </form>
                </div>
                <div class="facalogin">
                <h2>Ja tem uma conta?</h2>
                <p>Lorem ipsum dolor sit amet consectetur</p>
                <button class="loginButton">Faça Login</button>
                </div>
            </div>
            <div class="direita">
                <div class="formcadastro">
                    <h2>Realizar Cadastro</h2>
                    <form action="../index.php?acao=cadastrar" method="POST" enctype="multipart/form-data">
                    
                        <input type="file" name="fotoLeitor" placeholder="URL ou nome da foto" accept=".jpg,.jpeg,.bmp,.png">
                   
                  
                        <input type="text" name="nomeLeitor" required>
              

                
                        <input type="text" name="sobrenomeLeitor" required>
               

                   
                        <input type="text" name="apelidoLeitor">
               

                     
                 
                        <input type="email" name="emailLeitor" required>
        

                      
                   
                        <input type="password" name="senhaLeitor" required>
               


                     
                        <input type="date" name="datanascLeitor">
            
                        <button  type="submit">
                            Cadastrar
                        </button>
                    </form>
                </div>
                <div class="facacadastro">
                    <h2>Nao tem uma conta?</h2>
                    <p>dasdasdasdasdasdasfasdasasdasdasdasd</p>
                    <button class="cadastroButton" >Cadastre-se</button>
                </div>
            </div>
        </div>
    </section>

    <a href="/view/cadastro.php"><button>Realizar Cadastro</button></a>
        
    <script src="/public/js/main.js"></script>
</body>

</html>