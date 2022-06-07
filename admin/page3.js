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
            url: "./page3_db_ajax.php",
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
      $('#order_user').val(data[0]);
      $('#order_goodNo').val(data[1]);
        if (data[2] == "訂單送出")
            $('input[name="order_status"][value=訂單送出]').prop('checked', true);
        else if(datap[2] == "賣家訂單處理中")
            $('input[name="order_status"][value=賣家訂單處理中]').prop('checked', true);  
        else if(datap[2] == "等待物流配送")
            $('input[name="order_status"][value=等待物流配送]').prop('checked', true);  
        else if(datap[2] == "物流配送中")
            $('input[name="order_status"][value=物流配送中]').prop('checked', true);  
        else if(datap[2] == "等待買家收貨")
            $('input[name="order_status"][value=等待買家收貨]').prop('checked', true);  
        else if(datap[2] == "交易完成")
            $('input[name="order_status"][value=交易完成]').prop('checked', true);  
        else if(datap[2] == "買家取消訂單")
            $('input[name="order_status"][value=買家取消訂單]').prop('checked', true);  
        else if(datap[2] == "系統取消交易")
            $('input[name="order_status"][value=系統取消交易]').prop('checked', true);  
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
            order_user: {
                  required: true
            },
            order_goodNo: {
                  required: true
            },
            order_status: {
                  required: true
            }
      }
   });
   function CRUD() {
      $.ajax({
            url: "./page3_db_ajax.php",
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