import axios from "axios";
import store from "./store";

export async function get(uri) {
    store.loading = true;
    const response = await axios.get(uri);
    store.loading = false;
    return response.data;
}
