$( document ).ready(function() {
    
    var page = 1;
    var current_page = 1;
    var total_page = 0;
    var is_ajax_fire = 0;
    
    tampil();
    
    /* manage data list */
    function tampil() {
        
        $.ajax({
            dataType: 'json',
            url: url+'api/getData.php',
            data: {page:page}
        }).done(function(data){
            total_page = Math.ceil(data.total/10);
            current_page = page;
            
            $('#pagination').twbsPagination({
                totalPages: total_page,
                visiblePages: current_page,
                onPageClick: function (event, pageL) {
                    page = pageL;
                    if(is_ajax_fire != 0){
                      getPageData();
                    }
                }
            });
    
            manageRow(data.data);
            is_ajax_fire = 1;
    
        });
    
    }
    
    /* Get Page Data*/
    function getPageData() {
        $.ajax({
            dataType: 'json',
            url: url+'api/getData.php',
            data: {page:page}
        }).done(function(data){
            manageRow(data.data);
        });
    }
    
    /* Add new Item table row */
    function manageRow(data) {
        var	rows = '';
        $.each( data, function( key, value ) {
              rows = rows + '<tr>';
              rows = rows + '<td>'+value.nama+'</td>';
              rows = rows + '<td>'+value.nrp+'</td>';
              rows = rows + '<td>'+value.jurusan+'</td>';
              rows = rows + '<td data-id="'+value.id+'">';
            rows = rows + '<button data-toggle="modal" data-target="#edit-item" class="btn btn-primary edit-item">Edit</button> ';
            rows = rows + '<button class="btn btn-danger remove-item">Delete</button>';
            rows = rows + '</td>';
              rows = rows + '</tr>';
        });
    
        $("tbody").html(rows);
    }
    
    /* Create new Item */
    $(".crud-submit").click(function(e){
        e.preventDefault();
        var form_action = $("#create-item").find("form").attr("action");
        var nama = $("#create-item").find("input[name='nama']").val();
        var nrp = $("#create-item").find("textarea[name='nrp']").val();
        var jurusan = $("#create-item").find("textarea[name='jurusan']").val();
        

        if(nama != '' && nrp != '' && jurusan != ''){
            $.ajax({
                dataType: 'json',
                type:'POST',
                url: url + form_action,
                data:{nama:nama, nrp:nrp, jurusan:jurusan}
            }).done(function(data){
                $("#create-item").find("input[name='nama']").val('');
                $("#create-item").find("textarea[name='nrp']").val('');
                $("#create-item").find("textarea[name='jurusan']").val('');
                getPageData();
                $(".modal").modal('hide');
                toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
            });
        }else{
            alert('You are missing nama, nrp or jurusan.')
        }
    
    });
    
    /* Remove Item */
    $("body").on("click",".remove-item",function(){
        var id = $(this).parent("td").data('id');
        var c_obj = $(this).parents("tr");
    
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: url + 'api/delete.php',
            data:{id:id}
        }).done(function(data){
            c_obj.remove();
            toastr.success('Item Deleted Successfully.', 'Success Alert', {timeOut: 5000});
            getPageData();
        });
    
    });
    
    /* Edit Item */
    $("body").on("click",".edit-item",function(){
    
        var id = $(this).parent("td").data('id');
        var nama = $(this).parent("td").prev("td").prev("td").text();
        var nrp = $(this).parent("td").prev("td").prev("td").text();
        var jurusan = $(this).parent("td").prev("td").text();
        
        console.log(nama);

        $("#edit-item").find("input[name='nama']").val(nama);
        $("#edit-item").find("textarea[name='nrp']").val(nrp);
        $("#edit-item").find("textarea[name='jurusan']").val(jurusan);
        $("#edit-item").find(".edit-id").val(id);
    
    });
    
    /* Updated new Item */
    $(".crud-submit-edit").click(function(e){
    
        e.preventDefault();
        var form_action = $("#edit-item").find("form").attr("action");
        var nama = $("#edit-item").find("input[name='nama']").val();
    
        var nrp = $("#edit-item").find("textarea[name='nrp']").val();
        var jurusan = $("#edit-item").find("textarea[name='jurusan']").val();
        var id = $("#edit-item").find(".edit-id").val();
    
        if(nama != '' && nrp != '' && jurusan != ''){
            $.ajax({
                dataType: 'json',
                type:'POST',
                url: url + form_action,
                data:{nama:nama, nrp:nrp,jurusan:jurusan, id:id}
            }).done(function(data){
                getPageData();
                $(".modal").modal('hide');
                toastr.success('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});
            });
        }else{
            alert('You are missing title or description.')
        }
    
    });
    });