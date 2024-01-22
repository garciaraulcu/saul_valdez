import axios from "axios"

axios.post('procesar-pago-oxxo').then(res => {
    console.log(res);
})
.catch(e => {
    console.error(e);
})



