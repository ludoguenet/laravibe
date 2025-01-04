<script setup lang="ts">
import {
    AcademicCapIcon,
    BookmarkIcon,
    ChartBarIcon,
    PuzzlePieceIcon,
    ShareIcon,
} from '@heroicons/vue/24/outline';

const links = [
    { icon: AcademicCapIcon, text: 'Learning', color: 'text-blue-600' },
    { icon: ChartBarIcon, text: 'Statistics', color: 'text-purple-600' },
    { icon: BookmarkIcon, text: 'Bookmarks', color: 'text-pink-600' },
    { icon: PuzzlePieceIcon, text: 'Gaming', color: 'text-green-600' },
    { icon: ShareIcon, text: 'Share', color: 'text-orange-600' },
];
</script>

<template>
    <div
        class="rounded-xl border border-gray-100 bg-white p-4 shadow-sm transition-all duration-200 hover:shadow-md"
    >
        <div class="space-y-1">
            <button
                v-for="(link, index) in links"
                :key="index"
                class="group flex w-full items-center space-x-3 rounded-lg p-3 transition-all duration-200 hover:bg-gray-50"
            >
                <component
                    :is="link.icon"
                    class="h-5 w-5 transition-colors duration-200"
                    :class="link.color"
                />
                <span
                    class="font-medium text-gray-700 group-hover:text-gray-900"
                >
                    {{ link.text }}
                </span>
            </button>
        </div>
    </div>
</template>
