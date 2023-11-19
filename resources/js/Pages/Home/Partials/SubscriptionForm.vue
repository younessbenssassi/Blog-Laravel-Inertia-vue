<template>
    <div class="row d-flex align-content-center justify-content-center">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Subscription form</h4>
                    <p class="card-description">
                        Enter your email to receive email notification when new posts created
                    </p>
                    <div class="form-group">
                        <div class="input-group">
                            <input
                                type="email"
                                class="form-control"
                                placeholder="Email"
                                v-model="subscriptionForm.email"
                            >
                            <div class="input-group-append">
                                <button
                                    class="btn btn-primary"
                                    type="button"
                                    @click.prevent="subscribe"
                                >
                                    Subscribe
                                </button>
                            </div>
                        </div>
                        <div
                            v-if="subscriptionForm.errors.email"
                            class="text-danger"
                        >
                            {{ subscriptionForm.errors.email }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {useForm} from "@inertiajs/inertia-vue3";
export default {
    name: "SubscriptionForm",
    data() {
        return {
            subscriptionForm: useForm({
                email: null,
            }),
        }
    },
    methods: {
        subscribe() {
            this.subscriptionForm.post(route('subscription.store'),{
                onSuccess: () => this.subscriptionForm.reset('email'),
            });
        }
    }
}
</script>
