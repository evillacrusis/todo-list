<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextArea from '@/Components/TextArea.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    todos: Object
});

const form = useForm({
    title: '',
    description: ''
});

const submit = () => {
    form.post(route('todos'));
    form.reset();
};

const deleteTodo = (id) => {
    form.delete(`/todo/${id}`);
}
</script>

<template>
    <GuestLayout>
        <Head title="ToDo List"  />
        <h1 class="text-center">ToDo List</h1>
        <form @submit.prevent="submit" class="mb-20">
            <div>
                <InputLabel for="title" value="Title" />

                <TextInput
                    id="title"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.title"
                    required
                />
            </div>
            <div>
                <InputLabel for="description" value="Description" />

                <TextArea
                    id="description"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.description"
                    required
                />
            </div>
            <div class="flex items-center justify-center mt-4">
                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Submit
                </PrimaryButton>
            </div>
        </form>
        <ul role="list" class="divide-y divide-gray-100" v-for="todo in todos" v-bind:key="todo.id">
            <li class="flex justify-between gap-x-6 py-5 border-b-2 ">
                <div class="flex min-w-0 gap-x-4 ">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">{{todo.title}}</p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{todo.description}}</p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{todo.created_at}}</p>
                    </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <SecondaryButton class="ml-4" @click="deleteTodo(todo.id)">Delete</SecondaryButton>
                </div>
                
            </li>
            
            </ul>
        
    </GuestLayout>
</template>
