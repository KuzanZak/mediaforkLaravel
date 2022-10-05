import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.getElementById('change-button').addEventListener("click", function(e){
    document.getElementById('image-update').classList.toggle('hidden');
    document.getElementById('file').classList.toggle('hidden');
    document.getElementById('submit').value = "Update"
})