<template>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Posts count</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <CategoryRow
                v-for="category in categories"
                :key="category.id"
                :category="category"
            />
        </tbody>
    </table>
</template>

<script>
import CategoryRow from "@/Pages/Categories/List/Partials/CategoryRow.vue";
export default {
    name: "CategoriesTable",
    components: {
        CategoryRow,
    },
    props: {
        categories: {
            type: Array,
            required: true,
        }
    }
}
</script>

