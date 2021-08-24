<template>
    <div>
        <div class="blog-page">
            <div class="col-md-9">
                <div
                    class="blog-post  wow fadeInUp"
                    v-for="post in posts.data"
                    :key="post.id"
                >
                    <a href="#"
                        ><img
                            class="img-responsive"
                            :src="fileLink(post.thumnail)"
                            width="100%"
                        />
                    </a>

                    <h1>
                        <a href="#">{{ post.title }}</a>
                    </h1>
                    <!-- <span class="author">{{ post.user.name }}</span> -->
                    <span class="date-time"> {{ post.created_at | time }}</span>
                    <!-- <p v-html="`${post.content}`"></p> -->

                    <router-link
                        :to="`/post/${post.slug}`"
                        class="btn btn-upper btn-primary read-more"
                        >read more</router-link
                    >
                </div>
                <pagination
                    :data="posts"
                    @pagination-change-page="getResults"
                ></pagination>
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
        return {
            posts: {}
        };
    },
    mounted() {
        // this.$store.dispatch("getActivePosts");
        this.getResults();
    },
    // computed: {
    //     posts() {
    //         return this.$store.getters.activePosts;
    //     }
    // },
    methods: {
        getResults(page = 1) {
            axios.get("get-active-posts?page=" + page).then(response => {
                this.posts = response.data;
            });
        }
    }
};
</script>

<style lang="scss" scoped></style>
