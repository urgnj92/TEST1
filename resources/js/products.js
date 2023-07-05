$("#test").on("click", function() {
    console.log("Button clicked!");
});
//     $("#search").on('click', function() {
//             $.ajax({
//                 type: "GET",
//                 url: 'index.php',
//                 dateType: 'html'
//             }).done(function(data) {
//                 $('#data_table').html(data);
//             }).fail(function() {
//                 alert('error');
//             });
//         });



// // 削除処理
//     $("#delete").on('click', function() {
//         var deleteConfirm = confirm('削除スタート');

//             $.ajaxSetup({
//                     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
//                 });

//                 // var form = $(event.target);
//                 // var id = form.find('button').data('id');
//                 // var url = '/delete/' + id;
//                 console.log("test");

//                 // $.ajax({
//                 //     type: "POST",
//                 //     url: url,
//                 //     dateType: 'html'

//                 // }).done(function(results) {
//                 //     // 通信が成功した時の処理
//                 //     var deleteConfirm = confirm('削除しました');

//                 // }).fail(function (jqXHR, textStatus, errorThrown) {
//                 //     // 通信が失敗した時の処理
//                 //     var deleteConfirm = confirm('削除に失敗しました');

//                 // });
//             });

