$(document).ready(function () { 
    
    listResultadoOrden();
});

var listResultadoOrden = function() {
  
  var table = $('#tablaResultadoOrden').DataTable({    
    dom: "Bfrtip",
    buttons: [
      {        
        extend: 'excel',
        footer: true,
        title: "Lista Resultado Orden",
        filename: "ListDepto",      
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
          url: "ajax.php?module=ResultadoOrden&controller=ResultadoOrden&function=data",
          method: "post"
      },     
      "columns": [
          { "data": "noOrden" },
          { "data": "fechaOrden" },
          { "data": "Veterinario" },
          { "data": "Mascota" },
          { "data": "buttons" }
      ]
  });
 
}
