<section>
  <header>
    <h1>Productos</h1>
  </header>
  <main>
    <table class="full-width">
      <thead>
        <tr>
          <th>Cod</th>
          <th>plugin</th>
          <th>Estado</th>
          <th>homepage</th>
          <th>cdn</th>
          <th class="right">
            <form action="index.php?page=examenform" method="post">
            <input type="hidden" name="yiul_codigo" value="" />
            <input type="hidden" name="xcfrt" value="{{~xcfrt}}" />
            <button type="submit" name="btnIns">Agregar</button>
          </form>
          </th>
        </tr>
      </thead>
      <tbody class="zebra">
        {{foreach productos}}
        <tr>
          <td>{{yiul_codigo}}</td>
          <td>{{yiul_plugin}}</td>
          <td>{{yiul_estado}}</td>
          <td>{{yiul_urlhomepage}}</td>
          <td>{{yiul_urlcdn}}</td>
          <td class="right">
            <form action="index.php?page=examenform" method="post">
              <input type="hidden" name="yiul_codigo" value="{{yiul_codigo}}"/>
              <input type="hidden" name="xcfrt" value="{{~xcfrt}}" />
              <button type="submit" name="btnDsp">Ver</button>
              <button type="submit" name="btnUpd">Editar</button>
              <button type="submit" name="btnDel">Eliminar</button>
            </form>
          </td>
        </tr>
        {{endfor productos}}
      </tbody>
      <tfoot>
        <tr>
          <td colspan="6"> Paginación</td>
        </tr>
      </tfoot>
    </table>
  </main>
</section>
