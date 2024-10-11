        <!-- Endereço do Paciente -->
        <div class="container form_bgblue">
          <h3>Endereço do Paciente</h3>
        </div>
        <input type="hidden" name="idEnd" id="idEnd">
        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">CEP:</label>
          <input class="form-control-sm w-100 col" name="cep" id="cep" placeholder="00000-00" onclick="$(this).mask('00000-00')">
        </div>
        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Rua:</label>
          <input class="form-control-sm w-100 col" name="rua" id="rua">
        </div>
        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Número:</label>
          <input class="form-control-sm w-100 col" name="num" id="num">
        </div>
        <div class="form-check form-check-inline ms-2">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox4">
          <label class="form-check-label mx-1" for="inlineCheckbox4">Sem número</label>
        </div>
        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Bairro:</label>
          <input class="form-control-sm w-100 col" name="bair" id="bair">
        </div>
        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Cidade:</label>
          <input class="form-control-sm w-100 col" name="city" id="city">
        </div>
        <div class="formulario_nome d-flex d-inline-flex col mb-3">
          <label class="label_fix">Estado:</label>
          <input class="form-control-sm w-100 col" name="esta" id="esta">
        </div>