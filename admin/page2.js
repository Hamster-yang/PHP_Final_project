var tbl;
$(function() {
   //查詢
   tbl = $('#example').DataTable({
      "scrollX": false,
      "scrollY": false,
      "scrollCollapse": false, //當筆數小於scrillY高度時,自動縮小
      "displayLength": 10,
      "paginate": true, //是否分頁
      "lengthChange": true,
      "ajax": {
            url: "./page2_db_ajax.php",
            data: function(d) {
                  return $('#form1').serialize() + "&oper=query";
            },
            type: 'POST',
            dataType: 'json'
      },
      "dom": 'frtip'
   });

   //修改
   $('tbody').on('click', '#btn_update', function() {
      var data = tbl.row($(this).closest('tr')).data();
      $('#goods_id').val(data[0]);
      $('#goods_username').val(data[1]);
      $('#goods_theme').val(data[2]);
      $('#goods_lecturer').val(data[3]);      
      $('#goods_date').val(data[4]);
      $('#goods_price').val(data[5]);
      $('#goods_one').val(data[6]);
      $('#goods_two').val(data[7]);
      $('#goods_three').val(data[8]);
      $('#goods_four').val(data[9]);
      $('#goods_five').val(data[10]);
      $("#stud_no_old").val(data[0]);
      $("#oper").val("update");
   });

   //取消
   $('tbody').on('click', '#btn_cancel', function() {
      $("#oper").val("insert");
   });

   //刪除
   $('tbody').on('click', '#btn_delete', function() {
      var data = tbl.row($(this).closest('tr')).data();
      if (!confirm('是否確定要刪除?'))
            return false;

      $("#stud_no_old").val(data[0]);
      $("#oper").val("delete"); //刪除
      CRUD();
   });

   //送出表單 (儲存)
   $("#form1").validate({
      submitHandler: function(form) {
            CRUD();
      },
      rules: {
            goods_id: {
                  required: true
            },
            goods_username: {
                  required: true
            },
            goods_theme: {
                  required: true
            },
            goods_lecturer: {
                  required: true
            },
            goods_date: {
                required: true
            },
            goods_price: {
                required: true
            }
      }
   });
   function CRUD() {
      $.ajax({
            url: "./page2_db_ajax.php",
            data: $("#form1").serialize(),
            type: 'POST',
            dataType: "json",
            success: function(JData) {
                  if (JData.code)
                        toastr["error"](JData.message);
                  else {
                         $("#oper").val("insert");
                        toastr["success"](JData.message);
                        tbl.ajax.reload();
                  }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                  console.log(xhr.responseText);
                  alert(xhr.responseText);
            }
      });
   }

});