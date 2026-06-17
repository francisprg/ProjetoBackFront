





<?php
    if (!isset($_SESSION['leitor'])) {
    header('Location: login.php');
    exit;
    }
?>




<form 
    action="../index.php?acao=atualizarLeitor" 
    method="POST"
    enctype="multipart/form-data"
>   

    <input 
        type="hidden" 
        name="idLeitor" 
        value="<?= $dadosLeitor['idleitor'] ?>"
    >

  
    <input 
        type="hidden" 
        name="fotoAntiga"
        value="<?= $dadosLeitor['fotoleitor'] ?>"
    >

    <label>Foto Atual</label>
    <br>

    <img 
        src="../imagens/<?= $dadosLeitor['fotoleitor'] ?>"
        width="120"
    >

    <br><br>

    <label>Trocar Foto</label>
    <input 
        type="file" 
        name="fotoLeitor"
    >

    <br><br>

    <label>Nome</label>
    <input 
        type="text" 
        name="nomeLeitor"
        value="<?= $dadosLeitor['nomeleitor'] ?>"
    >

    <br><br>

    <label>Sobrenome</label>
    <input 
        type="text" 
        name="sobrenomeLeitor"
        value="<?= $dadosLeitor['sobrenomeleitor'] ?>"
    >

    <br><br>

    <label>Apelido</label>
    <input 
        type="text" 
        name="apelidoLeitor"
        value="<?= $dadosLeitor['apelidoleitor'] ?>"
    >

    <br><br>

    <label>Data de Nascimento</label>
    <input type="date"
      value="<?= $dadosLeitor['datanascleitor'] ?>"
      name="datanascLeitor">
    >
    

    <label>Email</label>
    <input 
        type="email" 
        name="emailLeitor"
        value="<?= $dadosLeitor['emailleitor'] ?>"
    >
    
    <label>Bio</label>

<textarea name="bioLeitor">
<?= $dadosLeitor['bioleitor'] ?>
    </textarea>
    

    <br><br>

    <button type="submit">
        Atualizar
    </button>

</form>