import './bootstrap';

import Alpine from 'alpinejs';
import "@lottiefiles/lottie-player";
import 'flowbite';
import 'jquery';
import '../../node_modules/@fortawesome/fontawesome-free/js/brands';
import '../../node_modules/@fortawesome/fontawesome-free/js/solid';
import '../../node_modules/@fortawesome/fontawesome-free/js/regular';
import '../../node_modules/@fortawesome/fontawesome-free/js/fontawesome';

window.Alpine = Alpine;

import Swal from 'sweetalert2'

window.showToast = (message)=>{
    const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 3000,
        customClass :'style',
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

      Toast.fire({
        icon: 'success',
        title: message
      })
}
Alpine.start();
