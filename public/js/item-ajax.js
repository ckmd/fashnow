$( document ).ready(function() {

    var funcs = [];
    var funcsDelete = [];

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    
   
    
    /* Ajax Cart SEction */
    function loopingDelete(i){
        $("#del-item"+i).click(function(e){
            e.preventDefault();
            var qty = $(".input-append").find("input[name='qty']").val();
            var cart_id = $(".input-append").find("input[name='cart-id']").val();

            $.ajax({
                dataType: 'json',
                type: 'DELETE',
                url: url + '/product_summary/' + cart_id,
                data:{cart_id}
            }).done(function(data){
                location.reload();
            }).error(function(xhr){
                console.log(xhr);
            });
        });
    }

    
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
            if (typeof user_id !== 'undefined'){
                var inventory_id = $("#product_id"+i).attr("name");
                var quantity = 1;
                user_id;
                tambahsatustock(inventory_id, quantity, user_id);
            }else{
                toastr.error('silahkan login terlebih dahulu', 'Belum login', {timeOut: 5000});
            }
            
        });
    }

    /* menambahkan satu item*/
    function tambahsatustock(inventory_id, quantity, user_id){
        
        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: url + '/products/' + inventory_id,
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
    if (typeof products_length !== 'undefined'){
        for (var i =0 ; i < products_length;i++) {
            console.log(i);
            funcs[i] = loopingKeranjang.bind(this, i);
        }
        for (var i =0 ; i < products_length;i++) {
            funcs[i]();
        }
    }

    /* ajax looping delete */
    if (typeof cart_count !== 'undefined'){
        for (var i=0;i<cart_count;i++){
            funcsDelete[i] = loopingDelete.bind(this,i);
        }
        for (var i=0;i<cart_count;i++){
            funcsDelete[i]();
        }
    }
    

    $(".loginUser").click(function(e){
        e.preventDefault();
        var form_action = $("#loginForm").find("form").attr("action");

        if ($("#loginForm2").length === 0){
            var email = $("#loginForm").find("input[name='email']").val();
            var password = $("#loginForm").find("input[name='password']").val();
        }else{
            var email = $("#loginForm2").find("input[name='email']").val();
            var password = $("#loginForm2").find("input[name='password']").val();
        }
        
        $.ajax({
            dataType : 'JSON',
            type : 'POST',
            url : form_action,
            data:{email, password}
        }).done(function(data){
            toastr.success('Anda berhasil Login.', 'Berhasil', {timeOut: 5000});
            location.reload();
        }).error(function(xhr){
            console.log(xhr);
            if (xhr.status == 200){
                toastr.success('Anda berhasil Login.', 'Berhasil', {timeOut: 5000});
                location.reload();
            }else{
                var response = JSON.parse(xhr.responseText);
                var errors = response.errors;
                if ($("#errorsjsLogin2").length === 0){
                    var htmerror = $("#errorsjsLogin");
                }else{
                    var htmerror = $("#errorsjsLogin2");
                }

                /* looping jquery*/
                htmerror.html('<ul></ul>');
                $.each(errors, function() {
                    $.each(this, function(k, v) {
                    htmerror.append('<li>' + v + '</li>');
                    });
                });
            }
        });
    });

    $("#registerUser").click(function(e){
        e.preventDefault();

        var form_action = $("#registerForm").find("form").attr("action");
        var name = $("#registerForm").find("input[name='name']").val();
        var email = $("#registerForm").find("input[name='email']").val();;
        var address = $("#registerForm").find("input[name='address']").val();;
        var phone = $("#registerForm").find("input[name='phone']").val();;
        var password = $("#registerForm").find("input[name='password']").val();
        var password_confirmation = $("#registerForm").find("input[name='password_confirmation']").val();

        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: form_action,
            data:{name,email, address, phone, password, password_confirmation}
        }).done(function(data){
            toastr.success('Anda berhasil Daftar.', 'Berhasil', {timeOut: 5000});
            location.reload();
        }).error(function(xhr){
            console.log(xhr);
            if (xhr.status == 200){
                toastr.success('Anda berhasil Daftar.', 'Berhasil', {timeOut: 5000});
                location.reload();
            }else{
                var response = JSON.parse(xhr.responseText);
                var errors = response.errors;
                var htmerror = $("#errorsjs");

                /* looping jquery*/
                htmerror.html('<ul></ul>');
                $.each(errors, function() {
                    $.each(this, function(k, v) {
                    htmerror.append('<li>' + v + '</li>');
                    });
                });
                console.log(response);
            }
        });     
        
    });

    $("#btnSearch").click(function(e){
        e.preventDefault();
        console.log('asdsad')
        var srch = $("#header").find("input[name='search']").val;
        var cat =  $("#header").find("input[name='category']").val;;
        if (srch === '')
        {
            location.href('/category?category='+cat);
        }
        else
        {
            location.href('/category?search='+srch);
        }
    });

});


// var kontainerKeranjang = $("#container-keranjang");
// kontainerKeranjang.innerHTML = "";
// data_keranjang.forEach(element => {
//     var i = 0;
//     kontainerKeranjang.append("<tr>");
//     kontainerKeranjang.append("<tr>");
//     kontainerKeranjang.append('<td> <img width="60" src="{{url("/storage/".' + element.image + ')}}" alt=""/></td>');
//     kontainerKeranjang.append('<td><strong><a href="/products/{{ '+ element.id + ' }}" >{{ '+ element.name+' }}</a></strong><br/>{{ '+ element.detail+' }}</td>')
//     kontainerKeranjang.append('<td>');
//     kontainerKeranjang.append('<div class="input-append">');
//       kontainerKeranjang.append('<input class="span1" style="max-width:34px" placeholder="{{' +  element.quantity + ' }}" value="{{' +  element.quantity + '}}" id="appendedInputButtons" name="qty" size="16" type="text">');
//       kontainerKeranjang.append('<input type="hidden" name="cart-id" value="{{' +  element.cart_id + '}}">');

//   kontainerKeranjang.append('<button class="btn btn-danger" type="button" id="del-item'+ i +'"><i class="icon-remove icon-white"></i></button>				</div>');
//     kontainerKeranjang.append('</td>')
//     kontainerKeranjang.append('<td>Rp {{ ' + element.price*element.quantity + ' }}</td>');
//     kontainerKeranjang.append('<td>RP {{ '+ element.price*element.quantity*10/100 + '}}</td>');
//     kontainerKeranjang.append('<td>Rp {{ ' + element.price*element.quantity + element.price*element.quantity*10/100 + ' }}</td>');
//   kontainerKeranjang.append('</tr>');
//   i++;
// });
// var totalTax = 0;
// var totalPrice = 0;
// // console.log(data[0]);