<script setup lang="ts">
import { Feed } from '@/types';
import {
    ChatBubbleLeftIcon,
    HeartIcon,
    PhotoIcon,
    ShareIcon,
} from '@heroicons/vue/24/outline';

defineProps<{
    feeds: Array<Feed>;
}>();
</script>

<template>
    <main class="mx-auto max-w-2xl px-4 py-6">
        <div class="space-y-4">
            <article
                v-for="feed in feeds"
                :key="feed.id"
                class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-100 transition-all duration-200 hover:shadow-md"
            >
                <!-- Header -->
                <div class="p-4 sm:p-6">
                    <div class="flex items-center space-x-3">
                        <div class="relative h-10 w-10 flex-shrink-0">
                            <img
                                :src="
                                    feed.user.profile_picture ||
                                    '/default-avatar.png'
                                "
                                :alt="feed.user.name"
                                class="h-full w-full rounded-full object-cover ring-2 ring-white"
                            />
                            <div
                                class="absolute -bottom-1 -right-1 h-4 w-4 rounded-full border-2 border-white bg-green-400"
                            ></div>
                        </div>
                        <div class="min-w-0 flex-1">
                            <p
                                class="truncate text-sm font-medium text-gray-900"
                            >
                                {{ feed.user.name }}
                            </p>
                            <p class="text-xs text-gray-500">
                                {{ feed.created_at }}
                            </p>
                        </div>
                    </div>

                    <!-- Content -->
                    <p v-if="feed.content" class="mt-4 text-gray-700">
                        {{ feed.content }}
                    </p>

                    <!-- Attachments -->
                    <div v-if="feed.attachments.length" class="mt-4">
                        <div
                            class="grid grid-cols-2 gap-2"
                            :class="{
                                'grid-cols-1': feed.attachments.length === 1,
                                'grid-cols-2': feed.attachments.length >= 2,
                            }"
                        >
                            <div
                                v-for="attachment in feed.attachments"
                                :key="attachment.id"
                                class="relative aspect-[16/9] overflow-hidden rounded-lg bg-gray-50"
                            >
                                <img
                                    :src="attachment.path"
                                    :alt="
                                        'Attachment in post by ' +
                                        feed.user.name
                                    "
                                    class="absolute inset-0 h-full w-full object-cover transition-transform duration-200 hover:scale-105"
                                />
                            </div>
                        </div>
                    </div>

                    <!-- Empty State -->
                    <div
                        v-else-if="!feed.content"
                        class="mt-4 flex h-24 items-center justify-center rounded-lg bg-gray-50"
                    >
                        <PhotoIcon class="h-8 w-8 text-gray-400" />
                    </div>

                    <!-- Actions -->
                    <div
                        class="mt-4 flex items-center justify-between border-t pt-4"
                    >
                        <button
                            class="flex items-center space-x-2 text-gray-500 hover:text-red-500"
                        >
                            <HeartIcon class="h-5 w-5" />
                            <span class="text-sm">Like</span>
                        </button>
                        <button
                            class="flex items-center space-x-2 text-gray-500 hover:text-blue-500"
                        >
                            <ChatBubbleLeftIcon class="h-5 w-5" />
                            <span class="text-sm">Comment</span>
                        </button>
                        <button
                            class="flex items-center space-x-2 text-gray-500 hover:text-green-500"
                        >
                            <ShareIcon class="h-5 w-5" />
                            <span class="text-sm">Share</span>
                        </button>
                    </div>
                </div>
            </article>
        </div>
    </main>
</template>
