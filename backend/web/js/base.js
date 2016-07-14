
//检查选项是否有值
function mycheckbox() {
    var falg = 0;
    $("input[name='selection[]']:checkbox").each(function () {
        if ($(this).prop("checked")) {
            falg += 1;
        }
    })
    if (falg > 0)
        return true;
    else
        return false;
}
//变色
$(".table-striped").on("click","td",function(){
    if($(this).parent("tr").hasClass("bianse")){
        $(this).parent("tr").removeClass("bianse");
    }else{
        $(this).parent("tr").addClass("bianse").siblings().removeClass("bianse");
    }
});
//搜索栏
$('.filters').find('td:last').html('<span class="btn btn-primary" style="margin-left: 20px">搜索栏</span>');
//启用
var bindqiyong = function($url){
    $('#start').click(function(){
        if(mycheckbox()){
            var checkboxid = "";
            var selname = '';
            $('input:checkbox[name="selection[]"]:checked').each(function(i){
                if(0==i){
                    selname = $(this).parent().siblings().html();
                    checkboxid = $(this).val();
                }else{
                    selname += (","+$(this).parent().siblings().html());
                    checkboxid += (","+$(this).val());
                }
            });
            if(confirm("确定要启用"+selname+"吗?")){

                $.post($url,{'checkboxid':checkboxid,'_csrf':'<?php echo yii::$app->request->getCsrfToken();?>'},function (data){
                    if(data){
                        alert("启用成功");
                        location.reload();
                    }
                }).error(function() { alert("没有权限")  });
            }
        }else{
            alert("你没有选择启用项！！！");
        }
    });
}
//停用
var bindtiyong = function($url) {
    $('#stop').click(function () {
        if (mycheckbox()) {
            var checkboxid = "";
            var selname = '';
            $('input:checkbox[name="selection[]"]:checked').each(function (i) {
                if (0 == i) {
                    selname = $(this).parent().siblings().html();
                    checkboxid = $(this).val();
                } else {
                    selname += ("," + $(this).parent().siblings().html());
                    checkboxid += ("," + $(this).val());
                }
            });
            if (confirm("确定要停用" + selname + "吗?")) {

                $.post($url, {
                    'checkboxid': checkboxid,
                    '_csrf': '<?php echo yii::$app->request->getCsrfToken();?>'
                }, function (data) {
                    if (data) {
                        alert("停用成功");
                        location.reload();
                    } else {
                        alert("没有权限")
                    }
                }).error(function () {
                    alert("没有权限")
                });
            }
        } else {
            alert("你没有选择停用项！！！");
        }
    });
}
//删除
var binddel = function($url) {
    $('#alldel').click(function () {
        if (mycheckbox()) {
            var checkboxid = "";
            var selname = '';
            $('input:checkbox[name="selection[]"]:checked').each(function (i) {
                if (0 == i) {
                    selname = $(this).parent().siblings().html();
                    checkboxid = $(this).val();
                } else {
                    selname += ("," + $(this).parent().siblings().html());
                    checkboxid += ("," + $(this).val());
                }
            });
            if (confirm("确定要删除" + selname + "吗?")) {

                $.post($url, {
                    'checkboxid': checkboxid,
                    '_csrf': '<?php echo yii::$app->request->getCsrfToken();?>'
                }, function (data) {
                    if (data) {
                        alert("删除成功");
                        location.reload();
                    } else {
                        alert("没有权限")
                    }
                }).error(function () {
                    alert("没有权限")
                });
            }
        } else {
            alert("你没有选择删除项！！！");
        }
    });
}