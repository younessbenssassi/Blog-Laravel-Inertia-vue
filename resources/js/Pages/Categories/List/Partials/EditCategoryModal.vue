<template>
    <button
        class="btn text-primary px-3"
        @click.prevent="showModal = !showModal"
    >
        Edit
    </button>

    <div
        v-if="showModal"
        id="theme-settings"
        class="settings-panel open"
    >
        <a
            href="#"
            @click.prevent="showModal = false"
        >
            <i class="settings-close ti-close"></i>
        </a>
        <p class="settings-heading">Create new category</p>
        <CategoryForm
            :category="category"
            @save="update"
            @cancel="showModal = false"
        />
    </div>
</template>

<script>
import CategoryForm from "@/Pages/Categories/List/Partials/CategoryForm.vue";

export default {
    name: "NewCategoryModal",
    components: {
        CategoryForm
    },
    props: {
        category: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            showModal: false
        }
    },
    methods: {
        update(categoryForm) {
            categoryForm.put(route('blog.categories.update', this.category), {
                onSuccess: () => this.showModal = false,
            });
        }
    }
}
</script>

