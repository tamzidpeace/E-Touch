// datatable
$('#myTable').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": true,
    "responsive": true,
});
// end datatable

// delete product 

function deleteProduct(id) {
    event.preventDefault();
    $('#pID').val(id);
    //console.log($('#dID').val());
    //swal("Done", "", "success");
    
}

// end delete product