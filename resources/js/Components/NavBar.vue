<script setup lang="ts">
import {
    BellIcon,
    ChatBubbleLeftEllipsisIcon,
    HomeIcon,
    MagnifyingGlassIcon,
    UsersIcon,
} from '@heroicons/vue/24/outline';

const navItems = [
    { icon: HomeIcon, active: true },
    { icon: UsersIcon },
    { icon: BellIcon, notificationCount: 1 },
    { icon: ChatBubbleLeftEllipsisIcon },
];
</script>

<template>
    <nav class="fixed left-0 right-0 top-0 z-50 border-b bg-white">
        <div class="mx-auto max-w-7xl px-4">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center space-x-8">
                    <img src="/logo.png" alt="Logo" class="h-16 w-auto" />
                    <div class="hidden items-center space-x-6 md:flex">
                        <button
                            v-for="(item, index) in navItems"
                            :key="index"
                            :class="[
                                'relative rounded-lg p-2 hover:bg-gray-100',
                                item.active
                                    ? 'text-yellow-500'
                                    : 'text-gray-500',
                            ]"
                        >
                            <component :is="item.icon" class="h-5 w-5" />
                            <span
                                v-if="item.notificationCount"
                                class="absolute -right-1 -top-1 flex h-4 w-4 items-center justify-center rounded-full bg-red-500 text-xs text-white"
                            >
                                {{ item.notificationCount }}
                            </span>
                        </button>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <MagnifyingGlassIcon
                            class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 transform text-gray-400"
                        />
                        <input
                            class="w-64 rounded-lg border-transparent bg-gray-100 px-4 py-2 pl-10 ring-1 ring-yellow-400 focus:border-transparent focus:outline-none focus:ring-2 focus:ring-yellow-500"
                            placeholder="Search people"
                        />
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>
