<template>
    <tr>
        <td>{{ category.name }}</td>
        <td>{{ category.posts_count }}</td>
        <td>{{ category.created_at }}</td>
        <td>
            <EditCategoryModal
                :category="category"
            />

            <button
                @click.prevent="deleteCategory"
                class="btn text-danger px-3"
            >
                Delete
            </button>
        </td>
    </tr>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";
import { Inertia } from '@inertiajs/inertia';
import EditCategoryModal from "./EditCategoryModal.vue";
export default {
    name: "CategoryRow",
    components: {
        Link,
        EditCategoryModal,
    },
    props: {
        category: {
            type: Object,
            required: true,
        }
    },
    methods: {
        deleteCategory() {
            Inertia.delete(route('blog.categories.destroy', this.category), {
                preserveScroll: true
            })
        }
    }
}
</script>

