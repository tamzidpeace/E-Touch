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
    console.log(id);
    let product_id = id;
    $.ajax({
        url: 'view',
        dataType: 'HTML',
        type: 'GET',
        data: {
            id: product_id
        },
        success: function (result) {
            //console.log(result);
            //$('#productModalContent').html("hello");
        }
    });
}

// end delete product

function edit(id) {
    $('#editProductId').val(id);
    console.log(id);
    $.ajax({
        url: 'make-ajax',
        data: {
            id: id
        },
        dataType: 'JSON',
        type: 'GET',
        success: function (result) {
            $('#editProductName').val(result.name);
            $('#editProductDesc2').text(result.description);
            $('#pModel').val(result.model_number);
            console.log( result);
        }
    });
}


$('.add_field').click(function(){
	
    var input = $('#input_clone');
    var clone = input.clone(true);
    clone.removeAttr ('id');
    clone.val('');
    clone.appendTo('.input_holder'); 

});

$('.remove_field').click(function(){

    if($('.input_holder input:last-child').attr('id') != 'input_clone'){
          $('.input_holder input:last-child').remove();
    }

});
