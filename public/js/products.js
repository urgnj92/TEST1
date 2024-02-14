// 検索処理
$(document).ready(function() {
    $("#search").on('click', function(event) {
        event.preventDefault();
        
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

            // 入力値の取得
            var keyword = $('#keyword').val();
            var company_id = $('#company_name').val();
            var min_price = $('#min_price').val();
            var max_price = $('#max_price').val();
            var min_stock = $('#min_stock').val();
            var max_stock = $('#max_stock').val();
        
        $.ajax({
            type: "GET",
            url: 'index',
            data: {
                keyword: keyword,
                company_id: company_id,
                min_price: min_price,
                max_price: max_price,
                min_stock: min_stock,
                max_stock: max_stock
            },
            dataType: 'html',
            async: true

        }).done(function(data) {
            // 検索成功の時の処理
            var extractedElement = $(data).find("#sortable-table");
            $("#sortable-table").html(extractedElement);
            // 検索失敗の時の処理
        }).fail(function() {
            alert('error');
        });
    });
});



// 削除処理
$(document).ready(function() {
    $(".btn.btn-danger").on('click', function(event) {
        event.preventDefault();

        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

            var form = $(event.target);
            var id = form.data('id');
            var url = "delete/" + id;
            console.log("ID: " + id);

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            dataType: 'html',
            async: true
            
        }).done(function(data) {
            // 通信が成功した時の処理
            console.log("success");
            form.closest('tr').remove();
            if($("#data_table").find().length === 0 ) {
                $("#data_table");
            }

        }).fail(function(xhr) {
            // 通信が失敗した時の処理
            console.log("fail");

        });
    });
});
