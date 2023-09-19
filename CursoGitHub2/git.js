/**
 * capturar los textos
 */

const depositoTexto = document.getElementById('depositoActual');
        retiroTexto = document.getElementById('retiroActual');
        balanceTexto = document.getElementById('balanceActual');

/**
 * capturar los input
 */

    inputDeposito = document.getElementById('depositoInput');
    inputRetiro = document.getElementById('retiroInput');

/**
 * capturar botones
 */

    btnDeposito = document.getElementById('calcularDeposito');
    btnRetiso = document.getElementById('calcularRetiro');

/**
 * agregar eventos deposito
 */

    btnDeposito.addEventListener('click',(event) => {
        const valorDeposito = inputDeposito.value

        const totalDeposito = Number(depositoTexto.innerText)+Number(valorDeposito)
        const totalBalance = Number(balanceTexto.innerText)+Number(valorDeposito)
        depositoTexto.innerHTML = totalDeposito
        balanceTexto.innerHTML = totalBalance

        inputDeposito.value = ''
    })

/**
 * evento de retiro
 */

    btnRetiro.addEventListener('click',(event)=>{
        const valorRetiro = inputRetiro.value
        if (valorRetiro == 0){

            alert("No tienes nda que retirar")
            return

        }

        if (Number(valorRetiro) > Number (balanceTexto.innerText)) {

            alert("No hay dinero suficiente")
            return
        }

        alert("Retiro Exitoso")

        const totalDeposito = Number(depositoTexto.innerText)+Number(valorDeposito)
        const totalBalance = Number(balanceTexto.innerText)+Number(valorDeposito)
        
        depositoTexto.innerHTML = totalDeposito
        balanceTexto.innerHTML = totalBalance

        inputRetiro.value = ''
})