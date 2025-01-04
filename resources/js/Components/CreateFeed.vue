<script setup lang="ts">
import {
    CalendarDaysIcon,
    FaceSmileIcon,
    MapPinIcon,
    PhotoIcon,
    VideoCameraIcon,
} from '@heroicons/vue/24/outline';
import { useForm } from '@inertiajs/vue3';
import FileAttachement from './FileAttachement.vue';
import { FileAttachment } from '@/types';

const postActions = [
    { icon: PhotoIcon, text: 'Photo', color: 'text-green-600' },
    {
        icon: VideoCameraIcon,
        text: 'Video',
        color: 'text-yellow-600 outline-none',
    },
    { icon: CalendarDaysIcon, text: 'Event', color: 'text-purple-600' },
    { icon: MapPinIcon, text: 'Location', color: 'text-red-600' },
];

const form = useForm({
    content: null,
    attachments: [] as FileAttachment[],
});

const submit = () => {
    form.post(route('feeds.store'), {
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
            form.reset();
        },
    });
};
</script>

<template>
    <div
        class="mb-4 rounded-xl border border-gray-100 bg-white p-6 shadow-sm transition-all duration-200 hover:shadow-md"
    >
        <div class="mb-6 flex items-center space-x-4">
            <div class="relative">
                <img
                    :src="
                        $page.props.auth.user.profile_picture ||
                        '/default-avatar.png'
                    "
                    :alt="$page.props.auth.user.name"
                    class="h-12 w-12 rounded-full object-cover ring-2 ring-gray-100"
                />
                <span
                    class="absolute bottom-0 right-0 h-3 w-3 rounded-full border-2 border-white bg-green-400"
                ></span>
            </div>
            <div class="relative flex-1">
                <textarea
                    v-model="form.content"
                    rows="2"
                    placeholder="What's on your mind?"
                    class="w-full resize-none rounded-2xl border-transparent bg-gray-50 px-4 py-3 text-sm text-gray-900 placeholder-gray-500 ring-1 ring-yellow-400 focus:border-transparent focus:outline-none focus:ring-2 focus:ring-yellow-500"
                ></textarea>
                <div
                    class="absolute bottom-3 right-3 flex items-center space-x-2"
                >
                    <button
                        class="text-gray-400 transition-colors hover:text-gray-600"
                    >
                        <FaceSmileIcon class="h-5 w-5" />
                    </button>

                    <FileAttachement v-model="form" />

                    <!-- <button
                        class="text-gray-400 transition-colors hover:text-gray-600"
                    >
                        <PaperClipIcon class="h-5 w-5" />
                    </button> -->
                </div>
            </div>
        </div>

        <template v-if="$page.props.errors">
            {{ $page.props.errors?.content }}
            {{ $page.props.errors?.attachments }}
        </template>

        <div
            class="flex items-center justify-between border-t border-gray-100 pt-4"
        >
            <div class="flex -space-x-1">
                <button
                    v-for="(action, index) in postActions"
                    :key="index"
                    class="group relative flex items-center space-x-2 rounded-full px-4 py-2 transition-all duration-200 hover:bg-gray-50"
                >
                    <component
                        :is="action.icon"
                        class="h-5 w-5 transition-colors duration-200"
                        :class="action.color"
                    />

                    <span
                        class="text-sm font-medium text-gray-600 group-hover:text-gray-900"
                    >
                        {{ action.text }}
                    </span>
                </button>
            </div>
            <button
                @click.prevent="submit"
                type="button"
                class="inline-flex items-center justify-center rounded-full bg-yellow-500 px-6 py-2 text-sm font-semibold text-white shadow-sm outline-none transition-all duration-200 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2"
            >
                Post
            </button>
        </div>
    </div>
</template>
