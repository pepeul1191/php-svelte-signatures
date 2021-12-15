<script>
const static_url = STATIC_URL;
let enterprise = {
  name: '',
  adress: '',
  phone: '',
  mail: '',
  webSite: '',
  logoURL: '',
  slogan: '',
};
let separator = ':';
let users = []; // name, position, phone
</script>

<div class="container">
  <div class="row">
    <div class="mb-12">
      <br><h6>Datos generales</h6>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <label for="name" class="form-label">Nombre</label>
      <input type="text" class="form-control" id="name" aria-describedby="nameHelp" bind:value={enterprise.name}>
      <div id="nameHelp" class="form-text"></div>
    </div>
    <div class="col-md-3">
      <label for="webSite" class="form-label">Sitio Web</label>
      <input type="text" class="form-control" id="webSite" aria-describedby="webSiteHelp" bind:value={enterprise.webSite}>
      <div id="webSiteHelp" class="form-text"></div>
    </div>
    <div class="col-md-3">
      <label for="logoURL" class="form-label">Logo URL</label>
      <input type="text" class="form-control" id="logoURL" aria-describedby="logoURLHelp" bind:value={enterprise.logoURL}>
      <div id="logoURLHelp" class="form-text"></div>
    </div>
    <div class="col-md-3">
      <label for="mail" class="form-label">Correo</label>
      <input type="text" class="form-control" id="mail" aria-describedby="mailHelp" bind:value={enterprise.mail}>
      <div id="mailHelp" class="form-text"></div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-2">
      <label for="phone" class="form-label">Teléfono</label>
      <input type="text" class="form-control" id="phone" aria-describedby="phoneHelp" bind:value={enterprise.phone}>
      <div id="phoneHelp" class="form-text"></div>
    </div>
    <div class="col-md-5">
      <label for="adress" class="form-label">Dirección</label>
      <input type="text" class="form-control" id="adress" aria-describedby="adressHelp" bind:value={enterprise.adress}>
      <div id="adressHelp" class="form-text"></div>
    </div>
    <div class="col-md-5">
      <label for="slogan" class="form-label">Eslogan</label>
      <input type="text" class="form-control" id="slogan" aria-describedby="sloganHelp" bind:value={enterprise.slogan}>
      <div id="sloganHelp" class="form-text"></div>
    </div>
  </div>
  <div class="row">
    <div class="mb-12">
      <br><h6>Usuarios</h6>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <label for="formFile" class="form-label">Selecionar Archivo CSV</label>
      <input class="form-control" type="file" id="formFile">
    </div>
    <div class="col-md-2">
      <label for="separator" class="form-label">Separador de Celdas</label>
      <input type="text" class="form-control" id="separator" aria-describedby="separatorHelp" bind:value={separator}>
      <div id="separatorHelp" class="form-text"></div>
    </div>
    <div class="col-md-3" style="padding-top:27px;">
      <button type="button" class="btn btn-secondary"><i class="fa fa-upload" aria-hidden="true"></i>
        Cargar Archivo</button>
    </div>
  </div>
</div>

<style>
.form-control[type=file]:not(:disabled):not([readonly]) {
  border-radius: 0px;
}
</style>
