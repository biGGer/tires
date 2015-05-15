<!DOCTYPE html>
<html>
  
  <head>
    <title>Программа по учету хранения шин (Форма для актуальных записей)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <meta name="description" content="Программа – Хранение шин.  Бесплатный WEB-сервис учета хранения шин для шиномонтажей.">
    <meta name="keywords" content="хранение, шин, колес, программа, хранения, бесплатно, учет, сезонное">
    <link rel="stylesheet" href="/media/css/bootstrap.css">
    <link rel="stylesheet" href="/media/css/bootstrap-responsive.css">
    <link rel="stylesheet" href="/media/css/datepicker.css">
    <link rel="stylesheet" href="/media/css/DT_bootstrap.css">
    <script src="/media/js/jquery.min.js"></script>
    <script src="/media/js/bootstrap.min.js"></script>
    <script src="/media/js/bootstrap-datepicker.js"></script>
    <script src="/media/js/bootstrap-datepicker.ru.js"></script>
    <script src="/media/js/jquery.dataTables.js"></script>
    
    <script src="/media/js/date.format.js"></script>
        <script src="/media/js/ZeroClipboard.js"></script>
    <script src="/media/js/TableTools.js"></script>
        <script src="/media/js/DT_bootstrap.js"></script>
    <script src="/media/js/nicEdit.js"></script>

    <style>
    #table_filter {
      display:none !important;
    }
    .DTTT_button_pdf {
      position:relative;
    }
    </style>

    <script>
    (function($) {
      $(function() {
        $('.datepicker').datepicker({
          format: 'dd.mm.yyyy',
          autoclose: true,
          language: 'ru'
        });

        $(".demo").click(function(e) {
          e.preventDefault();
          e.stopPropagation();

          $('#demoModal').modal();
        });
      })
    })(jQuery);
    </script>
  </head>
  
  <body>
           <div class="container" style="width: auto; padding: 0 20px;">
      <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
            <a class="brand" href="/" style="font-weight: bold;">Учет хранения шин</a>
            <div class="nav-collapse collapse">
              <ul class="nav">
                <li class="active">
                  <a href="/table">Записи</a> 
                </li>
                <li >
                  <a href="/settings">Настройки</a> 
                </li>
                <li >
                  <a href="/about">О нас</a> 
                </li>
              </ul>
            </div>
                        <a href="/auth/signout" class="btn btn-link" style="float: right; font-size: 12px;">Выйти с сервиса</a> 
            <span style="float: right; font-size: 12px; padding: 4px 0 4px 12px;line-height: 20px;margin-top: 5px;">zakkord@gmail.com</span>
                      </div>
        </div>
      </div>
      <!-- Modal -->
      <div id="demoModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 id="myModalLabel">Уведомление</h3>
        </div>
        <div class="modal-body">
          <p>В DEMO-версии проекта возможность сохранения данных отсутствует! Для нормальной работы зарегистрируйтесь на сайте.</p>
          <p><a href="/auth">Регистрация</a></p>
        </div>
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Закрыть</button>
        </div>
      </div>
      <style>
    .DTTT{
        display: none !important;
    }
    .disabled{
        cursor: default;
        background-image: none;
        opacity: 0.65;
        filter: alpha(opacity=65);
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
    }
</style>
<ul class="nav nav-tabs" style="margin-top: 80px;">
    <li class="active">
      <a href="/table">Актуальные записи</a> 
    </li>
    <li >
      <a href="/table/all">Все записи</a> 
    </li>
    <li>
      <a href="/table/add"><strong>Добавить запись</strong></a> 
    </li>
  </ul>


  <p>
  </p>

  <form style="padding-bottom: 20px;">

    <a id="edit-row" class="btn pull-left disabled" style="margin-right: 10px;">Редактировать запись</a> 
    <a id="delete-row" class="btn pull-left disabled" style="margin-right: 10px;">Удалить</a>
    <a id="add-client-row" class="btn pull-left disabled" style="margin-right: 10px;">Добавить шины клиенту</a>

    <ul class="nav nav-pills">
