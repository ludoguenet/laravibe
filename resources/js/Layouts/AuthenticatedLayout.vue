<script setup lang="ts">
import NavBar from '@/Components/NavBar.vue';
import ProfileCard from '@/Components/ProfileCard.vue';
import RightSidebar from '@/Components/RightSidebar/RightSidebar.vue';
import SidebarLinks from '@/Components/SidebarLinks.vue';
</script>

<template>
    <div class="min-h-screen bg-gray-50">
        <NavBar />

        <main class="pb-8 pt-20">
            <div class="mx-auto grid max-w-7xl grid-cols-12 gap-6 px-4">
                <!-- Left Sidebar -->
                <div class="col-span-3">
                    <div class="sticky top-20">
                        <ProfileCard
                            :name="$page.props.auth.user.name"
                            role="Software Engineer"
                            :avatar="
                                $page.props.auth.user.profile_picture ||
                                '/default-avatar.png'
                            "
                        />
                        <SidebarLinks />
                    </div>
                </div>

                <!-- Main Feed -->
                <div class="col-span-6">
                    <slot />
                    <!-- Feed posts would go here -->
                </div>

                <!-- Right Sidebar -->
                <div class="col-span-3">
                    <Suspense>
                        <RightSidebar />

                        <template #fallback>
                            <div class="flex flex-row gap-2">
                                <div
                                    class="h-12 w-12 animate-pulse rounded-full bg-gray-300"
                                ></div>
                                <div class="flex flex-col gap-2">
                                    <div
                                        class="h-5 w-28 animate-pulse rounded-full bg-gray-300"
                                    ></div>
                                    <div
                                        class="h-5 w-36 animate-pulse rounded-full bg-gray-300"
                                    ></div>
                                </div>
                            </div>
                        </template>
                    </Suspense>
                </div>
            </div>
        </main>
    </div>
</template>
