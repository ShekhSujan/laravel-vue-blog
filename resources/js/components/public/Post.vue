<template>
    <div>
        <div class="blog-page">
            <div class="col-md-9">
                <div class="blog-post  wow fadeInUp">
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
                    <p v-html="`${post.content}`"></p>
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
    name: "post",
    components: {
        sidebar: Sidebar
    },
    data: function() {
        return {
            post: {}
        };
    },
    mounted() {
        this.getPost();
    },
    methods: {
        getPost: function() {
            axios
                .get("/get-show-post/" + this.$route.params.slug)
                .then(result => {
                    this.post = result.data.post;
                })
                .catch(err => {});
        }
    }
};
</script>

<style lang="scss" scoped></style>
