<h1>{{modeDsc}}</h1>
<section class="row">
<form action="index.php?page=examenform" method="post" class="col-8 col-offset-2">
  {{if hasErrors}}
    <section class="row">
      <ul class="error">
        {{foreach errores}}
          <li>{{this}}</li>
        {{endfor errores}}
      </ul>
    </section>
  {{endif hasErrors}}
  <input type="hidden" name="mode" value="{{mode}}"/>
  <input type="hidden" name="xcfrt" value="{{xcfrt}}" />
  <input type="hidden" name="btnConfirmar" value="Confirmar" />
  {{if showidsolicitud}}
  <fieldset class="row">
    <label class="col-5" for="yiul_codigo">Código de Solicitud</label>
    <input type="text" name="yiul_codigo" id="yiul_codigo" readonly value="{{yiul_codigo}}" class="col-7" />
  </fieldset>
  {{endif showidsolicitud}}
  <fieldset class="row">
    <label class="col-5" for="dscplugin">Plugin</label>
    <input type="text" name="dscplugin" id="dscplugin" {{readonly}} value="{{yiul_plugin}}" class="col-7" />
  </fieldset>


    <fieldset class="row">
      <label class="col-5" for="dscestado">Estado</label>
      <select name="dscestado" id="dscestado" class="col-7" {{selectDisable}} {{readonly}} >
        {{foreach estadosolicitud}}
          <option value="{{cod}}" {{selected}}>{{dsc}}</option>
        {{endfor estadosolicitud}}
      </select>
    </fieldset>

  <fieldset class="row">
    <label class="col-5" for="dschome">Home Page</label>
    <input type="text" name="dschome" id="dschome" {{readonly}} value="{{yiul_urlhomepage}}" class="col-7" />
  </fieldset>


<fieldset class="row">
  <label class="col-5" for="dsccdn">Url Cdn</label>
  <input type="text" name="dsccdn" id="dsccdn" {{readonly}} value="{{yiul_urlcdn}}" class="col-7" />
</fieldset>

  <fieldset class="row">
    <div class="right">
      {{if showBtnConfirmar}}
      <button type="button" id="btnConfirmar" >Confirmar</button>
      &nbsp;
      {{endif showBtnConfirmar}}
      <button type="button" id="btnCancelar">Cancelar</button>
    </div>
  </fieldset>
  <!--
   <td>{{idmoda}}</td>
    <td>{{dscmoda}}</td>
    <td>{{prcmoda}}</td>
    <td>{{ivamoda}}</td>
    <td>{{estmoda}}</td>
   -->
</form>
</section>
<script>
  $().ready(function(){
    $("#btnCancelar").click(function(e){
      e.preventDefault();
      e.stopPropagation();
      location.assign("index.php?page=examenlist");
    });
    $("#btnConfirmar").click(function(e){
      e.preventDefault();
      e.stopPropagation();
      /*Aqui deberia hacer validación de datos*/
      document.forms[0].submit();
    });
  });
</script>
