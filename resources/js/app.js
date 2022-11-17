import './bootstrap';

import Alpine from 'alpinejs';
import "@lottiefiles/lottie-player";
import 'flowbite';
window.Alpine = Alpine;

import Swal from 'sweetalert2'

window.showToast = (message)=>{
    const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 3000,
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
