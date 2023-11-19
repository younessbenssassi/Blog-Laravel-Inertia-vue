<template>
    <div class="forms-sample p-3">
        <div class="form-group">
            <label for="name">Name</label>
            <input
                type="text"
                class="form-control"
                id="name"
                placeholder="Name"
                v-model="categoryForm.name"
            >
            <div
                v-if="categoryForm.errors.name"
                class="text-danger"
            >
                {{ categoryForm.errors.name }}
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button
                @click.prevent="save"
                type="submit"
                class="btn btn-primary mr-2"
            >
                Submit
            </button>
            <button
                @click.prevent="cancel"
                class="btn btn-light"
            >
                Cancel
            </button>
        </div>

    </div>
</template>

<script>
import {useForm} from "@inertiajs/inertia-vue3";

export default {
    name: "CategoryForm",
    props: {
        category: {
            type: Object,
            default: (() => {
                return {}
            })
        }
    },
    data() {
        return {
            categoryForm: useForm({
                name: this.category?.name
            })
        }
    },
    methods: {
        save() {
            this.$emit('save', this.categoryForm);
        },
        cancel() {
            this.$emit('cancel');
        }
    }
}
</script>

