import axios from "axios";
import store from "./store";

axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;

export async function api(uri, method = "get", data = {}) {
    store.loading = true;
    const response = await axios(uri, { method, data });
    store.loading = false;
    return response.data;
}

export async function get(uri) {
    return api(uri);
}

export async function post(uri, data) {
    return api(uri, "post", data);
}
