</div>
<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/action_note.js"></script>
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

   // });
        /*$(".deleting_note").click(
            function () {
                alert('alert');
                deleteAjaxForm('deleting_note', 'index.php?path=delete_note');
                return false;
            }
        );*/
        $(".view_message").click(
            function (e) {
                // var source_element = document.querySelector('.view_message');
                // var main_element = document.querySelector('.display_message');
                var add = '<div id="btns"><button id="ok" type="button" name="okey">Okey</button> ' +
                    '<button class="cancel" type="button" name="cancel">Cancel</button></div>';
                // var parent_elem = document.querySelector('.text_message');

                let textArea = document.createElement('textarea');
                textArea.style.width = 'auto';
                textArea.style.height = 'auto';
                textArea.className = 'edit-area';
                textArea.value = this.innerText;
                this.innerHTML = '';
                this.appendChild(textArea);
                let elements = document.querySelector('ok');
                if(!elements) this.insertAdjacentHTML('afterend', add);
                okFunc();
               // });
                return false;
            }
        );
    });
    function okFunc(){
        var buttons = document.querySelectorAll('#ok, .cancel');
        let textArea = document.querySelector('.edit-area');
        Array.from(buttons).forEach(function(button){
            button.addEventListener('click', function(e) {
                if(button.id === 'ok') saveText(textArea, false);
                if(button.className === 'cancel') saveText(textArea, true);
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

    function deleteAjaxForm(input_elem, url_action) {
        var note = document.getElementById(input_elem).innerText;
        $.ajax({
            url: url_action,
            type: "POST",
            dataType: "html",
            data: {'note': note},
            success: function (response) {
                //$('#d_users').html(response);
            },
            error: function (response) {
                $('#d_messages').html('Ошибка. Данные не отправлены.');
            }
        });
    }
    function editAjaxForm(input_elem, url_action) {
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