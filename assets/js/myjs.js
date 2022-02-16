  // Flashdata
  const flashData = $('.flash-data').data('flashdata');
  if (flashData) {
      Swal.fire({
      title: 'Success',
      text: 'Berhasil ' + flashData,
      icon: 'success'
      });
  }

   // Flashdata
   const error = $('.error').data('error');
   if (error) {
       Swal.fire({
       title: 'Error!',
       text:  error,
       icon: 'error'
       });
   }

   var x = $('#mytabel').DataTable({
    "responsive" : true,
    "ordering": false,
    "lengthMenu": [
        [5, 10, 25, 40],
        [5, 10, 25, 40]
    ],
    "order": [[ 1, 'asc' ]],
});
  x.on( 'order.dt search.dt', function () {
    x.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
    } );
} ).draw();