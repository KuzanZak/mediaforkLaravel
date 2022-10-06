function checkedBox(){
    document.querySelectorAll('.radio-image').forEach(radio => radio.setAttribute("disabled",""));
    document.querySelectorAll(`.radio-image[value='${check.value}']`).forEach(radio => {
        radio.removeAttribute('disabled');
    });
}