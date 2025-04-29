import './bootstrap';

import Alpine from 'alpinejs'
import { adminPanel } from './admin-panel.js';
window.Alpine = Alpine
Alpine.data('adminPanel', adminPanel);
Alpine.start()

