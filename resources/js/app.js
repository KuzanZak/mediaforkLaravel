import './bootstrap';
import './functions';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const body = document.body.getAttribute('data-js'); 
function checkedBox($checkbox){
    $checkbox.toggleAttribute('checked');
    if($checkbox.hasAttribute('checked')) {
        document.querySelectorAll(`.radio-image[value='${$checkbox.value}']`).forEach(radio => {
            radio.removeAttribute('disabled');
        });
    } else {
        document.querySelectorAll('.radio-image').forEach(radio => {
            radio.setAttribute("disabled");
        });
    }
};

switch (body) {
    case 'userJs':
        document.getElementById('link-list-users').addEventListener("click", function(e){
            document.getElementById('list-dashboard-users').classList.toggle('hidden');
            document.getElementById('list-title-dashboard-users').classList.toggle('hidden');
        });      
        break;
    case 'images':
        document.querySelectorAll('.checkbox-image').forEach(check => {
            document.querySelectorAll('.radio-image').forEach(radio => radio.setAttribute("disabled",""));
            check.addEventListener("click", function() {
                checkedBox(check);
            });
        });
        break;
    case 'servicePortfolioJs':
        document.getElementById('change-button').addEventListener("click", function(e){
            document.getElementById('image-update').classList.toggle('hidden');
            document.getElementById('file').classList.toggle('hidden');
            document.getElementById('submit').value = "Update"
        });
        break;        
    default:
      console.log(`Sorry, [data-js] is null!.`);
  }
