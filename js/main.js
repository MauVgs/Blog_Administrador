function evaluar(){
    let titulo = document.getElementById('titulo');
    let introduccion = document.getElementById('introduccion');
    let imagen = document.getElementById('imagen');
    let categoria = document.getElementById('categoria');
    let contenido = document.getElementById('contenido');
    let autor = document.getElementById('autor');
    let fecha = document.getElementById('fecha');
    if(titulo === '' || introduccion === '' || imagen === '' || categoria === '' || contenido === '' || autor === '' || fecha === ''){
        alert('Completa el formulario');
        return false;
    }
    else{
        return true
    }
}