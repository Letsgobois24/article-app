import './bootstrap';
import Trix from "trix"

import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()

document.addEventListener("trix-before-initialize", () => {
  // Change Trix.config if you need
})
