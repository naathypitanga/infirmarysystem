<script>
    function maskl(e, id, maskl) {
        var tecla = (window.event) ? event.keyCode : e.which;
        if ((tecla > 47 && tecla < 58)) {
            mascara(id, maskl);
            return true;
        } else {
            if (tecla == 8 || tecla == 0) {
                mascara(id, maskl);
                return true;
            } else return false;
        }
    }

    function mascara(id, maskl) {
        var i = id.value.length;
        var carac = maskl.substring(i, i + 1);
        var prox_char = maskl.substring(i + 1, i + 2);
        if (i == 0 && carac != '#') {
            insereCaracter(id, carac);
            if (prox_char != '#') insereCaracter(id, prox_char);
        } else if (carac != '#') {
            insereCaracter(id, carac);
            if (prox_char != '#') insereCaracter(id, prox_char);
        }

        function insereCaracter(id, char) {
            id.value += char;
        }
    }
</script>
<?php

function phoneMask($placeholder = '(DDD) 00000-0000')
{
    $phoneMask = 'onkeypress=' . '"' . "return maskl(event, this," . " '(##) #####-####')" . '" maxlength="15" placeholder="' . $placeholder . '"';
    return $phoneMask;
}

function cpfMask($placeholder = '000.000.000-00')
{
    $CPFmask = 'onkeypress=' . '"' . "return maskl(event, this," . " '###.###.###-##')" . '" maxlength="14" placeholder="' . $placeholder . '"';
    return $CPFmask;
}

function cepMask($placeholder = '00000-000')
{
    $CEPmask = 'onkeypress=' . '"' . "return maskl(event, this," . " '#####-###')" . '" maxlength="9" placeholder="' . $placeholder . '"';
    return $CEPmask;
}

function cnsMask($placeholder = '000.000.000.000')
{
    $CNSmask = 'onkeypress=' . '"' . "return maskl(event, this," . " '###.###.###.###')" . '" maxlength="15" placeholder="' . $placeholder . '"';
    return $CNSmask;
}

function customNumberMask($maskl = '', $placeholder = '')
{
    $CEPmask = 'onkeypress=' . '"' . "return maskl(event, this," . " '$maskl')" . '" maxlength="9" placeholder="' . $placeholder . '"';
    return $CEPmask;
}



?>