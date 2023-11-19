<template>
    <button
        class="btn btn-primary"
        @click.prevent="showModal = !showModal"
    >
        {{ showModal ? 'Close' : 'New Category' }}
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
            @save="create"
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
    data() {
        return {
            showModal: false
        }
    },
    methods: {
        create(categoryForm) {
            categoryForm.post(route('blog.categories.store'), {
                onSuccess: () => this.showModal = false,
            });
        }
    }
}
</script>

