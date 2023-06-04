
// ##################################################
// # Alerta eliminación de registros
// ##################################################
$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
          title: 'Alerta!',
          text: "¿Estás seguro de eliminar el registro?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sí, eliminar ahora!',
          cancelButtonText: 'Cancelar',
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = link
            Swal.fire(
              'Elimiado!',
              'El registro fue eliminado correctamente',
              'success'
            )
          }
        }) 
    });
});

// ##################################################
// # Alertas Órden de Compras 
// ##################################################
$(function(){
  $(document).on('click','#aprobarOrden',function(e){
      e.preventDefault();
      var link = $(this).attr("href");
      Swal.fire({
        title: 'Alerta!',
        text: "¿Estás seguro de aprobar la órden de compra?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, aprobar ahora!',
        cancelButtonText: 'No',
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link
          Swal.fire(
            'Aprobado!',
            'La órden fue aprobada correctamente',
            'success'
          )
        }
      }) 
  });
});

$(function(){
  $(document).on('click','#cancelarOrden',function(e){
      e.preventDefault();
      var link = $(this).attr("href");
      Swal.fire({
        title: 'Alerta!',
        text: "¿Estás seguro de cancelar la órden de compra?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, cancelar ahora!',
        cancelButtonText: 'No',
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link
          Swal.fire(
            'Cancelado!',
            'La órden fue cancelada correctamente',
            'success'
          )
        }
      }) 
  });
});

// ##################################################
// # Fin alertas Órden de Compras 
// ##################################################



