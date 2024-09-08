export default {
    table: "glossary",
    modules: {
        crud: true,
    },
    columns: [
        "id",
        {
            data: "term",
            editable: true,
        },
        {
            data: "definition",
            editable: {
                textarea: true,
            },
        },
    ],
}