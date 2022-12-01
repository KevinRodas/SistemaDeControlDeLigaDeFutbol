if(document.getElementById('sancionado').value) {
    const opcionSelect = document.getElementById('sancionado').value;
    //alert(`Texto: ${opcionSeleccionada.text}. Valor: ${opcionSeleccionada.value}`);
    
    document.getElementById('precio').value=opcionSelect;
    //document.getElementById('partido').innerHTML.toString(opcionSelect);
    //return opcionSelect;
    //window.location.href = "http://localhost/SistemaDeControlDeLigaDeFutbol/Reporte/showcreateReporte" + "?idpart=" + jsVar1;
}