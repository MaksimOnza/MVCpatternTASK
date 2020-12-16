</div>
<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<!--<script src="../js/action_note.js"></script>-->
<script type="text/javascript">

    $(document).ready(function () {
        $("#s_btn").click(
            function () {
                sendAjaxForm('s_input', 'index.php?path=send_notes');
                document.getElementById('s_input').innerText = '';
                return false;
            }
        );
        $("#s_input").keydown(function (event) {
            if (event.keyCode == 13) {
                sendAjaxForm('s_input', 'index.php?path=send_notes');
                document.getElementById('s_input').innerText = '';
                return false;
            }
        });


        /*$(".display_message").on('click', '.editing_note', function(){
            var listElem = $(this);
            var text = closest().querySelector(".view_message");alert(text.id);
            /!*var add = '<div id="btns"><button id="ok" type="button" name="okey">Okey</button> ' +
                '<button class="cancel" type="button" name="cancel">Cancel</button></div>';
            // var parent_elem = document.querySelector('.text_message');

            let textArea = document.createElement('textarea');
            textArea.style.width = 'auto';
            textArea.style.height = 'auto';
            textArea.className = 'edit-area';
            textArea.value = text.innerText;
            this.innerHTML = '';
            this.appendChild(textArea);
            let elements = document.querySelector('ok');
            if(!elements) this.insertAdjacentHTML('afterend', add);
            okFunc();*!/
            // });
            return false;
        });*/
    });

    $('.todo-list').on({
        mouseenter: function () {
            var listElem = $(this);
            listElem.append('<div class="hover-edit-menu">' +
                '<a href="#" class="editing_note">edit</a>' +
                '<a href="#" class="deleting_note">delete</a> ' +
                '</div>');

            // редактирование значения элемента списка
            $('.hover-edit-menu').on('click', '.editing_note', function(){
                var currentTask = listElem;
                var currentTaskValue = currentTask.text();
                var newTaskValue;
                var idNote = listElem.attr('id');

                // добавляем поле редактирования и подставляем в него текущий value
                currentTask.html('<input type="text" class="form-control edit-input" value="'
                    + currentTaskValue + '"> <a href="#" class="save-button">' +
                    '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>ok</a> ' +
                    '<a href="#" class="cancel-button">' +
                    '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>cancel</a>');

                // сохраняем изменение в поле редактирования
                $('.save-button').on('click', function(){
                    alert('in editing_note click');
                    newTaskValue = $('.edit-input').val();
                    saveNoteAjaxForm('index.php?path=save_note', newTaskValue, idNote);
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
    
    function okFunc() {
        var buttons = document.querySelectorAll('#ok, .cancel');
        let textArea = document.querySelector('.edit-area');
        Array.from(buttons).forEach(function (button) {
            button.addEventListener('click', function (e) {
                if (button.id === 'ok') saveText(textArea, false);
                if (button.className === 'cancel') saveText(textArea, true);
            });
        });
    }

    function saveText(textArea, bool){
        let element = document.querySelector('.view_message');
        let parent_text = document.querySelector('.text_message');
        if(!bool) element.innerText = textArea.value;
        textArea.remove();
        parent_text.appendChild(element);
    }

    function saveNoteAjaxForm(url_action, note, idNote){
        var time_stamp = new Date().getTime();
        $.ajax({
            url: url_action,
            type: "POST",
            dataType: "html",
            data: {'note': note, 'time_stamp': time_stamp, 'id_note': idNote},
            success: function (response) {
                //$('#d_users').html(response);
            },
            error: function (response) {
                $('#d_messages').html('Ошибка. Данные не отправлены.');
            }
        });
    }


    function sendAjaxForm(input_elem, url_action) {
        var note = document.getElementById(input_elem).innerText;
        var time_stamp = new Date().getTime();
        $.ajax({
            url: url_action,
            type: "POST",
            dataType: "html",
            data: {'note': note, 'time_stamp': time_stamp},
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