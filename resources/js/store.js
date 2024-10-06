import { reactive } from "vue";

const store = reactive({
    breadcrumbs: [],
    loading: false,
});

export default store;
