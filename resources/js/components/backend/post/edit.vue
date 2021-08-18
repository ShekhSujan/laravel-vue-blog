<template>
    <div>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Post</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Post</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <div class="row">
            <div class="col-md-10 offset-1">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Post</h3>
                        <router-link
                            to="/posts"
                            class="btn btn-info btn-sm float-right"
                            >All Posts</router-link
                        >
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form @submit.prevent="updatePost">
                        <input type="hidden" v-model="form.id" />
                        <div class="card-body">
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select
                                    id="category_id"
                                    name="category_id"
                                    class="form-control"
                                    v-model="form.category_id"
                                >
                                    <option value="">Select Category</option>
                                    <option
                                        :value="category.id"
                                        v-for="category in categories"
                                        :key="category.id"
                                    >
                                        {{ category.name }}
                                    </option>
                                </select>
                                <div
                                    v-if="form.errors.has('category_id')"
                                    v-html="form.errors.get('category_id')"
                                />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input
                                    type="text"
                                    name="title"
                                    v-model="form.title"
                                    class="form-control"
                                    id="title"
                                    placeholder="Enter Title"
                                />
                                <div
                                    v-if="form.errors.has('title')"
                                    v-html="form.errors.get('title')"
                                />
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <ckeditor
                                    :editor="editor"
                                    v-model="form.content"
                                    :config="editorConfig"
                                ></ckeditor>
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <input
                                    type="file"
                                    name="thumnail"
                                    class="form-control"
                                    id="thumnail"
                                    @change="loadThumnail($event)"
                                />
                                <img
                                    :src="fileLink(form.thumnail)"
                                    width="100px"
                                    alt=""
                                />
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input
                                            type="radio"
                                            id="active"
                                            name="status"
                                            value="published"
                                            v-model="form.status"
                                            checked=""
                                        />
                                        <label for="radioPrimary1">
                                            Published
                                        </label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input
                                            type="radio"
                                            id="inactive"
                                            name="status"
                                            value="draft"
                                            v-model="form.status"
                                        />
                                        <label for="radioPrimary2">
                                            Draft
                                        </label>
                                    </div>
                                    <div
                                        v-if="form.errors.has('status')"
                                        v-html="form.errors.get('status')"
                                    />
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button
                                type="submit"
                                :disabled="form.busy"
                                class="btn btn-primary btn-sm"
                            >
                                Update Post
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
export default {
    name: "edit",
    data: function() {
        return {
            form: new Form({
                id: "",
                title: "",
                category_id: "",
                content: "",
                thumnail: "",
                status: ""
            }),
            editor: ClassicEditor,
            editorConfig: {}
        };
    },
    mounted() {
        this.getPost();
        this.$store.dispatch("getActiveCategories");
    },
    computed: {
        categories() {
            return this.$store.getters.categories;
        }
    },
    methods: {
        updatePost: function() {
            this.form.post("/update-post").then(result => {
                Toast.fire({
                    icon: "success",
                    title: "post Updated successfully"
                });
                this.$router.push("/posts");
            });
        },
        getPost: function() {
            axios
                .get("/show-post/" + this.$route.params.slug)
                .then(result => {
                    this.form.fill(result.data.post);
                })
                .catch(err => {});
        }
    }
};
</script>

<style></style>
