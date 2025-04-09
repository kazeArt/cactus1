// filepath: c:\xampp\htdocs\back-office\back-office\resources\js\bootstrap.js
import axios from 'axios';

// Set Axios defaults
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Export Axios for use in other parts of the app
export default axios;