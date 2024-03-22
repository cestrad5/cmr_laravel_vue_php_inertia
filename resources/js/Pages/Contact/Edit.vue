<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import FileInput from '@/Components/FileInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { ref } from 'vue';

const page = usePage();

const contact = ref(page.props.contact);

const initialValues = {
    name: contact.value.name,
    phone: contact.value.phone,
    avatar: null,
    privacy: contact.value.provacy,
};

const form = useForm(initialValues)

const onSelectAvatar = (e) => {
    const files = e.target.files;
    if (files.length > 0) {
        form.avatar = files[0];
    }
}


const submit = () => {
    form.post(route('contact.update',contact.value), {
        onSuccess: (e) => {
            contact.value = e.props.contact;
        },
        preserveScroll: true,
        onError: () => {
            form.reset();
        },
    });
}

</script>

<template>

    <Head title="Edit Contact" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between h-16">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Contact</h2>
                <Link :href="route('contacts.index')" class="text-sm text-gray-700 underline">
                Contact List
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form class="w-1/3 py-5 space-y-3" @submit.prevent="submit">

                        <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p v-if="form.recentlySuccessful" class="text-sm text-green-700">Updated</p>
                </Transition>



                        <div>
                            <InputLabel for="name" value="Name" />

                            <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required
                                autofocus autocomplete="name" placeholder="John Doe" />

                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>
                        <div>
                            <InputLabel for="phone" value="Phone" />

                            <TextInput id="phone" type="text" class="mt-1 block w-full" v-model="form.phone" placeholder="+57 3127270000" />

                            <InputError class="mt-2" :message="form.errors.phone" />
                        </div>
                        <div>
                            <img :src="`/storage/${contact.avatar}`" class="w-24 h-24 rounded-full" />
                        </div>
                        <div>
                            <InputLabel for="avatar" value="Avatar" />
                                <FileInput name="avatar" @change="onSelectAvatar"/>
                            <InputError class="mt-2" :message="form.errors.avatar" />
                        </div>
                        <div>
                            <InputLabel for="privacy" value="Private" />
                                <select v-model="form.privacy" name="privacy" id="privacy" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="public">Public</option>
                                    <option value="private">Private</option>
                                </select>
                            <InputError class="mt-2" :message="form.errors.privacy" />
                        </div>

                        <div class="flex justify-center">
                            <PrimaryButton>
                                Update Contact
                            </PrimaryButton>
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>import NavLinkVue from '@/Components/NavLink.vue';import FIleInputVue from '@/Components/FIleInput.vue';
import FileInputVue from '@/Components/FileInput.vue';
import FileInputVue from '@/Components/FileInput.vue';
import FileInputVue from '@/Components/FileInput.vue';
import PrimaryButtonVue from '@/Components/PrimaryButton.vue';
import PrimaryButtonVue from '@/Components/PrimaryButton.vue';
import PrimaryButtonVue from '@/Components/PrimaryButton.vue';
import PrimaryButtonVue from '@/Components/PrimaryButton.vue';