<!--    <li>-->
<!--        <a id="docs_contract" class="btn pull-left disabled" style="margin-right: 10px;">Печать договора</a>-->
<!--    </li>-->
<!--<li>-->
<!--        <a id="docs_act_in" class="btn pull-left disabled" style="margin-right: 10px;">Печать акта приемки</a>-->
<!--</li>-->
<!--<li>-->
<!--    <a id="docs_act_out" class="btn pull-left disabled" style="margin-right: 10px;">Печать акта выдачи</a>-->
<!--</li>-->

        <li class="dropdown">
            <a class="dropdown-toggle disabled" id="drop1" role="button" data-toggle="dropdown" href="#">Печать договора <b class="caret"></b></a>
            <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop1">
                <li><a tabindex="-1" id="docs_contract" href="javascript:void(0)">В браузер</a></li>
                <li><a tabindex="-1" href="javascript:void(0)" id="word_contract">В формате .docx</a></li>
                <li><a tabindex="-1" href="javascript:void(0)" id="pdf_contract">В формате .pdf</a></li>
            </ul>
        </li>

        <li class="dropdown">
            <a class="dropdown-toggle disabled" id="drop2" role="button" data-toggle="dropdown" href="#">Печать акта приемки <b class="caret"></b></a>
            <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop2">
                <li><a tabindex="-1" id="docs_act_in" href="javascript:void(0)">В браузер</a></li>
                <li><a tabindex="-1" href="javascript:void(0)" id="word_act_in">В формате .docx</a></li>
                <li><a tabindex="-1" href="javascript:void(0)" id="pdf_act_in">В формате .pdf</a></li>
            </ul>
        </li>

        <li class="dropdown">
            <a class="dropdown-toggle disabled" id="drop3" role="button" data-toggle="dropdown" href="#">Печать акта выдачи <b class="caret"></b></a>
            <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop3">
                <li><a tabindex="-1" id="docs_act_out" href="javascript:void(0)">В браузер</a></li>
                <li><a tabindex="-1" href="javascript:void(0)" id="word_act_out">В формате .docx</a></li>
                <li><a tabindex="-1" href="javascript:void(0)" id="pdf_act_out">В формате .pdf</a></li>
            </ul>
        </li>


      <li class="dropdown">
          <a class="dropdown-toggle disabled" id="drop4" role="button" data-toggle="dropdown" href="#">Печать наклеек <b class="caret"></b></a>
          <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop4">
              <li><a tabindex="-1" id="docs_stickers" href="javascript:void(0)">В браузер</a></li>
              <li><a tabindex="-1" href="javascript:void(0)" id="word_stickers">В формате .docx</a></li>
              <li><a tabindex="-1" href="javascript:void(0)" id="pdf_stickers">В формате .pdf</a></li>
          </ul>
      </li>
        </ul>
    <!--<a class="btn">Найти</a>-->
  </form>

    <input id="search" type="text" class="pull-right input-large" placeholder="Поиск..." style="margin-right: 10px;"> 
  <style type="text/css">
