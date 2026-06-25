let fotoLeitor = document.getElementById("foto-leitor");
let fotoLeitorInput = document.getElementById("foto-leitor-input");



fotoLeitorInput.onchange = function() {

    fotoLeitor.src = URL.createObjectURL(fotoLeitorInput.files[0]);


}