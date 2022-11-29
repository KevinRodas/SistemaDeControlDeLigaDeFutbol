const $select = document.querySelector("#arbitro");

document.body.onload = addElement;

function addElement() {
  // create a new div element
  const newDiv = document.createElement("div");

  // and give it some content
  const newContent = document.createTextNode("Hi there and greetings!");

  // add the text node to the newly created div
  newDiv.appendChild(newContent);

  // add the newly created element and its content into the DOM
  const currentDiv = document.getElementById("div1");
}
function ver() {
    const indice = $select.selectedIndex;
    if(indice === -1) return; // Esto es cuando no hay elementos
    const opcionSeleccionada = $select.options[indice];
    
    if(document.getElementById('arbitro').value) {
        const opcionSelect = document.getElementById('arbitro').value;
        //alert(`Texto: ${opcionSeleccionada.text}. Valor: ${opcionSeleccionada.value}`);
        
        document.getElementById('partido').value=opcionSelect;
        //document.getElementById('partido').innerHTML.toString(opcionSelect);
        //return opcionSelect;
        //window.location.href = "http://localhost/SistemaDeControlDeLigaDeFutbol/Reporte/showcreateReporte" + "?idpart=" + jsVar1;
    }
    

    
}
