// 検索処理
$("#search").on('click', function(event) {
    event.preventDefault();

    var inputValues = inputValues();

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
        
    $.ajax({
        type: "GET",
        url: 'index.php',
        data: inputValues,
        dataType: 'html',
        async: true

    }).success(function(data) {
        // 検索成功の時の処理
        var extractedElement = $(data).find("#data_table");
        $("#data_table").html(extractedElement);
        // 検索失敗の時の処理
    }).fail(function() {
        alert('error');
    });
});

$("#search").inputValues('click', function() {
    
    var keyword = $('#keyword').val();
    var company_id = $('#company_id').val();
    var min_price = $('#min_price').val();
    var max_price = $('#max_price').val();
    var min_stock = $('#min_stock').val();
    var max_stock = $('#max_stock').val();
    
    return {
        keyword: keyword,
        company_id: company_id,
        min_price: min_price,
        max_price: max_price,
        min_stock: min_stock,
        max_stock: max_stock
    };
});


// 削除処理
$("#delete-button").on('click', function(event) {

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

        var form = $(event.target);
        var id = form.find('button').data('id');
        var url = "delete" + id;

    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(),
        dataType: 'html',
        async: true
            
    }).success(function(data) {
        // 通信が成功した時の処理
        console.log("success");

    }).fail(function(xhr) {
        // 通信が失敗した時の処理
        console.log("fail");

    });
});


