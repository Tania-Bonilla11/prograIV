/**
 * @author CodeArt <usis055618@ugb.edu.sv>
 * @file app.js -> Mostrar los formularios de los formularios
 */

 /**Para llamar a los forms de carpetas vistas dependiendo selceccion del navbar */
function init() {
    
    $("[class*='mostrar']").click(function (e) {
        let modulo = $(this).data("modulo"),
            form = $(this).data("form");

        $(`#vista-${form}`).load(`public/vistas/${modulo}/${form}.html`, function () {
            $(`#btn-close-${form}`).click(() => {/**cerrar formulario */
                $(`#vista-${form}`).html("");
            });
            init();
        }).draggable();
    });
}
init();
/**formulario ya mostrado */

