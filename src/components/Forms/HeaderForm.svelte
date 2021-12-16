<script>
import { generateSignatures } from '../../services/signature_service.js';
const static_url = STATIC_URL;
let enterprise = {
  name: '',
  adress: '',
  phone: '',
  mail: '',
  web_site: '',
  logo_url: '',
  slogan: '',
};
let separator = ':';
let inputCSV;
let users = []; // name, position, phone

const loadCSV = () => {
  users = [];
  var file = inputCSV.files[0];
  if(file.type == 'text/csv'){
    var reader = new FileReader();
    reader.onload = (e) => {
      var allTextLines = reader.result.split(/\r\n|\n/);
      var i = 0;
      allTextLines.forEach(element => {
        if(i != 0 && (allTextLines.length - 2) >= i){
          var data = element.split(separator);
          users.push({
            name: data[0],
            email: data[1],
            phone: data[2],
            role: data[3],
          })
        }
        i++;
      });
      users = users;
    }
    reader.readAsText(file, 'UTF-8');
  }else{
    alert('tiene que ser un archivo csv');
  }
};

const downloadOne = (user) => {
  var params = {
    users: [user],
    enterprise: enterprise,
  };
  generateSignatures(params).then((resp) => {
    const url = window.URL.createObjectURL(new Blob([resp.data]));
    const link = document.createElement('a');
    link.href = url;
    link.setAttribute('download', `${resp.headers.randito}.zip`); //or any other extension
    document.body.appendChild(link);
    link.click();
  /*disabled = false;
    messageClass = 'text-success';
    message = 'Mensaje enviado';
    name = '';
    phone = '';
    comment = '';
    email = '';
    inputName.focus();
    setTimeout(() => {message = ''}, 5000);*/
  }).catch((resp => {
    // console.log(resp);
    /*messageClass = 'text-danger';
    message = 'Ocurrió un error al mandar su mensaje';
    setTimeout(() => {message = ''}, 5000);
    disabled = false;*/
  }));
};

const downloadAll = () => {
  var params = {
    users: users,
    enterprise: enterprise,
  };
  generateSignatures(params).then((resp) => {
    const url = window.URL.createObjectURL(new Blob([resp.data]));
    const link = document.createElement('a');
    link.href = url;
    link.setAttribute('download', `${resp.headers.randito}.zip`); //or any other extension
    document.body.appendChild(link);
    link.click();
  /*disabled = false;
    messageClass = 'text-success';
    message = 'Mensaje enviado';
    name = '';
    phone = '';
    comment = '';
    email = '';
    inputName.focus();
    setTimeout(() => {message = ''}, 5000);*/
  }).catch((resp => {
    // console.log(resp);
    /*messageClass = 'text-danger';
    message = 'Ocurrió un error al mandar su mensaje';
    setTimeout(() => {message = ''}, 5000);
    disabled = false;*/
  }));
};

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
      <input type="text" class="form-control" id="webSite" aria-describedby="webSiteHelp" bind:value={enterprise.web_site}>
      <div id="webSiteHelp" class="form-text"></div>
    </div>
    <div class="col-md-3">
      <label for="logoURL" class="form-label">Logo URL</label>
      <input type="text" class="form-control" id="logoURL" aria-describedby="logoURLHelp" bind:value={enterprise.logo_url}>
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
      <input class="form-control" type="file" id="formFile" bind:this={inputCSV}>
    </div>
    <div class="col-md-2">
      <label for="separator" class="form-label">Separador de Celdas</label>
      <input type="text" class="form-control" id="separator" aria-describedby="separatorHelp" bind:value={separator}>
      <div id="separatorHelp" class="form-text"></div>
    </div>
    <div class="col-md-2" style="padding-top:27px;">
      <button type="button" class="btn btn-secondary" on:click="{loadCSV}"><i class="fa fa-upload" aria-hidden="true"></i>Cargar Archivo</button>
    </div>
    <div class="col-md-2" style="padding-top:27px;">
      <button type="button" class="btn btn-success" on:click="{downloadAll}"><i class="fa fa-download" aria-hidden="true"></i>Decargar Firmas</button>
    </div>
  </div>
  {#if users.length > 0}
  <div class="row">
    <div class="col-md-12">
      <br>
      <table class="table table-striped">
        <thead>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Teléfono</th>
          <th>Cargo</th>
          <th>Operaciones</th>
        </thead>
        <tbody>
          {#each users as user}
            <tr>
              <td>{user.name}</td>
              <td>{user.email}</td>
              <td>{user.phone}</td>
              <td>{user.role}</td>
              <td>
                <button type="button" class="bnt-row" on:click="{downloadOne(user)}"><i class="fa fa-download" aria-hidden="true"></i>Decargar</button>
              </td>
            </tr>
          {/each}
        </tbody>
      </table>
    </div>
  </div>
  {/if}
</div>

<style>
.form-control[type=file]:not(:disabled):not([readonly]) {
  border-radius: 0px;
}
.bnt-row{
  border:0px;
  background: transparent;
}
.bnt-row > i{
  margin-right: 5px;
}
</style>
