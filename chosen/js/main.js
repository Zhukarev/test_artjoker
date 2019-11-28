document.getElementById("inputForm").onsubmit = function () {
    var aut = document.getElementById("authorInput").value;
    //console.log(aut);
    if (aut === "") {
        alert("Вы забыли указать свое имя!!!");
        return false;
    }
};


document.getElementById("commentInputText").onkeyup =
    function() {
        var comment = document.getElementById("commentInputText").value;
        if (comment.length >= 255) {
            alert("Извините, но комментарий не может быть больше 255 символов");
        }
    };