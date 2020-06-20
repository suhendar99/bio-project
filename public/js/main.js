const inputs = document.querySelectorAll('.input');

function focusFunc() {
    let parent = this.parentNode.parentNode;
    parent.classlist.add('focus') ;
}
function blurFunc() {
    let parent = this.parentNode.parentNode;
    if (this.value == "") {
        parent.classlist.remove('focus') ;
    }
}

inputs.forEach(input => {
    input.addEventListener('facus',focusFunc);
    input.addEventListener('blur',blurFunc);
});