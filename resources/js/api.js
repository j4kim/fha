import axios from "axios";

export async function get(uri) {
    const response = await axios.get(uri);
    return response.data;
}
