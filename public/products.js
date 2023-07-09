    
$(document).ready(function() {
    $("#test").on("click", function() {
    console.log("Button clicked!");
    });
});


// $(document).ready(function(){
//     $("#search").on('click', function() {
//         $.ajax({
//             type: "GET",
//             url: 'index.php',
//             dataType: 'html'
//         }).done(function(data) {
//             $('#data_table').html(data);
//         }).fail(function() {
//             alert('error');
//         });
//     });
// });


// 削除処理
$(document).ready(function(event){
    
    $("#delete-button").on('click', function() {
        var deleteConfirm = confirm('削除スタート');
        console.log("start");

        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

            var form = $(event.target);
            var id = form.find('button').data('id');
            var url = "delete" + id;

        $.ajax({
            type: "POST",
            url: url,
            dataType: 'html',
            async: true
            
            }).done(function(results) {
                // 通信が成功した時の処理
                var deleteConfirm = confirm('削除しました');
                console.log("done");

            }).fail(function (jqXHR, textStatus, errorThrown) {
                // 通信が失敗した時の処理
                var deleteConfirm = confirm('削除に失敗しました');
                console.log("fail");

        });
    });
});

