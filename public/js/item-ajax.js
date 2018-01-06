$( document ).ready(function() {
    
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    
   
    
    
    /* UPDATE STOCK */
    function updateStock(data)
    {
        var header = $("#product-stock");
        header.html(data.stock + ' item dalam stock');
    }

    /* Create new Item */
    $(".re-stock").click(function(e){
        e.preventDefault();
        
        var form_action = $("#form-group").find("form").attr("action");
        console.log(url + form_action);
        var inventory_id = $("#form-group").find("input[name='inventory_id']").val();
        var quantity = $("#form-group").find("input[name='quantity']").val();
        var user_id = $("#form-group").find("input[name='user_id']").val();
        

        if(inventory_id != '' && quantity != '' && user_id != ''){
            $.ajax({
                dataType: 'json',
                type:'POST',
                url: url + form_action,
                data:{inventory_id:inventory_id, quantity:quantity, user_id:user_id}
            }).done(function(data){
                updateStock(data['product']);

                if (data.error.id == 0 )
                    toastr.success('Barang pilihan anda berhasil masuk ke keranjang.', 'Berhasil !!!', {timeOut: 5000});
                else
                    toastr.error(data.error.message , 'Gagal !!!', {timeOut: 5000});
            });
        }
        // else{
        //     alert('You are missing nama, nrp or jurusan.')
        // }
    
    });
    
});