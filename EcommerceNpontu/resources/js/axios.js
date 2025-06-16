import axios from 'axios';

// Set the base URL for all Axios requests
axios.defaults.baseURL = import.meta.env.VITE_APP_URL || 'http://127.0.0.1:8000';

// Configure CSRF token
const token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}

// Add X-Requested-With header to identify AJAX requests
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Handle 419 errors (CSRF token mismatch)
axios.interceptors.response.use(
    response => response,
    error => {
        if (error.response && error.response.status === 419) {
            window.location.reload();
        }
        return Promise.reject(error);
    }
);

export default axios; 