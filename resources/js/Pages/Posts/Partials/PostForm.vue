<template>
    <div class="forms-sample p-3">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Status</label>
            <div
                v-for="status in statuses"
                class="col-sm-4"
            >
                <div class="form-check">
                    <label class="form-check-label">
                        <input
                            type="radio"
                            class="form-check-input"
                            :name="status"
                            :value="status"
                            v-model="postForm.status"
                        >
                        {{ status }}
                        <i class="input-helper"></i>
                    </label>
                </div>
            </div>
            <div
                v-if="postForm.errors.status"
                class="text-danger"
            >
                {{ postForm.errors.status }}
            </div>
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select
                v-model="postForm.category_id"
                class="form-control"
                id="category_id"
            >
                <option
                    v-for="category in categories"
                    :key="category.id"
                    :value="category.id"
                    :label="category.name"
                />

            </select>
            <div
                v-if="postForm.errors.category_id"
                class="text-danger"
            >
                {{ postForm.errors.category_id }}
            </div>
        </div>

        <div class="form-group">
            <label>Image</label>
            <input
                ref="image-input"
                type="file"
                class="file-upload-default"
                @change="updateImage"
            >
            <div class="input-group col-xs-12">
                <input
                    type="text"
                    class="form-control file-upload-info"
                    disabled
                    :placeholder="postForm.image?.name ?? 'Upload Image'"
                >
                <span class="input-group-append">
                  <button
                      class="file-upload-browse btn btn-primary"
                      type="button"
                      @click="selectImage"
                  >
                      Upload
                  </button>
                </span>
            </div>
        </div>

        <div class="form-group">
            <label for="title">Title</label>
            <input
                type="text"
                class="form-control"
                id="title"
                placeholder="Name"
                v-model="postForm.title"
            >
            <div
                v-if="postForm.errors.title"
                class="text-danger"
            >
                {{ postForm.errors.title }}
            </div>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea
                class="form-control"
                id="content"
                rows="4"
                v-model="postForm.content"
            />
            <div
                v-if="postForm.errors.content"
                class="text-danger"
            >
                {{ postForm.errors.content }}
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button
                @click.prevent="save"
                class="btn btn-primary mr-2"
            >
                Save
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
    name: "PostForm",
    props: {
        post: {
            type: Object,
            default: (() => {
                return {}
            })
        },
        categories: {
            type: Array,
            required: true
        },
        statuses: {
            type: Array,
            required: true
        }
    },
    data() {
        return {
            postForm: useForm({
                status: this.post?.status,
                category_id: this.post?.category_id,
                title: this.post?.title,
                content: this.post?.content,
                image: null,
            }),
        }
    },
    methods: {
        save() {
            this.$emit('save', this.postForm);
        },
        cancel() {
            this.$emit('cancel');
        },
        selectImage() {
            this.$refs['image-input'].click();
        },
        updateImage(e) {
            this.postForm.image = e.target?.files[0] ?? null;
            this.$emit('update-image', this.postForm.image);
        }
    }
}
</script>

