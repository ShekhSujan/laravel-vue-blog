<template>
    <div>
        <div class="blog-page">
            <div class="col-md-9">
                <div
                    class="blog-post  wow fadeInUp"
                    v-for="post in posts"
                    :key="post"
                >
                    <a href="#"
                        ><img
                            class="img-responsive"
                            src="images/blog-post/blog_big_01.jpg"
                    /></a>

                    <h1>
                        <a href="#">{{ post.title }}</a>
                    </h1>
                    <span class="author">John Doe</span>
                    <span class="review">6 Comments</span>
                    <span class="date-time">14/06/2016 10.00AM</span>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea
                        commodo consequat. Duis aute irure dolor in
                        reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit
                        anim id est laborum...
                    </p>
                    <a href="#" class="btn btn-upper btn-primary read-more"
                        >read more</a
                    >
                </div>
            </div>

            <div class="col-md-3 sidebar">
                <sidebar />
            </div>
        </div>
    </div>
</template>

<script>
import Sidebar from "./sidebar-right";
export default {
    name: "index",
    components: {
        sidebar: Sidebar
    },
    data: function() {
        return {};
    },
    mounted() {
        this.$store.dispatch("getActivePosts");
    },
    computed: {
        posts() {
            return this.$store.getters.activePosts;
        }
    }
};
</script>

<style lang="scss" scoped></style>
