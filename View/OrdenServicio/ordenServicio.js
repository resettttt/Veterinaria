
$(document).ready(function () { 
    listOrdenServicio();
});

var listOrdenServicio = function() {
  var table = $('#tablaOrdenServicio').DataTable({    
    dom: "Bfrtip",
    buttons: [
      {        
        extend: 'excel',
        footer: true,
        title: "Lista Orden Servicio",
        filename: "ListOrdenServicio",      
        text: '<button class="btn btn-success">Exportar a Excel</button>'
      },
    ],  
    destroy: true,
    responsive: true,
    searching: true,
    orderable: false,
    lengthChange: false,
    pageLength: 5,
    autoWidth: true,          
    ajax: {
      url: "ajax.php?module=OrdenServicio&controller=OrdenServicio&function=data",
      method: "post"
    },     
    "columns": [
        { "data": "noOrden" },
        { "data": "fechaOrden" },
        { "data": "Veterinario" },
        { "data": "Mascota" },
        { "data": "Estado" },
        { "data": "buttons" }
    ]
  });
}
