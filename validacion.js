window.addEventListener('load',()=>{
    const form=document.getElementById('#formulario');
    const email=document.getElementById('email');
    const pass=document.getElementById('pass');
    const passConfirmar=document.getElementById('passConfirmar');
    form.addEventListener("submit",(e)=>{
        e.preventDefault();
        validaCampos();

    })
    const validaCampos=()=>{
        //capturara los valores ingresados
        const usuarioValor= usuario.value.trim(); // trim es usado para eliminar los espacios cuando se ingrese valores
        const emailValor= email.value.trim();
        const passValor= pass.value.trim();



        const passConfirmarValor= passConfirmar.value.trim();
//validando campos de usuario
        if(!usuarioValor){
            validaFalla(usuario,"campo Vacio");
        }else{
            validaOk(usuario);
        }
    }  
    const validaFalla =(input,msje)=>{
        const formControl=input.parentElement;
        const aviso= formControl.querySelector('p');
        aviso.innerText=msje;
        formControl.className ='form-control falla';
    }
    const validaOk=(input,msje)=>{
        const formControl = input.parentElement;
        formControl.className = 'form-control ok';
    }
})