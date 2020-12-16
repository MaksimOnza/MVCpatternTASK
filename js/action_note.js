// var add = '<div id="btns"><button id="ok" type="button" name="okey">Okey</button> ' +
//     '<button class="cancel" type="button" name="cancel">Cancel</button></div>';
// let source_element = document.querySelectorAll('.view_message');
// let parent_element = document.querySelectorAll('.text_message');
// let elements;
// source_element.onclick = showArea;
// function showArea(){
//     let textArea = document.createElement('textarea');
//     textArea.style.width = '200px';
//     textArea.style.height = '100px';
//     textArea.className = 'edit-area';
//     textArea.value = source_element.innerText;
//     source_element.innerHTML = '';
//     //let parent = this.closest('.text_message');
//     parent_element.appendChild(textArea);
//     if(!elements) {
//         elements = document.getElementById('ok');
//         parent_element.insertAdjacentHTML('afterend', add);
//     }
//     //alert('In showArea');
//     okFunc();
// }
// function okFunc(){
//     var buttons = document.querySelectorAll('#ok, .cancel');
//     let textArea = document.querySelector('.edit-area');
//     Array.from(buttons).forEach(function(button){
//         button.addEventListener('click', function(e) {
//             if(button.id === 'ok') saveText(textArea, false);
//             if(button.className === 'cancel') saveText(textArea, true);
//         });
//     });
// }
// function saveText(textArea, bool){
//     if(!bool) source_element.innerText = textArea.value;
//     textArea.remove();
//     parent_element.appendChild(source_element);
// }
/*$(".editing_note").bind(
    function(){
        let source_element = document.querySelectorAll('.view_message');
        alert('sdf');
        alert("source_element.innerHTML");
    }
);*/

