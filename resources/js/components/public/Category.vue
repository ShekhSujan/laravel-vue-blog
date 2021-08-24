<template>
    <div>
        <div class="blog-page">
            <div class="col-md-9">
                <div
                    class="blog-post  wow fadeInUp"
                    v-for="post in posts"
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
                    <span class="author">{{ post.user.name }}</span>
                    <span class="date-time"> {{ post.created_at | time }}</span>
                    <!-- <p v-html="`${post.content}`"></p> -->

                    <router-link
                        :to="`/post/${post.slug}`"
                        class="btn btn-upper btn-primary read-more"
                        >read more</router-link
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
            name: "CategoryPost",
            components: {
                sidebar: Sidebar
            },
           data: function() {
        return {
            posts: {}
        };
    },
    mounted() {
        this.getPost();
    },
    methods: {
        getPost: function() {
            axios
                .get("/get-category-post/" + this.$route.params.slug)
                .then(result => {
                    this.posts = result.data.posts;
                })
                .catch(err => {});
        }
    }
        };
    </script>
</template>