span.highlight {
    color: #FFFFFF;
    padding:0px 12px 2px;
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#0000CD), to(#DBDBFF));
    background: -webkit-linear-gradient(left, #0000CD, #DBDBFF);
    background: -moz-linear-gradient(left, #0000CD, #DBDBFF);
    background: -o-linear-gradient(left, #0000CD, #DBDBFF);
    background: -ms-linear-gradient(left, #0000CD, #DBDBFF);
    background: linear-gradient(left, #0000CD, #DBDBFF);
    background-color: #0000CD;
    -webkit-border-radius: 15px;
    -moz-border-radius: 15px;
    -o-border-radius: 15px;
    -ms-border-radius: 15px;
    border-radius: 15px;


}  </style>
<a id="docs_stickers" class="btn pull-left" style="margin-right: 10px;">Экспорт всей базы в Excel<div style="position: relative;margin-top: -25px; height: 25px;"><embed id="ZeroClipboard_TableToolsMovie_1" src="/media/swf/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="160" height="26" name="ZeroClipboard_TableToolsMovie_1" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=1&amp;width=0&amp;height=0" wmode="transparent"></div></a>

<table id="table" class="table table-condensed table-bordered table-hover" style="font-size: 11px; margin-top: 20px;">
    <thead>
      <tr>
                <th></th>
              <th>№</th>
        <th>Начало</th>
        <th>Окончание</th>
        <th>ФИО</th>
        <th>Доверенное лицо</th>
        <th>Производитель</th>
        <th>Марка</th>
        <th>Параметры</th>
        <th>Размер</th>
        <th>Стеллаж</th>
        <th>Полка</th>
        <th>Ячейка</th>
        <th>Штук</th>
        <!--<th>Стоим. мес</th>
        <th>Всего</th>-->
        <th>Телефон</th>
        <th>Доп. телефон</th>
        <th>Статус</th>
      </tr>
    </thead>
    <tbody>


    </tbody>
  </table>

<script type="text/javascript">
    $.fn.highlight = function (b, k) {
        function l() {
            $("." + c.className).each(function (c, e) {
                var a = e.previousSibling,
                    d = e.nextSibling,
                    b = $(e),
                    f = "";
                a && 3 == a.nodeType && (f += a.data, a.parentNode.removeChild(a));
                e.firstChild && (f += e.firstChild.data);
                d && 3 == d.nodeType && (f += d.data, d.parentNode.removeChild(d));
                b.replaceWith(f)
            })
        }

        function h(b) {
            b = b.childNodes;
            for (var e = b.length, a; a = b[--e];)
                if (3 == a.nodeType) {
                    if (!/^\s+$/.test(a.data)) {
                        var d = a.data,
                            d = d.replace(m, '<span class="' + c.className + '">$1</span>');
                        $(a).replaceWith(d)
                    }
                } else 1 == a.nodeType && a.childNodes && (!/(script|style)/i.test(a.tagName) && a.className != c.className) && h(a)
        }
        var c = {
            split: "\\s+",
            className: "highlight",
            caseSensitive: !1,
            strictly: !1,
            remove: !0
        }, c = $.extend(c, k);
        c.remove && l();
        b = $.trim(b);
        var g = c.strictly ? "" : "\\S*",
            m = RegExp("(" + g + b.replace(RegExp(c.split, "g"), g + "|" + g) + g + ")", (c.caseSensitive ? "" : "i") + "g");
        return this.each(function () {
            b && h(this)
        })
    };

    $('#search').on('input',
        function () {
            $("#table").highlight($(this).val(), {})
        }
    );
</script>
  <div id="delete-modal" class="modal hide">
    <div class="modal-header">
        <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
         <h3>Удаление</h3>
    </div>
    <div class="modal-body">
        <p>Вы действительно желаете удалить запись?</p>
    </div>
    <div class="modal-footer">
      <a href="#" id="btnYes" class="btn btn-danger">Да</a>
      <a href="#" data-dismiss="modal" aria-hidden="true" class="btn">Нет</a>
    </div>
  </div>
  <div id="select-row-modal" class="modal hide">
    <div class="modal-header">
        <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
         <h3>Уведомление</h3>
    </div>
    <div class="modal-body">
        <p>Выберите поклажедателя</p>
    </div>
    <div class="modal-footer">
      <a href="#" data-dismiss="modal" aria-hidden="true" class="btn">ОК</a>
    </div>
  </div>
    <div id="select-row-modal-many" class="modal hide">
        <div class="modal-header">
            <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
            <h3>Уведомление</h3>
        </div>
        <div class="modal-body">
            <p>Выберите ОДНОГО поклажедателя</p>
        </div>
        <div class="modal-footer">
            <a href="#" data-dismiss="modal" aria-hidden="true" class="btn">ОК</a>
        </div>
    </div>
    <div id="download-document"></div>
  <script>
  $(function() {
    $(".select-row").change(function() {
        if ($(this).is(':checked')) {
            if ($('.select-row:checked').length == 1) {
                $("#edit-row")
                    .removeClass('disabled');
                $("#add-client-row").removeClass('disabled');
                $("#docs_contract").removeClass('disabled');
                $("#docs_act_in").removeClass('disabled');
                $("#docs_act_out").removeClass('disabled');
                $("#docs_stickers").removeClass('disabled');
                $('.dropdown-toggle').removeClass('disabled');

            } else {
                $("#edit-row").addClass('disabled');
                $("#add-client-row").addClass('disabled');
                $("#docs_contract").addClass('disabled');
                $("#docs_act_in").addClass('disabled');
                $("#docs_act_out").addClass('disabled');
                $("#docs_stickers").addClass('disabled');
                $('.dropdown-toggle').addClass('disabled');
            }

            $("#delete-row").removeClass('disabled');
        } else {
            if ($('.select-row:checked').length == 1) {
                $("#edit-row").removeClass('disabled');
                $("#add-client-row").removeClass('disabled');
                $("#docs_contract").removeClass('disabled');
                $("#docs_act_in").removeClass('disabled');
                $("#docs_act_out").removeClass('disabled');
                $("#docs_stickers").removeClass('disabled');
                $('.dropdown-toggle').removeClass('disabled');
            } else {
                $("#edit-row").addClass('disabled');
                $("#add-client-row").addClass('disabled');
                $("#docs_contract").addClass('disabled');
                $("#docs_act_in").addClass('disabled');
                $("#docs_act_out").addClass('disabled');
                $("#docs_stickers").addClass('disabled');
                $('.dropdown-toggle').addClass('disabled');
            }

            if ($('.select-row:checked').length == 0) {
                $("#delete-row").addClass('disabled');
                $("#add-client-row").addClass('disabled');
                $("#docs_contract").addClass('disabled');
                $("#docs_act_in").addClass('disabled');
                $("#docs_act_out").addClass('disabled');
                $("#docs_stickers").addClass('disabled');
                $('.dropdown-toggle').addClass('disabled');
            }
        }
    });

    $("#edit-row").click(function(e) {
        e.preventDefault();
//        if ($(this).hasClass('disabled')) return;

        if ($('.select-row:checked').length == 1) {
          location.href = '/table/edit/' + $('.select-row:checked').data('id');
        } else {
            if ($('.select-row:checked').length > 1) {
                $('#select-row-modal-many').modal('show');
            }
            if ($('.select-row:checked').length == 0){
                $('#select-row-modal').modal('show');
            }
        }
    });

    $("#delete-row").click(function(e) {
        e.preventDefault();
//        if ($(this).hasClass('disabled')) return;

        if ($('.select-row:checked').length > 0) {

            $('#delete-modal').modal('show');
        } else {
          $('#select-row-modal').modal('show');
        }
    });

    $('#btnYes').click(function(e) {
        e.preventDefault();

        $('#delete-modal').modal('hide');

        var ids = new Array();
        $('.select-row:checked').each(function() {
            ids.push($(this).data('id'));
        });

        location.href = '/table/delete?ids=' + ids.join(',');
    });

    $("#add-client-row").click(function() {
//        if ($(this).hasClass('disabled')) return;

        if ($('.select-row:checked').length == 1) {
            location.href = '/table/add/' + $('.select-row:checked').data('id');
        } else {
            if ($('.select-row:checked').length > 1) {
                $('#select-row-modal-many').modal('show');
            }
            if ($('.select-row:checked').length == 0){
                $('#select-row-modal').modal('show');
            }
        }
    });

    $('.dropdown-toggle').click(function() {
        if ($('.select-row:checked').length > 1) {
            $('#select-row-modal-many').modal('show');
        }
        if ($('.select-row:checked').length == 0){
            $('#select-row-modal').modal('show');
        }
    });

    $("#docs_contract").click(function() {
        if ($(this).hasClass('disabled')) return;

        if ($('.select-row:checked').length == 1) {
          window.open('/docs/modal_contract/' + $('.select-row:checked').data('id'), 'Договор на хранение',
         'width=1000, height=700,menubar=no,location=no,resizable=yes,scrollbars=yes,status=no');
        } else {
            $('#select-row-modal').modal('show');
        }
    });

    $("#docs_act_in").click(function() {
        if ($(this).hasClass('disabled')) return;

        if ($('.select-row:checked').length == 1) {
          window.open('/docs/modal_act_in/' + $('.select-row:checked').data('id'), 'Акт приемки на хранение',
         'width=1000, height=700,menubar=no,location=no,resizable=yes,scrollbars=yes,status=no');
        } else {
            $('#select-row-modal').modal('show');
        }
    });

    $("#docs_act_out").click(function() {
        if ($(this).hasClass('disabled')) return;

        if ($('.select-row:checked').length == 1) {
          window.open('/docs/modal_act_out/' + $('.select-row:checked').data('id'), 'Акт выдачи с хранения',
         'width=1000, height=700,menubar=no,location=no,resizable=yes,scrollbars=yes,status=no');
        } else {
            $('#select-row-modal').modal('show');
        }
    });

    $("#docs_stickers").click(function() {
        if ($(this).hasClass('disabled')) return;

        if ($('.select-row:checked').length == 1) {
          window.open('/docs/modal_stickers/' + $('.select-row:checked').data('id'), 'Наклейки на машины',
         'width=1000, height=700,menubar=no,location=no,resizable=yes,scrollbars=yes,status=no');
        } else {
            $('#select-row-modal').modal('show');
        }
    });
//Print docx format
      $("#word_stickers").click(function() {
          if ($(this).hasClass('disabled')) return;

          if ($('.select-row:checked').length == 1) {
              $.post(
                  '/docs/word_stickers/' + $('.select-row:checked').data('id'), '',
                  function (data) {
                       $('#download-document').html(data);
                  }
              );
          } else {
              $('#select-row-modal').modal('show');
          }
      });

      $("#word_contract").click(function() {
          if ($(this).hasClass('disabled')) return;

          if ($('.select-row:checked').length == 1) {
              $.post(
                  '/docs/word_contract/' + $('.select-row:checked').data('id'), '',
                  function (data) {
                       $('#download-document').html(data);
                  }
              );
          } else {
              $('#select-row-modal').modal('show');
          }
      });

      $("#word_act_in").click(function() {
          if ($(this).hasClass('disabled')) return;

          if ($('.select-row:checked').length == 1) {
              $.post(
                  '/docs/word_act_in/' + $('.select-row:checked').data('id'), '',
                  function (data) {
                       $('#download-document').html(data);
                  }
              );
          } else {
              $('#select-row-modal').modal('show');
          }
      });

      $("#word_act_out").click(function() {
          if ($(this).hasClass('disabled')) return;

          if ($('.select-row:checked').length == 1) {
              $.post(
                  '/docs/word_act_out/' + $('.select-row:checked').data('id'), '',
                  function (data) {
                       $('#download-document').html(data);
                  }
              );
          } else {
              $('#select-row-modal').modal('show');
          }
      });

//Print PDF format
      $("#pdf_stickers").click(function() {
          if ($(this).hasClass('disabled')) return;

          if ($('.select-row:checked').length == 1) {
              $('#download-document').html('<iframe height="0" width="0" style=" opacity:0; position:fixed" SRC="/docs/pdf_stickers/' + $('.select-row:checked').data('id') + '"></iframe>');
          } else {
              $('#select-row-modal').modal('show');
          }
      });

      $("#pdf_act_in").click(function() {
          if ($(this).hasClass('disabled')) return;

          if ($('.select-row:checked').length == 1) {
              $('#download-document').html('<iframe height="0" width="0" style=" opacity:0; position:fixed" SRC="/docs/pdf_act_in/' + $('.select-row:checked').data('id') + '"></iframe>');
          } else {
              $('#select-row-modal').modal('show');
          }
      });

      $("#pdf_act_out").click(function() {
          if ($(this).hasClass('disabled')) return;

          if ($('.select-row:checked').length == 1) {
              $('#download-document').html('<iframe height="0" width="0" style=" opacity:0; position:fixed" SRC="/docs/pdf_act_out/' + $('.select-row:checked').data('id') + '"></iframe>');
          } else {
              $('#select-row-modal').modal('show');
          }
      });

      $("#pdf_contract").click(function() {
          if ($(this).hasClass('disabled')) return;

          if ($('.select-row:checked').length == 1) {
              $('#download-document').html('<iframe height="0" width="0" style=" opacity:0; position:fixed" SRC="/docs/pdf_contract/' + $('.select-row:checked').data('id') + '"></iframe>');
          } else {
              $('#select-row-modal').modal('show');
          }
      });
  });

  $(document).ready( function () {
  var oTable = $('#table').dataTable( {
    "sDom": "<'row-fluid'<'span6'T><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
    "oLanguage": {
      "sProcessing":   "Подождите...",
      "sLengthMenu":   "Показать _MENU_ записей",
      "sZeroRecords":  "Записи отсутствуют.",
      "sInfo":         "Записи с _START_ до _END_ из _TOTAL_ записей",
      "sInfoEmpty":    "Записи с 0 до 0 из 0 записей",
      "sInfoFiltered": "(отфильтровано из _MAX_ записей)",
      "sInfoPostFix":  "",
      "sSearch":       "Поиск:",
      "sUrl":          "",
      "oPaginate": {
          "sFirst": "Первая",
          "sPrevious": "Предыдущая",
          "sNext": "Следующая",
          "sLast": "Последняя"
      },
      "oAria": {
          "sSortAscending":  ": активировать для сортировки столбца по возрастанию",
          "sSortDescending": ": активировать для сортировки столбцов по убыванию"
      }
    },
    "oTableTools": {
      "sSwfPath":        "/media/swf/copy_csv_xls_pdf.swf",
      "aButtons": [
        {
          "sExtends":    "collection",
          "sButtonText": 'Сохранить <span class="caret" />',
          "aButtons":    [ "xls" ]
        }
      ]
    },
    "aaSorting": [[ 1, "asc" ]],
  } );

  $("#search").keyup(function() {
    oTable.fnFilter( $(this).val() );
  });
} );
  </script>
    </div>
  </body>

</html>
