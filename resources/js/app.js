import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const body = document.body.getAttribute('data-js'); 
switch (body) {
    case 'userJs':
        document.getElementById('link-list-users').addEventListener("click", function(e){
            document.getElementById('list-dashboard-users').classList.toggle('hidden');
            document.getElementById('list-title-dashboard-users').classList.toggle('hidden');
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
