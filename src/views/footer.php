</div>
<script src="../src/js/jquery-3.5.1.min.js"></script>
<script src="../src/js/bootstrap.min.js"></script>
<!--<script src="../js/action_note.js"></script>-->
<script type="text/javascript">

    $(document).ready(function () {
        $("#s_btn").click(
            function () {
                newAjaxForm('s_input', 'index.php?path=ControllerNote', 'new');
                document.getElementById('s_input').innerText = '';
                return false;
            }
        );
        $("#s_input").keydown(function (event) {
            if (event.keyCode == 13) {
                newAjaxForm('s_input', 'index.php?path=ControllerNote', 'new');
                document.getElementById('s_input').innerText = '';
                return false;
            }
        });
    });

    $('.todo-list').on({
        mouseenter: function () {
            var listElem = $(this);
            listElem.append('<div class="hover-edit-menu">' +
                '<a href="#" class="editing_note"></a>' +
                '<a href="#" class="deleting_note"></a> ' +
                '</div>');

            $('.hover-edit-menu').on('click', '.deleting_note', function(){
                var idNote = listElem.attr('id');
                actionNoteAjaxForm('index.php?path=ControllerNote', idNote, 'del');
            });

            // редактирование значения элемента списка
            $('.hover-edit-menu').on('click', '.editing_note', function(){
                var currentTask = listElem;
                var currentTaskValue = currentTask.text();
                var newTaskValue;
                var idNote = currentTask.attr('id');

                // добавляем поле редактирования и подставляем в него текущий value
                currentTask.html('<input type="text" class="form-control edit-input" value="'
                    + currentTaskValue + '"> <a href="#" class="save-button">' +
                    '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>ok</a> ' +
                    '<a href="#" class="cancel-button">' +
                    '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>cancel</a>');

                // сохраняем изменение в поле редактирования
                $('.save-button').on('click', function(){
                    newTaskValue = $('.edit-input').val();
                    actionNoteAjaxForm('index.php?path=ControllerNote', idNote, 'edit', newTaskValue);
                    currentTask.text(newTaskValue);
                });
                // отменяем введенные изменения
                $('.cancel-button').on('click', function(){
                    currentTask.text(currentTaskValue);
                });
            });

            // скрываем edit-menu если поле редактирования открыто
            if($('.edit-input').is(':visible')) {
                $('.hover-edit-menu').hide();
            }

        },

        mouseleave: function () {
            $('.hover-edit-menu').remove();
        }
    }/*, '.item'*/);

    function actionNoteAjaxForm(url_action, idNote, action, note='') {
        var time_stamp = new Date().getTime();
        $.ajax({
            url: url_action,
            type: "POST",
            dataType: "html",
            data: {'time_stamp': time_stamp, 'id': idNote, 'action': action, 'note': note},
            success: function (response) {
                //$('#d_users').html(response);
            },
            error: function (response) {
                $('#d_messages').html('Ошибка. Данные не отправлены.');
            }
        });
    }

    function newAjaxForm(input_elem, url_action, action) {
        var note = document.getElementById(input_elem).innerText;
        var time_stamp = new Date().getTime();
        $.ajax({
            url: url_action,
            type: "POST",
            dataType: "html",
            data: {'note': note, 'time_stamp': time_stamp, 'id': 0, 'action': action},
            success: function (response) {
                //$('#d_users').html(response);
            },
            error: function (response) {
                $('#d_messages').html('Ошибка. Данные не отправлены.');
            }
        });
    }

</script>

</body>
</html>