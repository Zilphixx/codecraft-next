import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import Alpine from 'alpinejs';

window.Alpine = Alpine;
 
Alpine.start();

import { Grid, html } from "gridjs";
import "gridjs/dist/theme/mermaid.css";
import "../css/dark-gridjs.css";

window.Grid = Grid;
window.html = html;
