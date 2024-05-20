import axios from 'axios';

// Configuración inicial de Axios
const apiToken = localStorage.getItem('apiToken') || 'b6ab58a97df5106ee0c2f509ee6e42134fd910ebfdebfdb501c23d1fe5ebeaa4'; // Token libre por defecto
axios.defaults.headers.common['Authorization'] = `Bearer ${apiToken}`;

export function changeApiToken(isPaid) {
    const freeToken = 'b6ab58a97df5106ee0c2f509ee6e42134fd910ebfdebfdb501c23d1fe5ebeaa4';
    const paidToken = '7b4de7ff963802fa93ac536d1602e685c62e386d4464e950ec1b96d03c62f70c';

    const newToken = isPaid ? paidToken : freeToken;
    localStorage.setItem('apiToken', newToken);  // Guardar el token en localStorage
    axios.defaults.headers.common['Authorization'] = `Bearer ${newToken}`;
}
