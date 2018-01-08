$( document ).ready(function() {

    var funcs = [];

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

    /* Tombol tambah ke keranjang*/
    function loopingKeranjang(i){
        $(".tambah-keranjang"+i).click(function(e){
            e.preventDefault();

            var inventory_id = $("#product_id"+i).attr("name");
            var quantity = 1;
            user_id;
            tambahsatustock(inventory_id, quantity, user_id);
            
        });
    }

    /* menambahkan satu item*/
    function tambahsatustock(inventory_id, quantity, user_id){
        
        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: url + '/products',
            data:{inventory_id:inventory_id, quantity:quantity, user_id:user_id}
        }).done(function(data){
            console.log(data);
            if (data.error.id == 0 )
                toastr.success('Barang pilihan anda berhasil masuk ke keranjang.', 'Berhasil', {timeOut: 5000});
            else
                toastr.error(data.error.message , 'Gagal', {timeOut: 5000});
        }).error(function(xhr){
            console.log(xhr);
        });
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

    /* ajax asynchronoues looping */
    

    for (var i =0 ; i < products_length;i++) {
        funcs[i] = loopingKeranjang.bind(this, i);
    }
    for (var i =0 ; i < products_length;i++) {
        funcs[i]();
    }
    
});