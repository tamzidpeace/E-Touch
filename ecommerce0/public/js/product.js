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

function view(id) {
    //console.log(id);
    let product_id = id;
    $.ajax({
        url: 'view',
        dataType: 'HTML',
        type: 'GET',
        data : {id: product_id},
        success: function(result) {
            //console.log(result);
            //$('#productModalContent').html("hello");
        }
    });
}

// end delete product

function edit(id) {    
    $('#editProductId').val(id);
    //console.log($('#editProductId').val());
    $.ajax({
        url : 'make-ajax',
        data : {id:id},
        dataType : 'JSON',
        type : 'GET',
        success : function(result) {            
            $('#editProductName').val(result.name);
            $('#editProductDesc2').text(result.description);
            //console.log( $('#editProductDesc2').text());
        }
    });
}