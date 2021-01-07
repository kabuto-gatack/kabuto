//图片上传
(function($) {
  'use strict';
  $(function() {
    $('.file-upload-browse').on('click', function() {
      var file = $(this).parent().parent().parent().find('.file-upload-default');
      file.trigger('click');
    });
    $('.file-upload-default').on('change', function() {
      $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });
  });
})(jQuery);


//实现批量和全部删除
(function dall(){
  $("#ischecked").on('click',function(){
    if ($(this).is(":checked")) {
      $(".mychecked").prop("checked","checked");
      $(".mychecked").parent().addClass("checked");
    }else{
      $(".mychecked").prop("checked",false);
      $(".mychecked").parent().removeClass("checked");
    }
  });
})(jQuery);

// //更改排序的规则
// (function setsort(){
//   $(".setsort").on('change',function(){
//     var sort = $(this).val();//获取排序的值
//     var id = $(this).data("id");//获取需要排序的id值
//     // var _token = "{{ csrf_token() }}";//获取csrf保护
//
//     // $.post("{{ route('admin.banneritem.setsort') }}",{id:id,sort:sort,_token:_token},function(res){
//     //   alert(res.msg);
//     //   if (res.code == 1) {
//     //     location//刷新页面
//     //   }
//     // });
//     $.ajax({
//       url:"/admin/banneritem/setsort",
//       async:true,
//       data:{id:id,sort:sort},
//       type:"POST",
//       headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//获取csrf保护
//       },
//       success:function(data){
//         if (data.code == 1) {
//           location.reload();//刷新页面
//         }
//       }
//     });
//   });
// })(jQuery);


