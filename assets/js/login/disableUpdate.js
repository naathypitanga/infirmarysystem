document.onkeydown = () => {   //Código para desabilitar a atualização da página
  switch (event.keyCode) {
    case 116 :  
      event.returnValue = false;
      event.keyCode = 0;           
      return false;             
    case 82 : 
      if (event.ctrlKey) {  
        event.returnValue = false;
        event.keyCode = 0;             
        return false;
      }
  }
}