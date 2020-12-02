</div>
<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript">

    $(document).ready(function () {
        $("#s_btn").click(
            function () {
                sendAjaxForm('s_input', 'index.php?path=send_notes');
                document.getElementById('s_input').innerText = '';
                return false;
            }
        );
        $("#s_input").keydown(function(event){
            if(event.keyCode == 13){
                sendAjaxForm('s_input', 'index.php?path=send_notes');
                document.getElementById('s_input').innerText = '';
                return false;
            }
        });
        $("#deleting_note").click(
            function () {
                alert('alert');
                deleteAjaxForm('deleting_note', 'index.php?path=delete_note');
                return false;
            }
        );
        $("#editing_note").click(
            function () {
                showPrompt("Введите что-нибудь<br>...умное :)", function(value) {
                    alert(document.getElementById(input_elem).innerText);
                    //editAjaxForm('editing_note', 'index.php?path=edit_note');
                });

                return false;
            }
        );
    });
    function showPrompt(html, callback){
        callback(html);
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