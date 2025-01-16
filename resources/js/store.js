import { computed, reactive } from "vue";

const store = reactive({
    breadcrumbs: [],
    loading: false,
    menu: [],

    filteredMenu: computed(() => {
        return store.menu.filter(item => {
            return item.if === undefined || item.if;
        });
    })
});

export default store;
