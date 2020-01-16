<!DOCTYPE html>
<html lang="es-ES"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- CSS propio -->
    <link rel="stylesheet" href="css/estilos.css">
    <script src="js/jquery.js"></script>
    <script src="js/funciones.js"></script>
    <title>Agenda de personas Ajax con PHP y MySQL</title>
</head>

<body>
    <button id="cargar" class="col-6 offset-3 btn btn-dark my-4">Click aquí para cargar el listado de clientes</button>
    <div id="divAdd" class="form-row w-100 mx-auto">
        <input id="nombre" name="nombre" type="text" placeholder="Nombre" class="col form-control">
        <input id="apellidos" name="apellidos" type="text" placeholder="Apellidos" class="col form-control">
        <input id="direccion" name="direccion" type="text" placeholder="Dirección" class="col form-control">
        <input id="telefono" name="telefono" type="text" placeholder="Teléfono" class="col form-control">
        <input id="edad" name="edad" type="text" placeholder="Edad" class="col form-control">
        <input id="altura" name="altura" type="text" placeholder="Altura" class="col form-control">
    </div>
    <button id="insertar" class="col-4 offset-4 btn btn-dark my-2">Añadir cliente</button>
    <div id="mensajeEmergente" class="alert alert-success" role="alert">
        Usuario creado correctamente.
        <button id="close" type="button" class="close" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <table id="tabla" class="table table-striped">
        <tbody><tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Dirección</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Edad</th>
            <th scope="col">Altura</th>
        </tr>
    <tr class="fila"><td>1</td><td>Manuel Jesús</td><td>López de la Rosa</td><td>C/Juan Bautista Nº 3</td><td>658954875</td><td>32</td><td>1.80</td></tr><tr class="fila"><td>2</td><td>María</td><td>Manzano Cabezas</td><td>C/Arco del triunfo Nº 7</td><td>695001002</td><td>19</td><td>1.99</td></tr><tr class="fila"><td>3</td><td>Federico</td><td>Garcia Lorca</td><td>C/Lorca, 45</td><td>658142534</td><td>58</td><td>1.70</td></tr><tr class="fila"><td>4</td><td>Juana</td><td>Pérez Rozas</td><td>Avda. Luarcato nº22</td><td>888111223</td><td>22</td><td>1.77</td></tr><tr class="fila"><td>5</td><td>antonio</td><td>lopez</td><td>c/mayor</td><td>123456</td><td>25</td><td>1.80</td></tr><tr class="fila"><td>6</td><td>Mario</td><td>Villaescusa</td><td>C/Río Turia, 4C</td><td>625891526</td><td>36</td><td>1.87</td></tr></tbody></table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="./js/jquery-3.4.1.slim.min.js"></script> -->
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
<div style="text-align: right;position: fixed;z-index:9999999;bottom: 0;width: auto;right: 1%;cursor: pointer;line-height: 0;display:block !important;"><a title="Hosted on free web hosting 000webhost.com. Host your own website for FREE." target="_blank" href="https://www.000webhost.com/?utm_source=000webhostapp&amp;utm_campaign=000_logo&amp;utm_medium=website&amp;utm_content=footer_img"><img src="personas_files/footer-powered-by-000webhost-white2.webp" alt="www.000webhost.com"></a></div><script>function getCookie(t){for(var e=t+"=",n=decodeURIComponent(document.cookie).split(";"),o=0;o<n.length;o++){for(var i=n[o];" "==i.charAt(0);)i=i.substring(1);if(0==i.indexOf(e))return i.substring(e.length,i.length)}return""}getCookie("hostinger")&&(document.cookie="hostinger=;expires=Thu, 01 Jan 1970 00:00:01 GMT;",location.reload());var wordpressAdminBody=document.getElementsByClassName("wp-admin")[0],notification=document.getElementsByClassName("notice notice-success is-dismissible"),hostingerLogo=document.getElementsByClassName("hlogo"),mainContent=document.getElementsByClassName("notice_content")[0];if(null!=wordpressAdminBody&&notification.length>0&&null!=mainContent){var googleFont=document.createElement("link");googleFontHref=document.createAttribute("href"),googleFontRel=document.createAttribute("rel"),googleFontHref.value="https://fonts.googleapis.com/css?family=Roboto:300,400,600",googleFontRel.value="stylesheet",googleFont.setAttributeNode(googleFontHref),googleFont.setAttributeNode(googleFontRel);var css="@media only screen and (max-width: 576px) {#main_content {max-width: 320px !important;} #main_content h1 {font-size: 30px !important;} #main_content h2 {font-size: 40px !important; margin: 20px 0 !important;} #main_content p {font-size: 14px !important;} #main_content .content-wrapper {text-align: center !important;}} @media only screen and (max-width: 781px) {#main_content {margin: auto; justify-content: center; max-width: 445px;}} @media only screen and (max-width: 1325px) {.web-hosting-90-off-image-wrapper {position: absolute; max-width: 95% !important;} .notice_content {justify-content: center;} .web-hosting-90-off-image {opacity: 0.3;}} @media only screen and (min-width: 769px) {.notice_content {justify-content: space-between;} #main_content {margin-left: 5%; max-width: 445px;} .web-hosting-90-off-image-wrapper {position: absolute; right: 0; display: flex; padding: 0 5%}} .web-hosting-90-off-image {max-width: 90%; margin-top: 20px;} .content-wrapper {z-index: 5} .notice_content {display: flex; align-items: center;} * {-webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;} .upgrade_button_red_sale{box-shadow: 0 2px 4px 0 rgba(255, 69, 70, 0.2); max-width: 350px; border: 0; border-radius: 3px; background-color: #ff4546 !important; padding: 15px 55px !important;  margin-bottom: 48px; font-family: 'Roboto', sans-serif; font-size: 16px; font-weight: 600; color: #ffffff;} .upgrade_button_red_sale:hover{color: #ffffff !important; background: #d10303 !important;}",style=document.createElement("style"),sheet=window.document.styleSheets[0];style.styleSheet?style.styleSheet.cssText=css:style.appendChild(document.createTextNode(css)),document.getElementsByTagName("head")[0].appendChild(style),document.getElementsByTagName("head")[0].appendChild(googleFont);var button=document.getElementsByClassName("upgrade_button_red")[0],link=button.parentElement;link.setAttribute("href","https://www.hostinger.com/hosting-starter-offer?utm_source=000webhost&utm_medium=panel&utm_campaign=000-wp"),link.innerHTML='<button class="upgrade_button_red_sale">TRANSFER NOW</button>',(notification=notification[0]).setAttribute("style","padding-bottom: 0; padding-top: 5px; background: url(https://cdn.000webhost.com/000webhost/promotions/cyber-monday-2019-bg.jpg); background-size: cover; background-repeat: no-repeat; color: #ffffff; border-color: #ff123a; border-width: 8px;"),notification.className="notice notice-error is-dismissible";var mainContentHolder=document.getElementById("main_content");mainContentHolder.setAttribute("style","padding: 0;"),hostingerLogo[0].remove();var h1Tag=notification.getElementsByTagName("H1")[0];h1Tag.className="000-h1",h1Tag.innerHTML="Cyber Monday Sale",h1Tag.setAttribute("style",'color: white;  margin-top: 48px; font-family: "Roboto", sans-serif; font-size: 48px; font-weight: 600;');var h2Tag=document.createElement("H2");h2Tag.innerHTML="Get 90% Off!",h2Tag.setAttribute("style",'color: white; margin: 45px 0; font-family: "Roboto", sans-serif; font-size: 80px; font-weight: 600;'),h1Tag.parentNode.insertBefore(h2Tag,h1Tag.nextSibling);var paragraph=notification.getElementsByTagName("p")[0];paragraph.innerHTML="Don’t miss the opportunity to enjoy up to <strong>4x WordPress Speed, Free SSL and all premium features</strong> available for a fraction of the price!",paragraph.setAttribute("style",'font-family: "Roboto", sans-serif; font-size: 18px; font-weight: 300;');var list=notification.getElementsByTagName("UL")[0];list.remove();var org_html=mainContent.innerHTML,new_html='<div class="content-wrapper">'+mainContent.innerHTML+'</div><div class="web-hosting-90-off-image-wrapper"><img class="web-hosting-90-off-image" src="https://cdn.000webhost.com/000webhost/promotions/cyber-monday-2019-img.png"></div>';mainContent.innerHTML=new_html;var saleImage=mainContent.getElementsByClassName("web-hosting-90-off-image")[0]}</script>

</body></html>