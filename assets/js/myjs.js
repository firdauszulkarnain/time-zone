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