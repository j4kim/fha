import axios from "axios";
import store from "./store";

axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;

export async function get(uri) {
    store.loading = true;
    const response = await axios.get(uri);
    store.loading = false;
    return response.data;
}
