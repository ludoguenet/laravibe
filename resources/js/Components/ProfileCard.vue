<script setup lang="ts">
import {
    BuildingOfficeIcon,
    MagnifyingGlassIcon,
    PlusCircleIcon,
    VideoCameraIcon,
} from '@heroicons/vue/24/outline';

defineProps<{
    name: string;
    role: string;
    avatar: string;
}>();

const quickLinks = [
    { icon: BuildingOfficeIcon, text: 'Reddit Inc.', color: 'text-orange-600' },
    {
        icon: MagnifyingGlassIcon,
        text: 'Google search',
        color: 'text-blue-600',
    },
    { icon: VideoCameraIcon, text: 'TikTok Inc.', color: 'text-pink-600' },
    { icon: PlusCircleIcon, text: 'Add new page', color: 'text-gray-600' },
];
</script>

<template>
    <div
        class="mb-4 rounded-xl border border-gray-100 bg-white p-6 shadow-sm transition-all duration-200 hover:shadow-md"
    >
        <div class="mb-6 flex items-center space-x-4">
            <div class="relative">
                <img
                    :src="avatar"
                    :alt="name"
                    class="h-16 w-16 rounded-full object-cover ring-4 ring-gray-50"
                />
                <span
                    class="absolute bottom-0 right-0 h-4 w-4 rounded-full border-2 border-white bg-green-400"
                ></span>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900">{{ name }}</h3>
                <p class="text-sm font-medium text-gray-500">{{ role }}</p>
            </div>
        </div>
        <div class="space-y-1">
            <button
                v-for="(link, index) in quickLinks"
                :key="index"
                class="group flex w-full items-center space-x-3 rounded-lg p-3 transition-colors duration-200 hover:bg-gray-50"
            >
                <component
                    :is="link.icon"
                    class="h-5 w-5 transition-colors duration-200"
                    :class="link.color"
                />
                <span
                    class="font-medium text-gray-700 group-hover:text-gray-900"
                    >{{ link.text }}</span
                >
            </button>
        </div>
    </div>
</template>
